<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class ItqProtect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure( \Illuminate\Http\Request ): ( \Symfony\Component\HttpFoundation\Response )  $next
     */

    public function handle(Request $request, Closure $next): Response
    {
        $usuario = Auth::user();
        if (!$usuario || $usuario->group != 'adm'  && $usuario->group != 'aluno_itq') {
            return redirect()->route('home')->with('info', 'Você não possui permissão para acessar esta área.');
        }
        return $next($request);
    }
}
