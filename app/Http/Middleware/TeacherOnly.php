<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TeacherOnly
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check() || auth()->user()->role !== 'teacher') {
            return redirect()->route('login')
                ->withErrors(['error' => 'Hanya guru yang dapat mengakses halaman ini.']);
        }

        return $next($request);
    }
}