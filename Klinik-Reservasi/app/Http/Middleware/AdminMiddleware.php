public function handle($request, Closure $next)
{
    if (!Auth::check() || Auth::user()->role !== 'admin') {
        abort(403, 'Akses admin saja.');
    }

    return $next($request);
}
