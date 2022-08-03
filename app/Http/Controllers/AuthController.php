<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function loginProfile()
    {
        return back();
    }

    public function storeUser()
    {
        return back();
    }

    public function store()
    {
        $formData = request()->validate([
            'name' => ['required', 'min:3', 'max:10'],
            'username' => ['required', 'min:3', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8'],
        ]);
        $user = User::create($formData);
        auth()->login($user);
        return redirect('/');
    }

    public function login()
    {
        $formData = request()->validate([
            'email' => ['required', 'email', Rule::exists('users', 'email')],
            'password' => ['required'],
        ]);
        if (auth()->attempt($formData)) {
            return redirect('/');
        } else {
            return back()->withErrors([
                'login_fail' => 'Wrong credentials
                Invalid username or password',
            ]);
        }
    }

    public function logout()
    {
        auth()->logout();
        return to_route('home');
    }
}
