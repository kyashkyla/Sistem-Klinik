<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class StaffMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check() || !in_array(Auth::user()->role, ['staff', 'admin'])) {
            abort(403, 'Akses staff klinik atau admin saja.');
        }

        return $next($request);
    }
}