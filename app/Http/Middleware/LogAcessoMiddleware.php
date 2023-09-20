<?php

namespace App\Http\Middleware;

use App\Models\LogAcesso;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user_id = Auth::id(); // Get the authenticated user's ID
        $rota = $request->getRequestUri();
        $hora_acesso = date('d/m/Y - H:i:s');
        $log = [
            'user_id' => $user_id,
            'log' => 'Hora do acesso: ' . $hora_acesso,
            'rota' => $rota,
        ];

        LogAcesso::create($log);
        return $next($request);
    }
}
