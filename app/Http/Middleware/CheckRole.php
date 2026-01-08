<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  ...$roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Cek jika user belum login
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();
        
        // Cek jika user memiliki role yang diizinkan
        // Asumsi: User model memiliki kolom 'role'
        if (!in_array($user->role, $roles)) {
            // Jika tidak memiliki akses, redirect ke halaman tertentu
            abort(403, 'Unauthorized access.');
            // atau: return redirect('/home')->with('error', 'Access denied!');
        }

        return $next($request);
    }
}