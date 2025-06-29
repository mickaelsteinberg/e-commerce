<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{

    public function login()
    {
        return view('auth.login');
    }

    public function doLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:4'
        ]);

        $userEstValide = \Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]);

        if ($userEstValide) {
            $request->session()->regenerate();

            if (auth()->user()->role === 'admin') {
                return redirect()->intended(route('admin.index')); // Dashboard admin
            } else {
                return redirect()->intended(route('home')); // Page d'accueil client
            }
        }

        return back()->withErrors([
            'email' => 'L’email ou le mot de passe est invalide'
        ])->only('email');
    }

    public function logout()
    {
        \Auth::logout();
        return to_route('home');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function doRegister(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed|min:4',
        ]);

        User::create($validated);
        
        return to_route('login');
    }
}
