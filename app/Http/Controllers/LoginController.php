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
    public function showLoginView(){
        return view('index');
    }


    // Validate User

    public function processLogin(Request $request){
        $request->validate([
            'userEmail' => 'required',
            'userPassword' => 'required'
        ]);

        $credentials = [
            'userEmail' => $request['userEmail'],
            'password' => $request['userPassword'],
        ];

        $remember_me  = ( !empty( $request->remember_me ) )? TRUE : FALSE;

        if(Auth::attempt($credentials)){
            $user = User::where('userEmail',$request->userEmail)->first();
            Auth::login($user, $remember_me);
            $request->session()->regenerate();
            $this->setRememberMeTime();
            return redirect()->intended('home')->withSuccess('Logged-in');

        }

        return back()->withErrors([
            'userPassword' => 'The provided credentials do not match our records.',
        ]);
    }
    
    protected function setRememberMeTime()
    {
        // set remember me expire time
        $rememberTokenExpireMinutes = 300;

        // first we need to get the "remember me" cookie's key, this key is generate by laravel randomly
        // it looks like: remember_web_59ba36addc2b2f9401580f014c7f58ea4e30989d
        $rememberTokenName = Auth::getRecallerName();

        // reset that cookie's expire time
        Cookie::queue($rememberTokenName, Cookie::get($rememberTokenName), $rememberTokenExpireMinutes);

    }
    public function logOut(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/');
    }
    // Redirect if logged in

    public function __construct()
    {
      
        $this->middleware('guest')->except('logOut');
    }

}
