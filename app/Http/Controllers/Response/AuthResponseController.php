<?php

namespace App\Http\Controllers\Response;
use App\Http\Controllers\Controller;
use App\Traits\GuzzleTrait;

use Illuminate\Http\Request;

class AuthResponseController extends Controller
{
    use GuzzleTrait;
    //
   
    public function signin(Request $request)
    {
        $data['page_title']   = 'Reset Password';

        return redirect()->route('settings');
    }

    public function signup(Request $request)
    {
        
    }

    
    public function user(Request $request)
    {
        $response = $this->getRequest('some-endpoint', ['param1' => 'value1'], [
            'Custom-Header' => 'CustomValue'
        ]);
        return $response;
    }

    public function password_recovery($token)
    {
       
    }

    public function verify_email(Request $request)
    {

       
    }

}
