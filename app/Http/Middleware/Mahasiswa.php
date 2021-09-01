<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Mahasiswa
{
    public function handle($request, Closure $next)
    {
        if (!auth::guard('mahasiswa')->check()) {

            return redirect('/');
        }
        
        return $next($request);
    }
}
