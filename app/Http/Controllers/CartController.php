<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\Cart;
use Illuminate\Support\Str;
use Helper;
class CartController extends Controller
{
    protected $product=null;
    public function __construct(Product $product){
        $this->product=$product;
    }

    
    public function addToCart(Request $request)
    {
        if (empty($request->slug)) {
            return back()->with('error', 'Invalid product');
        }

        $product = Product::where('slug', $request->slug)->first();

        if (!$product) {
            return back()->with('error', 'Invalid product');
        }

        $price = $product->price - ($product->price * $product->discount / 100);
        $cartItem = [
            'product_id' => $product->id,
            'name' => $product->title,
            'price' => $price,
            'quantity' => 1,
            'amount' => $price,
        ];

        // Check stock
        if ($product->stock <= 0) {
            return back()->with('error', 'Stock not sufficient!');
        }

        if (auth()->check()) {

            $already_cart = Cart::where('user_id', auth()->id())
                                ->where('order_id', null)
                                ->where('product_id', $product->id)
                                ->first();

            if ($already_cart) {
                if ($product->stock < $already_cart->quantity + 1) {
                    return back()->with('error', 'Stock not sufficient!');
                }

                $already_cart->quantity += 1;
                $already_cart->amount = $already_cart->price * $already_cart->quantity;
                $already_cart->save();
            } else {
                $cart = new Cart;
                $cart->user_id = auth()->id();
                $cart->product_id = $product->id;
                $cart->price = $price;
                $cart->quantity = 1;
                $cart->amount = $price;
                $cart->save();

                Wishlist::where('user_id', auth()->id())
                    ->whereNull('cart_id')
                    ->where('product_id', $product->id)
                    ->update(['cart_id' => $cart->id]);
            }
        } else {
            
            $sessionCart = session()->get('cart', []);
            $productId = $product->id;

            if (isset($sessionCart[$productId])) {
                if ($product->stock < $sessionCart[$productId]['quantity'] + 1) {
                    return back()->with('error', 'Stock not sufficient!');
                }

                $sessionCart[$productId]['quantity'] += 1;
                $sessionCart[$productId]['amount'] = $sessionCart[$productId]['price'] * $sessionCart[$productId]['quantity'];
            } else {
                $sessionCart[$productId] = $cartItem;
            }

            session()->put('cart', $sessionCart);
        }

        return back()->with('success', 'Product successfully added to cart');
    }

    public function singleAddToCart(Request $request){
        $request->validate([
            'slug'      =>  'required',
            'quant'      =>  'required',
        ]);
        // dd($request->quant[1]);


        $product = Product::where('slug', $request->slug)->first();
        if($product->stock <$request->quant[1]){
            return back()->with('error','Out of stock, You can add other products.');
        }
        if ( ($request->quant[1] < 1) || empty($product) ) {
            request()->session()->flash('error','Invalid Products');
            return back();
        }    

        $already_cart = Cart::where('user_id', auth()->user()->id)->where('order_id',null)->where('product_id', $product->id)->first();

        // return $already_cart;

        if($already_cart) {
            $already_cart->quantity = $already_cart->quantity + $request->quant[1];
            // $already_cart->price = ($product->price * $request->quant[1]) + $already_cart->price ;
            $already_cart->amount = ($product->price * $request->quant[1])+ $already_cart->amount;

            if ($already_cart->product->stock < $already_cart->quantity || $already_cart->product->stock <= 0) return back()->with('error','Stock not sufficient!.');

            $already_cart->save();
            
        }else{
            
            $cart = new Cart;
            $cart->user_id = auth()->user()->id;
            $cart->product_id = $product->id;
            $cart->price = ($product->price-($product->price*$product->discount)/100);
            $cart->quantity = $request->quant[1];
            $cart->amount=($product->price * $request->quant[1]);
            if ($cart->product->stock < $cart->quantity || $cart->product->stock <= 0) return back()->with('error','Stock not sufficient!.');
            // return $cart;
            $cart->save();
        }
        request()->session()->flash('success','Product successfully added to cart.');
        return back();       
    } 
    
    public function cartDelete(Request $request){
        $cart = Cart::find($request->id);
        if ($cart) {
            $cart->delete();
            request()->session()->flash('success','Cart successfully removed');
            return back();  
        }
        request()->session()->flash('error','Error please try again');
        return back();       
    }     

    public function cartUpdate(Request $request){
        // dd($request->all());
        if($request->quant){
            $error = array();
            $success = '';
            // return $request->quant;
            foreach ($request->quant as $k=>$quant) {
                // return $k;
                $id = $request->qty_id[$k];
                // return $id;
                $cart = Cart::find($id);
                // return $cart;
                if($quant > 0 && $cart) {
                    // return $quant;

                    if($cart->product->stock < $quant){
                        request()->session()->flash('error','Out of stock');
                        return back();
                    }
                    $cart->quantity = ($cart->product->stock > $quant) ? $quant  : $cart->product->stock;
                    // return $cart;
                    
                    if ($cart->product->stock <=0) continue;
                    $after_price=($cart->product->price-($cart->product->price*$cart->product->discount)/100);
                    $cart->amount = $after_price * $quant;
                    // return $cart->price;
                    $cart->save();
                    $success = 'Cart successfully updated!';
                }else{
                    $error[] = 'Cart Invalid!';
                }
            }
            return back()->with($error)->with('success', $success);
        }else{
            return back()->with('Cart Invalid!');
        }    
    }
    public function updateQuantity(Request $request)
    {
        $productId = $request->product_id;
        $action = $request->action;

        if (auth()->check()) {
            $cart = Cart::where('user_id', auth()->id())
                        ->where('product_id', $productId)
                        ->whereNull('order_id')
                        ->first();

            if ($cart) {
                if ($action === 'increase') {
                    if ($cart->product->stock > $cart->quantity) {
                        $cart->quantity += 1;
                    }
                } elseif ($action === 'decrease' && $cart->quantity > 1) {
                    $cart->quantity -= 1;
                }

                $cart->amount = $cart->quantity * $cart->price;
                $cart->save();
            }
        } else {
            $cart = session()->get('cart', []);
            if (isset($cart[$productId])) {
                if ($action === 'increase') {
                    $product = \App\Models\Product::find($productId);
                    if ($product && $product->stock > $cart[$productId]['quantity']) {
                        $cart[$productId]['quantity'] += 1;
                    }
                } elseif ($action === 'decrease' && $cart[$productId]['quantity'] > 1) {
                    $cart[$productId]['quantity'] -= 1;
                }

                $cart[$productId]['amount'] = $cart[$productId]['price'] * $cart[$productId]['quantity'];
                session()->put('cart', $cart);
            }
        }

        return response()->json(['success' => true]);
    }

    public function remove($id)
    {
        if (auth()->check()) {
            // For logged-in users
            $cartItem = Cart::where('user_id', auth()->id())
                            ->where('product_id', $id)
                            ->whereNull('order_id')
                            ->first();
            if ($cartItem) {
                $cartItem->delete();
            }
        } else {
            // For guest users
            $cart = session()->get('cart', []);
            if (isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
        }

        return back()->with('success', 'Item removed from cart.');
    }

   

    public function checkout(Request $request){
       
        return view('frontend.pages.checkout');
    }
}
