<?php

namespace App\Http\Middleware;

use App\Traits\GuzzleTrait;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class AuthMiddleware
{
    use GuzzleTrait;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next)
    {
        $company_id = $request->session()->get('company_id');
        $appToken   = $request->session()->get('app_token');

        if (!$company_id) {
            if ($request->segment(count($request->segments())) != 'setup_account') {
                return redirect(url('dashboard/setup_account'));
            }
        } else {
            // Cache company settings to avoid frequent API requests
            $this->cacheCompanySettings($company_id, $appToken, $request);
        }

        // Authenticate the user and check token
        $user = $this->isUserAuthenticated($appToken);
        if (!$appToken || !$user) {
            $this->clearSession($request);
            return redirect('signin', 201);
        }

        $request->user = $user;
        return $next($request);
    }

    /**
     * Cache company settings and set locale if necessary.
     *
     * @param string $company_id
     * @param string $appToken
     * @param \Illuminate\Http\Request $request
     */
    private function cacheCompanySettings($company_id, $appToken, Request $request)
    {
        $cacheKey = 'company_settings_' . $company_id;

        $cachedSettings = Cache::remember($cacheKey, now()->addMinutes(20), function () use ($company_id, $appToken) {
            $headers = [
                'accept' => 'application/json',
                'Authorization' => 'Bearer ' . $appToken,
            ];

            $response = $this->getRequest(config('apiendpoints.gateway') . '/v1/companies/company/setting/' . $company_id, '', $headers);
            $responseBody = json_decode($response->getBody(), true);

            return $responseBody['data'] ?? null;
        });

        if (!$cachedSettings) {
            if ($request->segment(count($request->segments())) != 'setup_initialize') {
                return redirect(url('dashboard/hrms/setup_initialize'));
            }
        }

        if (isset($cachedSettings['company_id_rel']['language'])) {
            session(['locale' => $cachedSettings['company_id_rel']['language']]);
        }
    }

    /**
     * Check if the user is authenticated and cache the result.
     *
     * @param string $appToken
     * @return mixed|bool
     */
    private function isUserAuthenticated($appToken)
    {
        // Define cache key based on token
        $cacheKey = 'user_auth_' . md5($appToken);

        // Try to retrieve user data from cache
        return Cache::remember($cacheKey, now()->addMinutes(20), function () use ($appToken) {
            $headers = [
                'accept' => 'application/json',
                'Authorization' => 'Bearer ' . $appToken,
            ];

            $response = $this->getRequest(config('apiendpoints.gateway') . '/users/user', '', $headers);
            $responseBody = json_decode($response->getBody(), true);

            if (isset($responseBody['result']) && !isset($responseBody['error'])) {
                return $responseBody['result'];
            }

            return false;
        });
    }

    /**
     * Clear the session if the user is not authenticated.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    private function clearSession(Request $request): void
    {
        $request->session()->invalidate();
        $request->session()->forget(['app_token', 'name', 'account']);
        $request->session()->flush();
    }
}
