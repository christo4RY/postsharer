<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile(User $user){
        return view('profile',[
            'user' => $user,
            'posts' => Post::latest()->filter('username')->get()
        ]);
    }
}
