<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class AdminMiddleware
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

        // Verifica se l'utente è autenticato e se il suo ruolo è admin
        if ($request->user() && $request->user()->role === 'admin') {
            return $next($request); // L'utente è un admin, procedi con la richiesta
        }

        // L'utente non è un admin, reindirizzalo alla home o ad un'altra pagina di errore
        return view('todo'); // Reindirizzamento alla pagina todo
    }
}
