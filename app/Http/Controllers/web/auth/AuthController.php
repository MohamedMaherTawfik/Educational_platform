<?php

namespace App\Http\Controllers\web\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\userRequest;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function signup(userRequest $request)
    {
        $fields = $request->validated();
        $user = User::create([
            'username' => $fields['username'],
            'email' => $fields['email'],
            'phone' => $fields['phone'],
            'academic_year' => $fields['academic_year'],
            'password' => bcrypt($fields['password']),
        ]);
        Auth::login($user);

        return redirect()->route('home')->with('success', __('messages.register'));
    }

    public function login()
    {
        return view('auth.login');
    }

    public function signin()
    {
        // dd(request()->all());
        $credentials = request(['email', 'password']);
        if (Auth::attempt($credentials)) {
            request()->session()->regenerate();
            return redirect()->route('home')->with('success', __('login successfully'));
        }
        return redirect()->route('login')->with('error', __('login failed'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
