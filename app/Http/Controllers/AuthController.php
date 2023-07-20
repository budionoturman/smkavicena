<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index(){
        return view('login');
    }
    public function authentication(Request $request){

        $messages = [
            'user_name.required' => 'Username is required',
            'user_name.exists' => 'Username Salah',
            'password.required' => 'Password is required',
        ];

        $validator = Validator::make($request->all(),[
            'user_name' => 'required|exists:users',
            'password' => 'required'
        ], $messages);
        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }else{

            if (Auth::attempt(['user_name' => $request->user_name, 'password' => $request->password])) {
                $request->session()->regenerate();
     
                return redirect()->intended('/');
            };
            return redirect()->back()->withInput($request->only('user_name'))
                    ->withErrors([
                        'password' => 'Password Salah'
                    ]);
        }
        // $credentials = $request->validate([
        //     'user_name' => ['required'],
        //     'password' => ['required'],
        // ]);
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}

