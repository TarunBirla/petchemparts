<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Check if the locale is set in session
        $locale = Session::get('locale', 'en');  // Default to 'en' if not set
        App::setLocale($locale);  // Set the app locale based on session

        return $next($request);  // Proceed with the request
    }
}
