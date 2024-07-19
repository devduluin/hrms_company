<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SubdomainMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       // Extract the subdomain
       $host = $request->getHost();
       $parts = explode('.', $host);

       $subdomain = $parts[0];
       $validSubdomains = ['hris', 'hrms-dev', 'devhris'];

       if (!in_array($subdomain, $validSubdomains)) {
           abort(404);
       }
       
       $request->attributes->set('subdomain', $subdomain);

       return $next($request);
    }
}
