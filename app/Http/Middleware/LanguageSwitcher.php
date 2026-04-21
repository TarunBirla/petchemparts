<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LanguageSwitcher
{
    public function handle(Request $request, Closure $next)
    {
        // Set the language from the query string, e.g., ?lang=es
        $lang = $request->get('lang', 'en');
        
        // Set the locale for the application
        app()->setLocale($lang);
        
        return $next($request);
    }
}

