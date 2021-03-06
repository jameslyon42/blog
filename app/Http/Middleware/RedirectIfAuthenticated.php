<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return response()
                ->json(
                    [
                        'errors'     => [
                            'logged_in' => 'User is already logged in'
                        ],
                        'redirect' => '/admin',
                        'user' => Auth::user()->toArray()
                    ],
                    409
                );
        }

        return $next($request);
    }
}
