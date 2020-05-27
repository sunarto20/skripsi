<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        // dd(bcrypt($request->password));

        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('username', 'password'))) {
            return redirect('/');
        }

        return redirect()->route('login')->with('status', 'Username atau Password Salah!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
