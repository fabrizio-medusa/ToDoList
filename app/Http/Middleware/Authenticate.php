<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // Controllo se l'utente è autenticato e se il suo ruolo è admin
        if ($request->user() && $request->user()->role === 'admin') {
            // Se l'utente è un admin, reindirizzalo alla dashboard
            return route('admin.dashboard');
        }

        // Altrimenti, reindirizza l'utente alla pagina di login
        return $request->expectsJson() ? null : route('login');
    }
}
