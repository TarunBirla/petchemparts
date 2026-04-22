<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Category;
use App\Models\PostTag;
use App\Models\PostCategory;
use App\Models\Post;
use App\Models\Cart;
use App\Models\Brand;
use App\User;
use Auth;
use Session;
use Newsletter;
use DB;
use Hash;
use Illuminate\Support\Str;

use App\Models\Manufacturer;

class FrontendController extends Controller
{

    public function index(Request $request)
    {
        return redirect()->route($request->user()->role);
    }

    public function newarrival(Request $request)
    {

        $query = Product::where('status', 'active')
            ->where('condition', 'new');

        // Add calculated column for discounted price
        $query->select('*');
        $query->selectRaw('(price - (price * discount / 100)) as effective_price');

        // Apply sorting
        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'price_asc':
                    $query->orderBy('effective_price', 'ASC');
                    break;
                case 'price_desc':
                    $query->orderBy('effective_price', 'DESC');
                    break;
                case 'date_asc':
                    $query->orderBy('created_at', 'ASC');
                    break;
                case 'date_desc':
                    $query->orderBy('created_at', 'DESC');
                    break;
            }
        } else {
            // Default sort (if none selected)
            $query->orderBy('id', 'DESC');
        }

        $newarrival = $query->get();
        //   $newarrival=Product::where('status','active')->where('condition','new')->orderBy('id','DESC')->get();
        return view('frontend.pages.newarrival')->with('newarrival', $newarrival);
    }
    public function bestseller(Request $request)
    {
        // $bestseller=Product::where('status','active')->where('condition','best_seller')->orderBy('id','DESC')->get();    

        $query = Product::where('status', 'active')
            ->where('condition', 'best_seller');

        // Add calculated column for discounted price
        $query->select('*');
        $query->selectRaw('(price - (price * discount / 100)) as effective_price');

        // Apply sorting
        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'price_asc':
                    $query->orderBy('effective_price', 'ASC');
                    break;
                case 'price_desc':
                    $query->orderBy('effective_price', 'DESC');
                    break;
                case 'date_asc':
                    $query->orderBy('created_at', 'ASC');
                    break;
                case 'date_desc':
                    $query->orderBy('created_at', 'DESC');
                    break;
            }
        } else {
            // Default sort (if none selected)
            $query->orderBy('id', 'DESC');
        }

        $bestseller = $query->get();
        return view('frontend.pages.bestseller')->with('bestseller', $bestseller);
    }


    public function gifting(Request $request)
    {
        $query = Product::where('status', 'active')
            ->where('condition', 'gifting');

        // Add calculated column for discounted price
        $query->select('*');
        $query->selectRaw('(price - (price * discount / 100)) as effective_price');

        // Apply sorting
        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'price_asc':
                    $query->orderBy('effective_price', 'ASC');
                    break;
                case 'price_desc':
                    $query->orderBy('effective_price', 'DESC');
                    break;
                case 'date_asc':
                    $query->orderBy('created_at', 'ASC');
                    break;
                case 'date_desc':
                    $query->orderBy('created_at', 'DESC');
                    break;
            }
        } else {
            // Default sort (if none selected)
            $query->orderBy('id', 'DESC');
        }

        $gifting = $query->get();

        return view('frontend.pages.gifting')->with('gifting', $gifting);
    }


    public function occasional(Request $request)
    {

        $query = Product::where('status', 'active')
            ->where('condition', 'occastions');

        // Add calculated column for discounted price
        $query->select('*');
        $query->selectRaw('(price - (price * discount / 100)) as effective_price');

        // Apply sorting
        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'price_asc':
                    $query->orderBy('effective_price', 'ASC');
                    break;
                case 'price_desc':
                    $query->orderBy('effective_price', 'DESC');
                    break;
                case 'date_asc':
                    $query->orderBy('created_at', 'ASC');
                    break;
                case 'date_desc':
                    $query->orderBy('created_at', 'DESC');
                    break;
            }
        } else {
            // Default sort (if none selected)
            $query->orderBy('id', 'DESC');
        }

        $occassional = $query->get();

        // $occassional=Product::where('status','active')->where('condition','occastions')->orderBy('id','DESC')->get();    
        return view('frontend.pages.occassional')->with('occassional', $occassional);
    }

    public function collection(Request $request)
    {
        $collection = Product::where('status', 'active')->orderBy('id', 'DESC')->paginate(4);
        return view('frontend.pages.collection')->with('collection', $collection);
    }

    public function headerCart()
    {
        $cartItems = [];

        if (auth()->check()) {
            $cartItems = Cart::with('product')
                ->where('user_id', auth()->id())
                ->whereNull('order_id')
                ->get();
        } else {
            $sessionCart = session('cart', []);
            foreach ($sessionCart as $item) {
                $product = Product::find($item['product_id']);
                if ($product) {
                    $cartItems[] = (object) [
                        'product' => $product,
                        'quantity' => $item['quantity'],
                        'amount' => $item['amount'],
                    ];
                }
            }
        }

        return view('layouts.header-cart', compact('cartItems'));
    }

    public function home()
    {
        $featured = Product::where('status', 'active')->where('is_featured', 1)->orderBy('price', 'DESC')->limit(2)->get();
        $posts = Post::where('status', 'active')->orderBy('id', 'DESC')->limit(3)->get();
        $banners = Banner::where('status', 'active')->limit(6)->orderBy('id', 'DESC')->get();
        $products = Product::where('status', 'active')->orderBy('id', 'DESC')->limit(8)->get();
        $category = Category::where('status', 'active')->where('is_parent', 1)->orderBy('title', 'ASC')->get();

        return view('frontend.index')
            ->with('featured', $featured)
            ->with('posts', $posts)
            ->with('banners', $banners)
            ->with('product_lists', $products)
            ->with('category_lists', $category);
    }

    public function show($slug)
    {

        $category = Category::where('slug', $slug)->firstOrFail();
        if ($category->is_parent == 0) {

            $products = Product::where('child_cat_id', $category->id)->get();
            return view('frontend.pages.category', compact('category', 'products'));

        } else {

            $products = Product::where('cat_id', $category->id)->get();
            return view('frontend.pages.category', compact('category', 'products'));

        }

    }

    public function aboutUs()
    {
        return view('frontend.pages.about-us');
    }
    public function terms()
    {
        return view('frontend.pages.terms');
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }

    public function productDetail($slug)
    {
        $product_detail = Product::getProductBySlug($slug);
        return view('frontend.pages.product_detail')->with('product_detail', $product_detail);
    }

    public function productPlay($slug)
    {
        $product_detail = Product::getProductBySlug($slug);
        return view('frontend.pages.product-play')->with('product_play', $product_detail);
    }

    public function productGrids()
    {
        $products = Product::query();

        if (!empty($_GET['category'])) {
            $slug = explode(',', $_GET['category']);
            // dd($slug);
            $cat_ids = Category::select('id')->whereIn('slug', $slug)->pluck('id')->toArray();
            // dd($cat_ids);
            $products->whereIn('cat_id', $cat_ids);
            // return $products;
        }
        if (!empty($_GET['brand'])) {
            $slugs = explode(',', $_GET['brand']);
            $brand_ids = Brand::select('id')->whereIn('slug', $slugs)->pluck('id')->toArray();
            return $brand_ids;
            $products->whereIn('brand_id', $brand_ids);
        }
        if (!empty($_GET['sortBy'])) {
            if ($_GET['sortBy'] == 'title') {
                $products = $products->where('status', 'active')->orderBy('title', 'ASC');
            }
            if ($_GET['sortBy'] == 'price') {
                $products = $products->orderBy('price', 'ASC');
            }
        }

        if (!empty($_GET['price'])) {
            $price = explode('-', $_GET['price']);
            // return $price;
            // if(isset($price[0]) && is_numeric($price[0])) $price[0]=floor(Helper::base_amount($price[0]));
            // if(isset($price[1]) && is_numeric($price[1])) $price[1]=ceil(Helper::base_amount($price[1]));

            $products->whereBetween('price', $price);
        }

        $recent_products = Product::where('status', 'active')->orderBy('id', 'DESC')->limit(3)->get();
        // Sort by number
        if (!empty($_GET['show'])) {
            $products = $products->where('status', 'active')->paginate($_GET['show']);
        } else {
            $products = $products->where('status', 'active')->paginate(9);
        }
        // Sort by name , price, category


        return view('frontend.pages.product-grids')->with('products', $products)->with('recent_products', $recent_products);
    }

    public function productLists(Request $request)
    {
        $query = Product::query();

        // ✅ CATEGORY FILTER
        if ($request->filled('category')) {
            $slugs = explode(',', $request->category);

            $cat_ids = Category::whereIn('slug', $slugs)->pluck('id');

            $query->whereIn('cat_id', $cat_ids);
        }

        // ✅ BRAND FILTER
        if ($request->filled('brand')) {
            $slugs = explode(',', $request->brand);

            $brand_ids = Brand::whereIn('slug', $slugs)->pluck('id');

            $query->whereIn('brand_id', $brand_ids);
        }

        // ✅ PRICE FILTER
        if ($request->filled('price')) {
            $price = explode('-', $request->price);

            if (count($price) == 2) {
                $query->whereBetween('price', [$price[0], $price[1]]);
            }
        }

        // ✅ SORTING
        if ($request->sortBy == 'title') {
            $query->orderBy('title', 'ASC');
        } elseif ($request->sortBy == 'price') {
            $query->orderBy('price', 'ASC');
        } else {
            $query->orderBy('id', 'DESC'); // default
        }

        // ✅ ONLY ACTIVE
        $query->where('status', 'active');

        // ✅ PAGINATION (MAIN FIX)
        $perPage = $request->show ?? 6;

        $products = $query->paginate($perPage)
            ->appends($request->all()); // 🔥 VERY IMPORTANT

        // ✅ RECENT PRODUCTS
        $recent_products = Product::where('status', 'active')
            ->latest()
            ->limit(3)
            ->get();

        return view('frontend.pages.product-lists', compact('products', 'recent_products'));
    }

    public function productFilter(Request $request)
    {
        $data = $request->all();
        // return $data;
        $showURL = "";
        if (!empty($data['show'])) {
            $showURL .= '&show=' . $data['show'];
        }

        $sortByURL = '';
        if (!empty($data['sortBy'])) {
            $sortByURL .= '&sortBy=' . $data['sortBy'];
        }

        $catURL = "";
        if (!empty($data['category'])) {
            foreach ($data['category'] as $category) {
                if (empty($catURL)) {
                    $catURL .= '&category=' . $category;
                } else {
                    $catURL .= ',' . $category;
                }
            }
        }

        $brandURL = "";
        if (!empty($data['brand'])) {
            foreach ($data['brand'] as $brand) {
                if (empty($brandURL)) {
                    $brandURL .= '&brand=' . $brand;
                } else {
                    $brandURL .= ',' . $brand;
                }
            }
        }
        // return $brandURL;

        $priceRangeURL = "";
        if (!empty($data['price_range'])) {
            $priceRangeURL .= '&price=' . $data['price_range'];
        }
        if (request()->is('e-shop.loc/product-grids')) {
            return redirect()->route('product-grids', $catURL . $brandURL . $priceRangeURL . $showURL . $sortByURL);
        } else {
            return redirect()->route('product-lists', $catURL . $brandURL . $priceRangeURL . $showURL . $sortByURL);
        }
    }


    public function productBrand(Request $request)
    {
        $products = Brand::getProductByBrand($request->slug);
        $recent_products = Product::where('status', 'active')->orderBy('id', 'DESC')->limit(3)->get();
        if (request()->is('e-shop.loc/product-grids')) {
            return view('frontend.pages.product-grids')->with('products', $products->products)->with('recent_products', $recent_products);
        } else {
            return view('frontend.pages.product-lists')->with('products', $products->products)->with('recent_products', $recent_products);
        }

    }
    public function productCat(Request $request)
    {
        $products = Category::getProductByCat($request->slug);
        // return $request->slug;
        $recent_products = Product::where('status', 'active')->orderBy('id', 'DESC')->limit(3)->get();

        if (request()->is('e-shop.loc/product-grids')) {
            return view('frontend.pages.product-grids')->with('products', $products->products)->with('recent_products', $recent_products);
        } else {
            return view('frontend.pages.product-lists')->with('products', $products->products)->with('recent_products', $recent_products);
        }

    }
    public function productSubCat(Request $request)
    {
        $products = Category::getProductBySubCat($request->sub_slug);
        // return $products;
        $recent_products = Product::where('status', 'active')->orderBy('id', 'DESC')->limit(3)->get();

        if (request()->is('e-shop.loc/product-grids')) {
            return view('frontend.pages.product-grids')->with('products', $products->sub_products)->with('recent_products', $recent_products);
        } else {
            return view('frontend.pages.product-lists')->with('products', $products->sub_products)->with('recent_products', $recent_products);
        }

    }

    public function blog()
    {
        $post = Post::query();

        if (!empty($_GET['category'])) {
            $slug = explode(',', $_GET['category']);
            // dd($slug);
            $cat_ids = PostCategory::select('id')->whereIn('slug', $slug)->pluck('id')->toArray();
            return $cat_ids;
            $post->whereIn('post_cat_id', $cat_ids);
            // return $post;
        }
        if (!empty($_GET['tag'])) {
            $slug = explode(',', $_GET['tag']);
            // dd($slug);
            $tag_ids = PostTag::select('id')->whereIn('slug', $slug)->pluck('id')->toArray();
            // return $tag_ids;
            $post->where('post_tag_id', $tag_ids);
            // return $post;
        }

        if (!empty($_GET['show'])) {
            $post = $post->where('status', 'active')->orderBy('id', 'DESC')->paginate($_GET['show']);
        } else {
            $post = $post->where('status', 'active')->orderBy('id', 'DESC')->paginate(9);
        }
        // $post=Post::where('status','active')->paginate(8);
        $rcnt_post = Post::where('status', 'active')->orderBy('id', 'DESC')->limit(3)->get();
        return view('frontend.pages.blog')->with('posts', $post)->with('recent_posts', $rcnt_post);
    }

    public function blogDetail($slug)
    {
        $post = Post::getPostBySlug($slug);
        $rcnt_post = Post::where('status', 'active')->orderBy('id', 'DESC')->limit(3)->get();
        // return $post;
        return view('frontend.pages.blog-detail')->with('post', $post)->with('recent_posts', $rcnt_post);
    }

    public function blogSearch(Request $request)
    {
        // return $request->all();
        $rcnt_post = Post::where('status', 'active')->orderBy('id', 'DESC')->limit(3)->get();
        $posts = Post::orwhere('title', 'like', '%' . $request->search . '%')
            ->orwhere('quote', 'like', '%' . $request->search . '%')
            ->orwhere('summary', 'like', '%' . $request->search . '%')
            ->orwhere('description', 'like', '%' . $request->search . '%')
            ->orwhere('slug', 'like', '%' . $request->search . '%')
            ->orderBy('id', 'DESC')
            ->paginate(8);
        return view('frontend.pages.blog')->with('posts', $posts)->with('recent_posts', $rcnt_post);
    }

    public function blogFilter(Request $request)
    {
        $data = $request->all();
        // return $data;
        $catURL = "";
        if (!empty($data['category'])) {
            foreach ($data['category'] as $category) {
                if (empty($catURL)) {
                    $catURL .= '&category=' . $category;
                } else {
                    $catURL .= ',' . $category;
                }
            }
        }

        $tagURL = "";
        if (!empty($data['tag'])) {
            foreach ($data['tag'] as $tag) {
                if (empty($tagURL)) {
                    $tagURL .= '&tag=' . $tag;
                } else {
                    $tagURL .= ',' . $tag;
                }
            }
        }
        // return $tagURL;
        // return $catURL;
        return redirect()->route('blog', $catURL . $tagURL);
    }

    public function blogByCategory(Request $request)
    {
        $post = PostCategory::getBlogByCategory($request->slug);
        $rcnt_post = Post::where('status', 'active')->orderBy('id', 'DESC')->limit(3)->get();
        return view('frontend.pages.blog')->with('posts', $post->post)->with('recent_posts', $rcnt_post);
    }

    public function blogByTag(Request $request)
    {
        // dd($request->slug);
        $post = Post::getBlogByTag($request->slug);
        // return $post;
        $rcnt_post = Post::where('status', 'active')->orderBy('id', 'DESC')->limit(3)->get();
        return view('frontend.pages.blog')->with('posts', $post)->with('recent_posts', $rcnt_post);
    }

    // Login
    public function login()
    {
        return view('frontend.pages.login');
    }
    public function loginSubmit(Request $request)
    {
        $data = $request->all();
        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'status' => 'active'])) {

            Session::put('user', $data['email']);
            $sessionCart = session()->get('cart', []);
            if (!empty($sessionCart)) {
                foreach ($sessionCart as $productId => $item) {
                    $existing = Cart::where('user_id', auth()->id())
                        ->where('product_id', $item['product_id'])
                        ->whereNull('order_id')
                        ->first();

                    if ($existing) {
                        $existing->quantity += $item['quantity'];
                        $existing->amount = $existing->price * $existing->quantity;
                        $existing->save();
                    } else {
                        Cart::create([
                            'user_id' => auth()->id(),
                            'product_id' => $item['product_id'],
                            'price' => $item['price'],
                            'quantity' => $item['quantity'],
                            'amount' => $item['amount'],
                            'order_id' => null
                        ]);
                    }
                }

                session()->forget('cart'); // clear after merge
            }
            request()->session()->flash('success', 'Successfully login');
            return redirect()->route('home');
        } else {
            request()->session()->flash('error', 'Invalid email and password pleas try again!');
            return redirect()->back();
        }
    }

    public function logout()
    {
        Session::forget('user');
        Auth::logout();
        request()->session()->flash('success', 'Logout successfully');
        return back();
    }

    public function register()
    {
        return view('frontend.pages.register');
    }
    public function registerSubmit(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'string|required|min:2',
            'last_name' => 'string|required|min:2',
            'email' => 'string|required|unique:users,email',
            'password' => 'required|min:6',
        ]);
        $request['name'] = $request->first_name . ' ' . $request->last_name;
        $data = $request->all();
        $check = $this->create($data);
        // Session::put('user',$data['email']);
        if ($check) {
            request()->session()->flash('success', 'Successfully registered');
            return redirect()->route('login.form');
        } else {
            request()->session()->flash('error', 'Please try again!');
            return back();
        }
    }
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'status' => 'active'
        ]);
    }
    // Reset password
    public function showResetForm()
    {
        return view('auth.passwords.old-reset');
    }

    public function subscribe(Request $request)
    {

        request()->session()->flash('success', 'Subscribed! Please check your email');
        return redirect()->route('home');
        // if(! Newsletter::isSubscribed($request->email)){
        //     Newsletter::subscribePending($request->email);
        //     if(Newsletter::lastActionSucceeded()){

        //     }
        //     else{
        //         Newsletter::getLastError();
        //         return back()->with('error','Something went wrong! please try again');
        //     }
        // }
        // else{
        //     request()->session()->flash('error','Already Subscribed');
        //     return back();
        // }
    }



    public function manufacturerindex()
    {
        $manufacturers = Manufacturer::where('status', 'active')->get();

        $categories = DB::table('categories')
            ->where('status', 'active')
            ->whereNull('parent_id')
            ->get();

        $subcategories = DB::table('categories')
            ->where('status', 'active')
            ->whereNotNull('parent_id')
            ->get()
            ->groupBy('parent_id');

        return view('frontend.index', compact(
            'manufacturers',
            'categories',
            'subcategories'
        ));
    }


    public function manufacturerData(Request $request)
    {
        $manufacturers = Manufacturer::where('status', 'active')->get();

        $query = Product::with(['cat_info', 'manufacturer', 'brand'])
            ->where('status', 'active');

        // 🔍 SEARCH (MAIN LOGIC)
        if ($request->search) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {

                // ✅ Product fields
                $q->where('title', 'like', "%$search%")
                    ->orWhere('part_number', 'like', "%$search%")
                    ->orWhere('model_number', 'like', "%$search%")
                    ->orWhere('summary', 'like', "%$search%")
                    ->orWhere('description', 'like', "%$search%");

                // ✅ Category name
                $q->orWhereHas('cat_info', function ($q2) use ($search) {
                    $q2->where('title', 'like', "%$search%");
                });

                // ✅ Manufacturer name
                $q->orWhereHas('manufacturer', function ($q3) use ($search) {
                    $q3->where('name', 'like', "%$search%");
                });

                // ✅ Brand name
                $q->orWhereHas('brand', function ($q4) use ($search) {
                    $q4->where('title', 'like', "%$search%");
                });
            });
        }

        // 🔽 Filters (optional)
        if ($request->manufacturer_id) {
            $query->where('manufacturer_id', $request->manufacturer_id);
        }

        if ($request->category_id) {
            $query->where('cat_id', $request->category_id);
        }

        if ($request->subcategory_id) {
            $query->where('child_cat_id', $request->subcategory_id);
        }

        $products = $query->orderBy('id', 'DESC')->paginate(9);

        return view('frontend.pages.shop', compact('products', 'manufacturers'));
    }


    public function productSearch(Request $request)
    {
        $query = $request->q ?? $request->search;

        $products = Product::with(['brand', 'cat_info', 'manufacturer'])
            ->where('status', 'active')
            ->where(function ($q2) use ($query) {

                // ✅ Product fields
                $q2->where('title', 'like', "%$query%")
                    ->orWhere('slug', 'like', "%$query%")
                    ->orWhere('description', 'like', "%$query%")
                    ->orWhere('summary', 'like', "%$query%")
                    ->orWhere('part_number', 'like', "%$query%")
                    ->orWhere('model_number', 'like', "%$query%");

                // ✅ Category
                $q2->orWhereHas('cat_info', function ($q3) use ($query) {
                    $q3->where('title', 'like', "%$query%");
                });

                // ✅ Manufacturer
                $q2->orWhereHas('manufacturer', function ($q4) use ($query) {
                    $q4->where('name', 'like', "%$query%");
                });

                // ✅ Brand
                $q2->orWhereHas('brand', function ($q5) use ($query) {
                    $q5->where('title', 'like', "%$query%");
                });
            })
            ->orderBy('id', 'DESC');

        // ✅ AJAX suggestion
        if ($request->ajax()) {
            return response()->json(
                $products->limit(10)->get([
                    'id',
                    'title',
                    'slug',
                    'part_number',
                    'model_number'
                ])
            );
        }

        // ✅ NORMAL SEARCH (redirect to shop page)
        $products = $products->paginate(9);

        return view('frontend.pages.shop', compact('products'));
    }


}
