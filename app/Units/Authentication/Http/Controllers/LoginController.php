<?php
namespace Confee\Units\Authentication\Http\Controllers;

use Confee\Support\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Foundation\Auth\ThrottlesLogins;

/**
 *
 * @author Jeferson Guedes
 *        
 */
class LoginController extends Controller
{
    
    use ThrottlesLogins;
    
    public function login(Request $request) 
    {
        
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            
            return $this->sendLockoutResponse($request);
        }
        
        // grab credentials from the request
        $credentials = $request->only('email', 'password');
        
        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = app('tymon.jwt.auth')->attempt($credentials)) {
                // Increments logins attempts
                $this->incrementLoginAttempts($request);
                
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // Increments logins attempts
            $this->incrementLoginAttempts($request);
            
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        
        // all good so return the token
        return response()->json(compact('token'));
    }
    
    public function username() 
    {
        return 'email';
    }
}

