<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class DokterMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check() || Auth::user()->role !== 'dokter') {
            abort(403, 'Akses dokter saja.');
        }

        return $next($request);
    }
}
