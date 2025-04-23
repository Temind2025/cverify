<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserHasPermission
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user() && !auth()->user()->hasPermissionTo('access admin panel')) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}