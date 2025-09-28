<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Auth\AdminAuthController;
use Closure;
use Illuminate\Http\Request;

class AdminAuth
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if (!AdminAuthController::check()) {
            return redirect('/admin/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        return $next($request);
    }
}