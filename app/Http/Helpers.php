<?php
use App\Models\Message;
use App\Models\Category;
use App\Models\PostTag;
use App\Models\PostCategory;
use App\Models\Order;
use App\Models\Wishlist;
use App\Models\Shipping;
use App\Models\Cart;
// use Auth;
class Helper{
    
    
    public static function messageList()
    {
        return Message::whereNull('read_at')->orderBy('created_at', 'desc')->get();
    } 

    public static function getAllCategory(){
        $category=new Category();
        $menu=$category->getAllParentWithChild();
        return $menu;
    } 
    
    public static function getHeaderCategory(){
        $category = new Category();
        // dd($category);
        $menu=$category->getAllParentWithChild();

        if($menu){
            ?>
            
            <li>
            <a href="javascript:void(0);">Category<i class="ti-angle-down"></i></a>
                <ul class="dropdown border-0 shadow">
                <?php
                    foreach($menu as $cat_info){
                        if($cat_info->child_cat->count()>0){
                            ?>
                            <li><a href="<?php echo route('product-cat',$cat_info->slug); ?>"><?php echo $cat_info->title; ?></a>
                                <ul class="dropdown sub-dropdown border-0 shadow">
                                    <?php
                                    foreach($cat_info->child_cat as $sub_menu){
                                        ?>
                                        <li><a href="<?php echo route('product-sub-cat',[$cat_info->slug,$sub_menu->slug]); ?>"><?php echo $sub_menu->title; ?></a></li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </li>
                            <?php
                        }
                        else{
                            ?>
                                <li><a href="<?php echo route('product-cat',$cat_info->slug);?>"><?php echo $cat_info->title; ?></a></li>
                            <?php
                        }
                    }
                    ?>
                </ul>
            </li>
        <?php
        }
    }

    public static function productCategoryList($option='all'){
        if($option='all'){
            return Category::orderBy('id','DESC')->get();
        }
        return Category::has('products')->orderBy('id','DESC')->get();
    }

    public static function postTagList($option='all'){
        if($option='all'){
            return PostTag::orderBy('id','desc')->get();
        }
        return PostTag::has('posts')->orderBy('id','desc')->get();
    }

    public static function postCategoryList($option="all"){
        if($option='all'){
            return PostCategory::orderBy('id','DESC')->get();
        }
        return PostCategory::has('posts')->orderBy('id','DESC')->get();
    }
    // Cart Count
    public static function cartCount() {
        if (auth()->check()) {
            // For logged-in users
            return \App\Models\Cart::where('user_id', auth()->id())
                                   ->whereNull('order_id')
                                   ->sum('quantity');
        } else {
            $cart = session()->get('cart', []);
            $quantity = 0;
            foreach ($cart as $item) {
                $quantity += $item['quantity'];
            }
            return $quantity;
        }
    }

    public function product(){
        return $this->hasOne('App\Models\Product','id','product_id');
    }

    // public static function getAllProductFromCart(){
    //     $user_id=auth()->user()->id;
    //     return Cart::with('product')->where('user_id',$user_id)->where('order_id',null)->get();
    // }
    public static function getAllProductFromCart()
    {
        if (auth()->check()) {
            $user_id = auth()->id();
            return \App\Models\Cart::with('product')
                ->where('user_id', $user_id)
                ->whereNull('order_id')
                ->get();
        } else {
            $sessionCart = session('cart', []);
            $items = [];

            foreach ($sessionCart as $item) {
                $product = \App\Models\Product::find($item['product_id']);
                if ($product) {
                    $items[] = (object)[
                        'product' => $product,
                        'quantity' => $item['quantity'],
                        'amount' => $item['amount'],
                    ];
                }
            }

            return collect($items);
        }
    }
    // Total amount cart
    // public static function totalCartPrice(){
    //     $user_id=auth()->user()->id;
    //     return Cart::where('user_id',$user_id)->where('order_id',null)->sum('amount');
    // }
    public static function totalCartPrice()
    {
        if (auth()->check()) {
            $user_id = auth()->id();
            return \App\Models\Cart::where('user_id', $user_id)
                ->whereNull('order_id')
                ->sum('amount');
        } else {
            $cart = session()->get('cart', []);
            $total = 0;
            foreach ($cart as $item) {
                $total += $item['amount'];
            }
            return $total;
        }
    }
    // Wishlist Count
    public static function wishlistCount(){
        //Undefined constant "auth"

        if(auth()->check()){
            $user_id=auth()->user()->id;
            return Wishlist::where('user_id',$user_id)->where('cart_id',null)->sum('quantity');
        }else{
            return 0;
        }
       
       
    }
    public static function getAllProductFromWishlist(){
        
        if(auth()->check()){
            $user_id=auth()->user()->id;
            return Wishlist::with('product')->where('user_id',$user_id)->where('cart_id',null)->get();
        }else
            return null ;

    
    }

    public static function totalWishlistPrice(){
        $user_id=auth()->user()->id;
        return Wishlist::where('user_id',$user_id)->where('cart_id',null)->sum('amount');
    }

    public static function grandPrice($id){
        $user_id=auth()->user()->id;
        $order=Order::find($id);
        if($order){
            $shipping_price=(float)$order->shipping->price ?? 0;
            $order_price=self::orderPrice($id,$user_id);
            return number_format((float)($order_price+$shipping_price),2,'.','');
        }else{
            return 0;
        }
    }


    // Admin home
    public static function earningPerMonth(){
        $month_data=Order::where('status','delivered')->get();
        // return $month_data;
        $price=0;
        foreach($month_data as $data){
            $price = $data->cart_info->sum('price');
        }
        return number_format((float)($price),2,'.','');
    }

    public static function shipping(){
        return Shipping::orderBy('id','DESC')->get();
    }
}

?>