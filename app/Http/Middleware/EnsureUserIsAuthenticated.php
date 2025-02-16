<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // If the user is not authenticated, redirect to the student login page
        if (!Auth::guard('student')->check()) {
            return redirect()->route('student.login')->with('error', 'Please log in to access this page.');
        }

        return $next($request);
    }
}