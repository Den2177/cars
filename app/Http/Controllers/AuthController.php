<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function registerPost()
    {
        request()->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'middle_name' => 'required|string',
            'birth_date' => 'required|date',
            'phone' => 'required|string|size:11',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create(request()->except('password_confirmation'));

        return redirect()->route('login');
    }

    public function loginPost()
    {
        request()->validate([
            'phone' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('phone', request('phone'))->firstWhere('password', request('password'));

        if (!$user) {
            return redirect()->back()->withErrors([
                'message' => 'Такой пользователь не найден',
            ]);
        }

        Auth::login($user);

        return redirect()->route('home');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
