<?php

    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\Artisan;
    use App\Http\Controllers\AdminController;
    use App\Http\Controllers\FrontendApiController;
    use App\Http\Controllers\Auth\LoginController;
    use App\Http\Controllers\MessageApiController;
    use App\Http\Controllers\CartApiController;
    use App\Http\Controllers\WishlistApiController;
    use App\Http\Controllers\OrderApiController;
    use App\Http\Controllers\ProductReviewController;
    use App\Http\Controllers\PostCommentController;
    use App\Http\Controllers\CouponApiController;
    use App\Http\Controllers\PayPalController;
    use App\Http\Controllers\NotificationController;
    use App\Http\Controllers\HomeApiController;
    use \UniSharp\LaravelFilemanager\Lfm;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */

    // CACHE CLEAR ROUTE
  
  