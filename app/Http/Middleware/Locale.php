<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if(!is_null(Session::get('locale'))){
            App::setLocale(Session::get('locale'));
        }else{
            Session::put('locale','en');
            App::setLocale(Session::get('locale'));
        }


        return $next($request);
    }

}
