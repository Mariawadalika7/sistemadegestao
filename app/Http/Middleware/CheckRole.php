<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     * Verifica se o usuário tem a função (role) necessária para acessar a rota.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role = null)
    {
        // Se o papel não for especificado, permite o acesso
        if ($role === null) {
            return $next($request);
        }
        
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        
        if (Auth::user()->role !== $role) {
            // Redirecionar de acordo com o papel do usuário autenticado
            if (Auth::user()->role === 'admin') {
                return redirect()->route('dashboard');
            } elseif (Auth::user()->role === 'funcionario') {
                return redirect()->route('funcionario');
            }
            
            // Fallback para login se o papel não for reconhecido
            return redirect()->route('login');
        }

        return $next($request);
    }
}
