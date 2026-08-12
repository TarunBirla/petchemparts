<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\QuoteRequest;
use App\Models\QuoteItem;
use App\Mail\QuoteAdminMail;
use App\Mail\QuoteUserMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class QuoteController extends Controller
{
    /**
     * Add product to Quote session cart
     */
    public function addToQuote(Request $request)
    {
        $productId = $request->input('product_id');
        $slug = $request->input('slug');
        $quantity = (int) $request->input('quantity', 1);
        if ($quantity < 1) $quantity = 1;

        if ($productId) {
            $product = Product::find($productId);
        } else if ($slug) {
            $product = Product::where('slug', $slug)->first();
        } else {
            return response()->json(['status' => false, 'message' => 'Invalid product requested.'], 400);
        }

        if (!$product) {
            return response()->json(['status' => false, 'message' => 'Product not found.'], 404);
        }

        $quoteCart = session()->get('quote_cart', []);

        $photos = json_decode($product->photo, true);
        $firstPhoto = is_array($photos) && count($photos) > 0 ? $photos[0] : $product->photo;

        $finalPrice = $product->discount > 0
            ? $product->price - ($product->price * $product->discount / 100)
            : $product->price;

        if (isset($quoteCart[$product->id])) {
            $quoteCart[$product->id]['quantity'] += $quantity;
        } else {
            $quoteCart[$product->id] = [
                'id' => $product->id,
                'title' => $product->title,
                'slug' => $product->slug,
                'part_number' => $product->part_number,
                'model_number' => $product->model_number,
                'manufacturer_name' => optional($product->manufacturer)->name,
                'price' => $finalPrice,
                'photo' => $firstPhoto,
                'quantity' => $quantity,
            ];
        }

        session()->put('quote_cart', $quoteCart);

        $totalCount = array_sum(array_column($quoteCart, 'quantity'));

        return response()->json([
            'status' => true,
            'message' => 'Added to Quote Request!',
            'count' => $totalCount,
            'cart' => $quoteCart
        ]);
    }

    /**
     * Update quantity of a product in session quote cart
     */
    public function updateQuantity(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = (int) $request->input('quantity');

        $quoteCart = session()->get('quote_cart', []);

        if (isset($quoteCart[$productId])) {
            if ($quantity <= 0) {
                unset($quoteCart[$productId]);
            } else {
                $quoteCart[$productId]['quantity'] = $quantity;
            }
            session()->put('quote_cart', $quoteCart);
        }

        $totalCount = array_sum(array_column($quoteCart, 'quantity'));

        return response()->json([
            'status' => true,
            'count' => $totalCount,
            'cart' => $quoteCart
        ]);
    }

    /**
     * Remove product from quote cart
     */
    public function remove(Request $request, $id)
    {
        $quoteCart = session()->get('quote_cart', []);

        if (isset($quoteCart[$id])) {
            unset($quoteCart[$id]);
            session()->put('quote_cart', $quoteCart);
        }

        $totalCount = array_sum(array_column($quoteCart, 'quantity'));

        return response()->json([
            'status' => true,
            'message' => 'Item removed from quote',
            'count' => $totalCount,
            'cart' => $quoteCart
        ]);
    }

    /**
     * Clear all items from quote cart
     */
    public function clear()
    {
        session()->forget('quote_cart');
        return response()->json(['status' => true, 'count' => 0]);
    }

    /**
     * Get current quote cart item count and items
     */
    public function getCart()
    {
        $quoteCart = session()->get('quote_cart', []);
        $totalCount = array_sum(array_column($quoteCart, 'quantity'));

        return response()->json([
            'status' => true,
            'count' => $totalCount,
            'items' => array_values($quoteCart)
        ]);
    }

    /**
     * Submit Quote Request Form
     */
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'phone' => 'required|string|max:50',
            'message' => 'nullable|string|max:2000',
            'company_name' => 'nullable|string|max:191'
        ]);

        $quoteCart = session()->get('quote_cart', []);

        if (empty($quoteCart)) {
            return response()->json([
                'status' => false,
                'message' => 'Your quote list is empty. Please select products first.'
            ], 400);
        }

        $quoteNo = 'QR-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -4));

        $quoteRequest = QuoteRequest::create([
            'quote_no' => $quoteNo,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company_name' => $request->company_name,
            'message' => $request->message,
            'status' => 'pending',
            'user_id' => auth()->check() ? auth()->id() : null,
        ]);

        $itemsSummaryLines = [];
        $i = 1;

        foreach ($quoteCart as $item) {
            $unitPrice = isset($item['price']) ? (float)$item['price'] : 0;
            $qty = (int)$item['quantity'];
            $totalPrice = $unitPrice * $qty;

            QuoteItem::create([
                'quote_request_id' => $quoteRequest->id,
                'product_id' => $item['id'] ?? null,
                'product_name' => $item['title'] ?? 'N/A',
                'part_number' => $item['part_number'] ?? null,
                'model_number' => $item['model_number'] ?? null,
                'manufacturer_name' => $item['manufacturer_name'] ?? null,
                'quantity' => $qty,
                'unit_price' => $unitPrice,
                'total_price' => $totalPrice,
            ]);

            $partStr = !empty($item['part_number']) ? " (Part: {$item['part_number']})" : "";
            $itemsSummaryLines[] = "{$i}. {$item['title']}{$partStr} x {$qty}";
            $i++;
        }

        // Check if mail credentials are valid, otherwise fallback to log driver to prevent socket timeout
        $mailUsername = env('MAIL_USERNAME');
        if (empty($mailUsername) || $mailUsername === 'null') {
            config(['mail.default' => 'log']);
        }

        // Send Email to Admin (mohammednasar.uk@gmail.com)
        try {
            Mail::to('mohammednasar.uk@gmail.com')->send(new QuoteAdminMail($quoteRequest));
        } catch (\Exception $e) {
            Log::error('Admin Quote Email Exception: ' . $e->getMessage());
        }

        // Send Email to User
        try {
            if (!empty($request->email)) {
                Mail::to($request->email)->send(new QuoteUserMail($quoteRequest));
            }
        } catch (\Exception $e) {
            Log::error('User Quote Email Exception: ' . $e->getMessage());
        }

        // Prepare WhatsApp message text for Admin (+447879175585)
        $whatsappMsg = "🚨 *NEW QUOTE REQUEST* 🚨\n\n";
        $whatsappMsg .= "📋 *Ref:* {$quoteNo}\n";
        $whatsappMsg .= "👤 *Name:* {$request->name}\n";
        $whatsappMsg .= "📧 *Email:* {$request->email}\n";
        $whatsappMsg .= "📞 *Phone:* {$request->phone}\n";
        if (!empty($request->company_name)) {
            $whatsappMsg .= "🏢 *Company:* {$request->company_name}\n";
        }
        if (!empty($request->message)) {
            $whatsappMsg .= "💬 *Message:* {$request->message}\n";
        }
        $whatsappMsg .= "\n📦 *REQUESTED PRODUCTS:*\n";
        $whatsappMsg .= implode("\n", $itemsSummaryLines);

        // WhatsApp direct API link for +447879175585
        $encodedText = urlencode($whatsappMsg);
        $whatsappUrl = "https://api.whatsapp.com/send?phone=447879175585&text=" . $encodedText;

        // Clear Quote Cart Session
        session()->forget('quote_cart');

        return response()->json([
            'status' => true,
            'message' => 'Quote Request submitted successfully!',
            'quote_no' => $quoteNo,
            'whatsapp_url' => $whatsappUrl
        ]);
    }
}
