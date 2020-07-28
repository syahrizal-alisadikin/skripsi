<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Dosen
{
    public function handle($request, Closure $next)
    {
        if (!auth::guard('dosen')->check()) {

            return redirect('/login');
        }
        return $next($request);
    }
}
