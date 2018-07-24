<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isAuthor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Si l'utilisateur est Admin
        if (Auth::user()->isAdmin() || Auth::user()->isAuthor()) {
            // On redirige vers la page demandée
            return $next($request);
        }

        // Sinon on redirige vers la home
        return redirect('/');
    }
}
