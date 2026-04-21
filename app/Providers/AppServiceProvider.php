<?php

namespace App\Providers;

use App\Models\Manufacturer;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        // DB string length fix
        Schema::defaultStringLength(191);

        // Locale
        App::setLocale(Session::get('locale', config('app.locale')));

        // GLOBAL VIEW DATA
        View::composer('*', function ($view) {

            // ✅ Manufacturers (FIX)
            $manufacturers = Manufacturer::where('status','active')->get();

            // ✅ Cart Items
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
                        $cartItems[] = (object)[
                            'product'  => $product,
                            'quantity' => $item['quantity'],
                            'amount'   => $item['amount'],
                        ];
                    }
                }
            }

            // Pass to ALL views
            $view->with([
                'manufacturers' => $manufacturers,
                'cartItems'     => $cartItems,
            ]);
        });
    }
}
