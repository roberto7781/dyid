<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
        
        if(Auth::attempt($credentials)){

            $request->session()->regenerate();
            return redirect()->intended('home')->withSuccess('Logged-in');

        }

        return back()->withErrors([
            'userPassword' => 'The provided credentials do not match our records.',
        ]);
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
