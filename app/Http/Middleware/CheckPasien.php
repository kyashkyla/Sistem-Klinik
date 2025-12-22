<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPasien
{
    public function handle(Request $request, Closure $next)
    {
        if (! $request->session()->has('pasien_id')) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
