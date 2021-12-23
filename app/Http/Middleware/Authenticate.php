<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */

    protected function redirectTo($request)
    {

        // Redirect user if they access page they aren't supposed to (For Guest)
        if (!$request->expectsJson()) {
            return route('loginView');
        }

     
    }
}
