<?php

namespace App\Http\Middleware;

use Closure;
use session;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $user_type): Response
    {
        if (session()->get('user_type') == $user_type) {
            return $next($request);
        }

        return redirect()->route('home');
    
    }
}
