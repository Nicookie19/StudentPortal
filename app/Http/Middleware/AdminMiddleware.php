<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is logged in via session (using Auth facade)
        if (!session()->has('admin_logged_in')) {
            return redirect('/admin/login')->with('error', 'Please log in to access the admin panel.');
        }

        return $next($request);
    }
}

