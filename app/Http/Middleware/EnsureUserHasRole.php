<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $requiredRole = Str::lower($role);
        $userRole = Str::lower((string) Auth::user()->role);

        if ($userRole !== $requiredRole) {
            // Redirect to the correct dashboard based on role
            if ($userRole === 'admin') {
                return redirect('/dashboard-admin');
            } elseif ($userRole === 'dosen') {
                return redirect('/dosen/dashboard');
            } elseif ($userRole === 'mahasiswa') {
                return redirect('/dashboard');
            }
            
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
