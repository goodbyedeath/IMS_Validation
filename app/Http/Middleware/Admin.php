<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    
    
        public function handle(Request $request, Closure $next): Response
        {
            if (!Auth::guard('admin')->check()) {
                return redirect()->route('admin_login')->with('error', 'You are not authorized as Admin!');
            }
    
            return $next($request);
        }
    
    
}

