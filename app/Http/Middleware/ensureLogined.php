<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;


class ensureLogined
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
//        if ((str_contains($request->url(),'posts')||str_contains($request->url(),'profile'))&&!session('loginedEmail') ){
//            return to_route('login.form');
//        }
//        if ((!Session::has('loginedEmail'))){
//            dd(\session());
//        }else {
//            dd(false);
//        }

            return $next($request);

    }
}
