<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Session;
use Hash;

class RegisterController extends Controller
{
    //Return Register Page

    public function showRegisterView(){
        return view('register');
    }


    // Register

    public function register(Request $request){
        $request->validate([
            'userName' => 'required',
            'userGender' => 'required',
            'userEmail' => 'required|unique:users',
            'userAddress' => 'required|min:10',
            'userPassword' => 'required|min:6|confirmed'
        ]);

        $data = $request->all();
        $check = $this->createUser($data);

        return redirect('');
    }

    // Create User

    public function createUser(array $data){

        
        return User::create([
            'userName' => $data['userName'],
            'userAddress' => $data['userAddress'],
            'userGender' => $data['userGender'],
            'userPassword' => Hash::make($data['userPassword']),
            'userEmail' => $data['userEmail'],
            'roleID' => 2,
        ]);
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
