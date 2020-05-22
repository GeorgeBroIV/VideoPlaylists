<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;

class VerifyIfAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth()->check() || !Auth()->user()->hasRole('Admin')) {
            return redirect(RouteServiceProvider::HOME);
        }
        return $next($request);
    }
}
