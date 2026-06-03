<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Role;

class PermissionMiddleware
{
    public function handle(
        Request $request,
        Closure $next,
        string $permission
    ) {

        $user = auth()->user();

        // Belum login
        if (!$user) {
            abort(403, 'Unauthorized');
        }

        /*
        |--------------------------------------------------------------------------
        | Cari role user
        |--------------------------------------------------------------------------
        */

        $role = Role::where(
            'nama_role',
            $user->role
        )->first();

        // Jika role tidak ditemukan
        if (!$role) {
            abort(403, 'Role tidak ditemukan');
        }

        /*
        |--------------------------------------------------------------------------
        | Ambil permission role
        |--------------------------------------------------------------------------
        */

        $permissions = $role
            ->permissions()
            ->get()
            ->pluck('nama_permission')
            ->toArray();

        /*
        |--------------------------------------------------------------------------
        | Cek permission
        |--------------------------------------------------------------------------
        */

        if (!in_array($permission, $permissions)) {
            abort(403, 'Akses ditolak');
        }

        return $next($request);
    }
}

