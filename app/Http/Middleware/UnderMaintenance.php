<?php

namespace App\Http\Middleware;

use Closure;

class UnderMaintenance
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->check()) {
            if ($request->user()->can('isAdmin')) {

                return $next($request);

            }
        }

        return abort(501,'UnderMaintenance');
    }
}