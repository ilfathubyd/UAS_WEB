<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }
    public function handle($request, \Closure $next, ...$guards)
    {
        $this->authenticate($request, $guards);

        // Check for role if specified in route
        $role = $guards[0] ?? null;
        if ($role && Auth::check() && Auth::user()->role !== $role) {
            // If user does not have the required role, redirect to home or other appropriate page
            return redirect('/home');
        }

        return $next($request);
    }
}
