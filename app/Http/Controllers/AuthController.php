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

    public function loginProfile(){
        return back();
    }

    public function storeUser(){
        return back();
    }

    public function store()
    {
        $formData = request()->validate([
            'name' => ['required', 'min:3','max:10'],
            'username' => ['required', 'min:3', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8'],
        ]);
        $user = User::create($formData);
        auth()->login($user);
        return redirect('/');
    }

    public function upload(User $user)
    {
        $uploadData = request()->validate([
            'avator' => 'required',
        ]);
        $uploadData['avator'] = request()->file('avator')->store('avators');
        $user->update($uploadData);
        return back();
    }

    public function login()
    {
        $formData = request()->validate([
            'email' => ['required', 'email', 'min:3', 'max:255', Rule::exists('users', 'email')],
            'password' => ['required', 'min:3', 'max:255'],
        ]);
        if (auth()->attempt($formData)) {
            return redirect('/');
        } else {
            return back()->withErrors([
                'login_fail' => 'Username and Password Wrong!',
            ]);
        }
    }

    public function logout()
    {
        auth()->logout();
        return to_route('login');
    }
}
