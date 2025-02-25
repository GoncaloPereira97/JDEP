<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Hamcrest\Type\IsNumeric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class CheckTeste
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $userID = session()->get('id');
        $user = User::find($userID);

        if ($user && $user->id_teste === null) {
            return $next($request);
        } else {
            return redirect()->route('teste-vocacional-resultados');
        }
    }
}
