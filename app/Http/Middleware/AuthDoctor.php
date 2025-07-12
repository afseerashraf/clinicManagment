<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthDoctor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (auth()->guard('doctor')->check()) {
            
            return $next($request);
        }

        if ($request->route() && $request->route()->getName() !== 'showDoctor.login') {

            return redirect()->route('showDoctor.login');
        }
    }
}
