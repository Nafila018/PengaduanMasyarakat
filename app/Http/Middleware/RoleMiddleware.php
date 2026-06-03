<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        // CEK LOGIN
        if (!Auth::check()) {

            return redirect('/login')
                ->with('error', 'Silakan login terlebih dahulu');

        }

        // CEK ROLE
        if (Auth::user()->role != $role) {

            Auth::logout();

            return redirect('/login')
                ->with('error', 'Akses ditolak');

        }

        return $next($request);
    }
}

