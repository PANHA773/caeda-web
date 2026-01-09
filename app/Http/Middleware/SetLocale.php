<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->has('lang')) {
            $lang = $request->session()->get('lang');
            if (in_array($lang, ['en', 'kh'])) {
                app()->setLocale($lang);
            }
        }

        return $next($request);
    }
}
