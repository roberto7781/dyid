<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Cookie;
use Session;

class LoginController extends Controller
{

    // Return Login Page
    public function showLoginView()
    {
        return view('index');
    }


    // Validate User
    public function processLogin(Request $request)
    {
        // User information validation
        $request->validate([
            'userEmail' => 'required',
            'userPassword' => 'required'
        ]);

        $credentials = [
            'userEmail' => $request['userEmail'],
            'password' => $request['userPassword'],
        ];

        // Remember me token
        $remember_me  =  $request->remember_me  ? true : false;

        // Calling a function to set cookie time to 5 hours
        $this->setRememberMeTime();   

        // Check whether the credentials inputted is the same with the one in the database
        if (Auth::attempt($credentials, $remember_me)) {
   
            // Creating new session
            $request->session()->regenerate();
            return redirect()->intended('home')->withSuccess('Logged-in');
        }

        // Password or email doesn't matched with data in database
        return back()->withErrors([
            'userPassword' => 'The provided credentials do not match our records.',
        ]);
    }

    protected function setRememberMeTime()
    {
        // set remember me expire time
        $rememberTokenExpireMinutes = 300;

        // Getting Cookie key
        $rememberTokenName = Auth::getRecallerName();

        // reset that cookie's expire time
        Cookie::queue($rememberTokenName, Cookie::get($rememberTokenName), $rememberTokenExpireMinutes);
    }


    public function logOut(Request $request)
    {
     

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
  
      
        return redirect('/');
    }

    // Redirect if logged in
    public function __construct()
    {

        $this->middleware('guest')->except('logOut');
    }
}
