<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {

        // Redirect user to error page when they access wrong URL (For admin or customer)
        if (! $request->user()->hasRole($role)) {
            return response()->view('errors.404');
            
        }
        return $next($request);
    }
}
