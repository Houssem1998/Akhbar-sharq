<?php

namespace App\Http\Middleware;

use Carbon\Language;
use Closure;
use Illuminate\Http\Request;

class SetLang
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        \App::setlocale($request->language); // Takes The lang from the URL and set it like a default lang
        //PS: you need to add "app()->getlocale()" to every route to set the lang
        return $next($request);
    }
}
