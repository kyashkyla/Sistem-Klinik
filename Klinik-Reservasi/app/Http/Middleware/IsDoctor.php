<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsDoctor
{
    public function handle(Request $request, Closure $next)
    {
        // cek sudah login atau belum
        if (!auth()->check()) {
            return redirect('/login');
        }

        // cek role
        if (auth()->user()->role !== 'dokter') {
            abort(403, 'Akses khusus dokter');
        }

        return $next($request);
    }
}