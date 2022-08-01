<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('index',[
            'posts' => Post::latest()
                ->filter(['search'])
                ->get(),
        ]);
    }

    // public function show()
    // {
    //     return view('posts', [
    //         'posts' => Post::latest()
    //             ->filter(['search', 'profile'])
    //             ->get(),
    //     ]);
    // }

    public function showOne(Post $post)
    {
        return view('post', [
            'post' => $post,
        ]);
    }

    public function uploadpost()
    {
        $postData = request()->validate([
            'body' => 'required | min:10',
        ]);
        $str = $postData['body'];
        $strs = substr($str, 0, 50);
        $substr = str_replace(' ', '-', $strs);
        $slug = strtolower($substr);
        Post::create([
            'slug' => $slug,
            'body' => $postData['body'],
            'user_id' => auth()->id()
        ]);

        return back();
    }
}
