<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class cekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$role)
    {
        
        if (auth()->user() && in_array(auth()->user()->role, $role)) {
            return $next($request);
        }

        return redirect('/dashboard')->with('Anda Tidak Dapat Izin Akses Halaman Ini',400);
    }
}
