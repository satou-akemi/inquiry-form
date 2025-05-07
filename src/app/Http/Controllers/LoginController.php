<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function showLoginForm(){
        return view('auth.login');
    }

    public function login(LoginRequest $request){
        $credentials = $request->only('email','password');

        if(Auth::attempt($credentials)){
            return redirect()->intended('/admin');
        }

        return back()->withErrors([
            'login' => 'メールアドレスまたはパスワードが正しくありません。',
        ])->withInput();
    }

     public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
