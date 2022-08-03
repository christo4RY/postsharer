<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile(User $user)
    {
        return view('profile', [
            'user' => $user,
            'posts' => Post::latest()->filter('username')->get()
        ]);
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

    public function destory(Post $post)
    {
        $post->delete();
        return to_route('home');
    }
}
