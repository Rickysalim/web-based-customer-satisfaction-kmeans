<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function attemptLogout() {
        Auth::logout();
        return Redirect(route('auth.index'));
    }

    public function attemptLogin(Request $request) {
        $this->validate($request,
        [
            'username'=> 'required',
            'password'=> 'required'
        ],
        [
            'Username Dibutuhkan',
            'Password Dibutuhkan'
        ],
        [
            'username'=> 'Username',
            'password'=> 'Password'
        ]);

        $credential = $request->only('username', 'password');

        if(Auth::attempt($credential)) {
            return redirect(route('dashboard.index'));
        } else {
            return redirect()->back();
        }
    }
}
