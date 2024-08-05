<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ActivatedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $isActivated = $request->attributes->get('is_activated');
        // dd($isActivated);
        if ($isActivated == false) {
            return redirect()->route('unactivated');
        }

        return $next($request);
    }
}
