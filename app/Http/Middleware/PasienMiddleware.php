<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PasienMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check() || Auth::user()->role !== 'pasien') {
            abort(403, 'Akses pasien saja.');
        }

        return $next($request);
    }
}
