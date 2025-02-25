<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class emailVerificado
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userId = session()->get('id');
        $user = User::find($userId);
        if ($user && $user->verified === 0) {
            if($user->user_type === 3){
                return redirect()->route('verificar-email');
            } else {
                return redirect()->route('verificar-email-instituicao');
            }
        } else {
            return $next($request);
        }
            }
}
