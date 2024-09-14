<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $user = Auth::user();
        if (!$user->isAdmin() && $role === 'admin') {
            abort(403, 'Unauthorized action.');
        }

        if (!$user->isClient() && $role === 'client') {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
