<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserTypeCheck
{
    /**
     * Handle an incoming request.
     * Verifica se o usuário tem o tipo necessário para acessar a rota.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $userType
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $userType = null)
    {
        // Se o tipo de usuário não for especificado, permite o acesso
        if ($userType === null) {
            return $next($request);
        }
        
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        
        if (Auth::user()->role !== $userType) {
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