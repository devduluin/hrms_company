<?php

namespace App\Http\Middleware;

use App\Traits\GuzzleTrait;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    use GuzzleTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $appToken = $request->session()->get('app_token');
        if ($appToken == null || !$this->isUserAuthenticated($appToken)) {
            $this->clearSession($request);
            return redirect('signin', 201);
        }
        return $next($request);
    }

    private function isUserAuthenticated(string $appToken): bool
    {
        $headers = [
            'accept' => 'application/json',
            'Authorization' => 'Bearer ' . $appToken,
        ];

        $response = $this->getRequest(config('apiendpoints.sso') . '/users/user', '', $headers);

        return isset($response['result']) && !isset($response['error']);
    }

    private function clearSession(Request $request): void
    {
        $request->session()->invalidate();
        $request->session()->forget(['app_token', 'name', 'account']);
        $request->session()->flush();
    }
}
