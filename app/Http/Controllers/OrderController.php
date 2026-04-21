<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Shipping;
use App\User;
use PDF;
use Notification;
use Helper;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Notifications\StatusNotification;

class OrderController extends Controller
{
    public function renewForm($id)
{
    $order = Order::findOrFail($id);

    if (auth()->id() != $order->user_id && !auth()->user()->isAdmin()) {
        abort(403);
    }

    // Prevent renewal for delivered / cancelled orders
    if (in_array($order->status, ['delivered', 'cancelled'])) {
        return redirect()->back()->with('error', 'This order cannot be renewed.');
    }

    // Weekly price = subtotal / weeks
    $weeks = max(1, intval($order->rental_days / 7));
    $per_week_price = round($order->sub_total / $weeks, 2);

    return view('frontend.pages.renew', compact('order', 'per_week_price'));
}



public function renewUpdate(Request $request, $id)
{
    $request->validate([
        'end_date' => 'required|date'
    ]);

    $order = Order::findOrFail($id);

    if (auth()->id() != $order->user_id && !auth()->user()->isAdmin()) {
        abort(403);
    }

    if (in_array($order->status, ['delivered', 'cancelled'])) {
        return redirect()->back()->with('error', 'This order cannot be renewed.');
    }

    $start = Carbon::parse($order->start_date);
    $newEnd = Carbon::parse($request->end_date);

    // Allowed end dates only 7,14,21,28,... days ahead
    $diffDays = $start->diffInDays($newEnd);

    if ($diffDays % 7 !== 0) {
        return back()->withErrors(['end_date' => 'End date must be selected only week-wise (7,14,21 days).']);
    }

    // Calculate new weeks
    $new_weeks = intval($diffDays / 7);
    if ($new_weeks < 1) $new_weeks = 1;

    // Weekly price from old order
    $old_weeks = max(1, intval($order->rental_days / 7));
    $per_week_price = round($order->sub_total / $old_weeks, 2);

    // NEW SUBTOTAL
    $new_sub_total = $per_week_price * $new_weeks;

    // Shipping + Coupon preserved
    $shipping = $order->shipping_price ?? 0;
    $coupon   = $order->coupon ?? 0;

    $new_total = $new_sub_total + $shipping - $coupon;

    // UPDATE ORDER
    $order->end_date      = $newEnd->toDateString();
    $order->rental_days   = $new_weeks * 7;
    $order->rental_weeks  = $new_weeks;
    $order->sub_total     = $new_sub_total;
    $order->total_amount  = max(0, $new_total);
    $order->save();

    return redirect()->route('user.order.index')
        ->with('success', 'Order renewed successfully.');
}

    
    public function index()
    {
        $orders=Order::orderBy('id','DESC')->paginate(10);
        return view('backend.order.index')->with('orders',$orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

   
    
//     public function store(Request $request)
// {
//     $this->validate($request, [
//         'first_name' => 'string|required',
//         'last_name' => 'string|required',
//         'address1' => 'string|required',
//         'coupon' => 'nullable|numeric',
//         'phone' => 'numeric|required',
//         'post_code' => 'string|nullable',
//         'email' => 'required|email',
//         'shipping' => 'nullable|exists:shippings,id',
//         'start_date' => 'required|date',
//         'end_date' => 'required|date|after_or_equal:start_date'
//     ]);

//     if (!auth()->check()) {
//         return redirect()->route('login.form');
//     }

//     // -----------------------------
//     // Get CART ITEMS
//     // -----------------------------
//     if (auth()->check()) {
//         $cartItems = Cart::where('user_id', auth()->id())
//             ->whereNull('order_id')
//             ->get();
//     } else {
//         $cartItems = collect(session()->get('cart', []));
//     }

//     if ($cartItems->isEmpty()) {
//         request()->session()->flash('error', 'Cart is Empty!');
//         return back();
//     }

//     // -----------------------------
//     // RENTAL DAYS (Inclusive)
//     // -----------------------------
//     $start = new \DateTime($request->start_date);
//     $end   = new \DateTime($request->end_date);

//     // +1 ensures inclusive day count
//     $rental_days = $start->diff($end)->days + 1;
//     if ($rental_days < 1) $rental_days = 1;

//     // -----------------------------
//     // PRICING
//     // -----------------------------
//     // daily price for *1 day*
//     $daily_price = Helper::totalCartPrice();

//     // subtotal = per-day price × rental_days
//     $sub_total = $daily_price * $rental_days;

//     // cart count
//     $quantity = Helper::cartCount();

//     // shipping fee
//     $shipping_price = 0;
//     if ($request->shipping) {
//         $shipping_price = Shipping::where('id', $request->shipping)->value('price') ?? 0;
//     }

//     // coupon
//     $coupon_value = session('coupon')['value'] ?? 0;

//     // final total
//     $total_amount = $sub_total + $shipping_price - $coupon_value;

//     // -----------------------------
//     // CREATE ORDER
//     // -----------------------------
//     $order = new Order();
//     $order_data = $request->all();

//     $order_data['order_number'] = 'ORD-' . strtoupper(Str::random(10));
//     $order_data['user_id'] = auth()->id();
//     $order_data['sub_total'] = $sub_total;
//     $order_data['quantity'] = $quantity;
//     $order_data['coupon'] = $coupon_value;
//     $order_data['total_amount'] = $total_amount;
//     $order_data['status'] = "new";

//     $order_data['payment_method'] = $request->payment_method ?? 'cod';
//     $order_data['payment_status'] = ($order_data['payment_method'] == 'paypal') ? 'paid' : 'Unpaid';

//     // save rental fields
//     $order_data['start_date'] = $request->start_date;
//     $order_data['end_date'] = $request->end_date;
//     $order_data['rental_days'] = $rental_days;

//     $order->fill($order_data);
//     $order->save();

//     // -----------------------------
//     // SAVE CART ITEMS TO ORDER
//     // -----------------------------
//     if (auth()->check()) {
//         Cart::where('user_id', auth()->id())
//             ->whereNull('order_id')
//             ->update(['order_id' => $order->id]);
//     } else {
//         foreach ($cartItems as $item) {
//             OrderItem::create([
//                 'order_id' => $order->id,
//                 'product_id' => $item['product_id'],
//                 'quantity' => $item['quantity'],
//                 'price' => $item['price'],
//             ]);
//         }
//         session()->forget('cart');
//     }

//     // -----------------------------
//     // ADMIN NOTIFICATION
//     // -----------------------------
//     $admin = User::where('role', 'admin')->first();
//     if ($admin) {
//         $details = [
//             'title' => 'New order created',
//             'actionURL' => route('order.show', $order->id),
//             'fas' => 'fa-file-alt'
//         ];
//         Notification::send($admin, new StatusNotification($details));
//     }

//     session()->forget('coupon');

//     if ($order_data['payment_method'] == 'paypal') {
//         return redirect()->route('payment')->with(['id' => $order->id]);
//     }

//     request()->session()->flash('success', 'Your order has been placed successfully!');
//     return redirect()->route('home');
// }

public function store(Request $request)
{
    $this->validate($request, [
        'first_name' => 'string|required',
        'last_name' => 'string|required',
        'address1' => 'string|required',
        'coupon' => 'nullable|numeric',
        'phone' => 'numeric|required',
        'post_code' => 'string|nullable',
        'email' => 'required|email',
        'shipping' => 'nullable|exists:shippings,id',
    ]);

    if (!auth()->check()) {
        return redirect()->route('login.form');
    }

    // CART ITEMS
    $cartItems = auth()->check()
        ? Cart::where('user_id', auth()->id())->whereNull('order_id')->get()
        : collect(session()->get('cart', []));

    if ($cartItems->isEmpty()) {
        request()->session()->flash('error', 'Cart is Empty!');
        return back();
    }

    // SUBTOTAL
    $sub_total = Helper::totalCartPrice();

    // CART QTY
    $quantity = Helper::cartCount();

    // SHIPPING
    $shipping_price = $request->shipping
        ? (Shipping::where('id', $request->shipping)->value('price') ?? 0)
        : 0;

    // COUPON
    $coupon_value = session('coupon')['value'] ?? 0;

    // FINAL TOTAL
    $total_amount = $sub_total + $shipping_price - $coupon_value;

    // CREATE ORDER
    $order = new Order();
    $order_data = $request->all();

    $order_data['order_number'] = 'ORD-' . strtoupper(Str::random(10));
    $order_data['user_id'] = auth()->id();
    $order_data['sub_total'] = $sub_total;
    $order_data['quantity'] = $quantity;
    $order_data['coupon'] = $coupon_value;
    $order_data['total_amount'] = $total_amount;
    $order_data['status'] = "new";

    $order_data['payment_method'] = $request->payment_method ?? 'cod';
    $order_data['payment_status'] = ($order_data['payment_method'] == 'paypal') ? 'paid' : 'Unpaid';

    $order->fill($order_data);
    $order->save();

    // SAVE CART ITEMS
    if (auth()->check()) {
        Cart::where('user_id', auth()->id())
            ->whereNull('order_id')
            ->update(['order_id' => $order->id]);
    } else {
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }
        session()->forget('cart');
    }

    // ADMIN NOTIFICATION
    $admin = User::where('role', 'admin')->first();
    if ($admin) {
        $details = [
            'title' => 'New order created',
            'actionURL' => route('order.show', $order->id),
            'fas' => 'fa-file-alt'
        ];
        Notification::send($admin, new StatusNotification($details));
    }

    session()->forget('coupon');

    if ($order_data['payment_method'] == 'paypal') {
        return redirect()->route('payment')->with(['id' => $order->id]);
    }

    request()->session()->flash('success', 'Your order has been placed successfully!');
    return redirect()->route('home');
}





    
    public function show($id)
    {
        $order=Order::find($id);
        // return $order;
        return view('backend.order.show')->with('order',$order);
    }


    public function edit($id)
    {
        $order=Order::find($id);
        return view('backend.order.edit')->with('order',$order);
    }

    
    public function update(Request $request, $id)
    {
        $order=Order::find($id);
        $this->validate($request,[
            'status'=>'required|in:new,process,delivered,cancel'
        ]);
        $data=$request->all();
        // return $request->status;
        if($request->status=='delivered'){
            foreach($order->cart as $cart){
                $product=$cart->product;
                // return $product;
                $product->stock -=$cart->quantity;
                $product->save();
            }
        }
        $status=$order->fill($data)->save();
        if($status){
            request()->session()->flash('success','Successfully updated order');
        }
        else{
            request()->session()->flash('error','Error while updating order');
        }
        return redirect()->route('order.index');
    }

    public function destroy($id)
    {
        $order=Order::find($id);
        if($order){
            $status=$order->delete();
            if($status){
                request()->session()->flash('success','Order Successfully deleted');
            }
            else{
                request()->session()->flash('error','Order can not deleted');
            }
            return redirect()->route('order.index');
        }
        else{
            request()->session()->flash('error','Order can not found');
            return redirect()->back();
        }
    }

    public function orderTrack(){
        return view('frontend.pages.order-track');
    }

    public function productTrackOrder(Request $request){

        $order = Order::where('order_number',$request->order_number)->first();
        if($order){
            if($order->status=="new"){
                request()->session()->flash('success','Your order has been placed. please wait.');
                return redirect()->route('home');
            }elseif($order->status=="process"){
                request()->session()->flash('success','Your order is under processing please wait.');
                return redirect()->route('home');
    
            }elseif($order->status=="delivered"){
                request()->session()->flash('success','Your order is successfully delivered.');
                return redirect()->route('home');
    
            }else{
                request()->session()->flash('error','Your order canceled. please try again');
                return redirect()->route('home');
    
            }
        }else{
            request()->session()->flash('error','Invalid order numer please try again');
            return back();
        }
    }

    // PDF generate
    public function pdf(Request $request){
        $order=Order::getAllOrder($request->id);
        // return $order;
        $file_name=$order->order_number.'-'.$order->first_name.'.pdf';
        // return $file_name;
        $pdf=PDF::loadview('backend.order.pdf',compact('order'));
        return $pdf->download($file_name);
    }
    // Income chart
    public function incomeChart(Request $request){
        $year=\Carbon\Carbon::now()->year;
        // dd($year);
        $items=Order::with(['cart_info'])->whereYear('created_at',$year)->where('status','delivered')->get()
            ->groupBy(function($d){
                return \Carbon\Carbon::parse($d->created_at)->format('m');
            });
            // dd($items);
        $result=[];
        foreach($items as $month=>$item_collections){
            foreach($item_collections as $item){
                $amount=$item->cart_info->sum('amount');
                // dd($amount);
                $m=intval($month);
                // return $m;
                isset($result[$m]) ? $result[$m] += $amount :$result[$m]=$amount;
            }
        }
        $data=[];
        for($i=1; $i <=12; $i++){
            $monthName=date('F', mktime(0,0,0,$i,1));
            $data[$monthName] = (!empty($result[$i]))? number_format((float)($result[$i]), 2, '.', '') : 0.0;
        }
        return $data;
    }
}
