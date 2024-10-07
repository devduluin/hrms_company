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
        
        $company_id = $request->session()->get('company_id');
        if(isset($company_id)){
             
            if($request->session()->get('company_id')[0] == null){
                $lastSegment = $request->segment(count($request->segments()));
                if($lastSegment != 'setup_account'){
                    return redirect(url('dashboard/setup_account'));
                }
            
            };
        }

        $appToken = $request->session()->get('app_token');
        $user       = $this->isUserAuthenticated($appToken);
        if ($appToken == null || !$user) {
             
            $this->clearSession($request);
            return redirect('signin', 201);
        }
        $request->user  = $user;
        return $next($request);
    }

    private function isUserAuthenticated($appToken)
    {
        $headers = [
            'accept' => 'application/json',
            'Authorization' => 'Bearer ' . $appToken,
        ];

        // $response = $this->getRequest(config('apiendpoints.sso') . '/users/user', '', $headers);
        // $response = $this->getRequest('http://api_gatway.test/api/users/user', '', $headers);
        $response = $this->getRequest(config('apiendpoints.gateway') . '/users/user', '', $headers);
        if(isset($response['result']) && !isset($response['error'])){
            
            return $response['result'];
        }else{
            return false;
        }
       
    }

    private function clearSession(Request $request): void
    {
        $request->session()->invalidate();
        $request->session()->forget(['app_token', 'name', 'account']);
        $request->session()->flush();
    }
}
