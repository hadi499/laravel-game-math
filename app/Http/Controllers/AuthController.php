<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register', [
            'title' => 'Register',

        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:3',
            'password_confirmation' => 'required|same:password',
        ]);


        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['role'] = 'staff';

        User::create($validatedData);

        return redirect('/login')->with('success', 'Registration successful! Please login.');
    }

    public function login()
    {
        return view('auth.login', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',

        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('loginError', 'Login failed!!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
