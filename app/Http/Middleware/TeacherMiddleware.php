<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TeacherMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah user sudah login dan rolenya teacher
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        if (auth()->user()->role !== 'teacher') {
            abort(403, 'Unauthorized access. Teachers only.');
        }

        return $next($request);
    }
}