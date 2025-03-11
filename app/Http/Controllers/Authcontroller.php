<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function signin(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        Auth::attempt($credentials);

        if(!Auth::check()) {
            return view('auth.login')->with('error', 'ax katkhwer');
        }

        return view('dashboard');
    }

    public function register() {
        return view('auth.register');
    }

    public function signup(Request $request) {
        User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
    }
}
