<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        return view('index', [
            'posts' => Post::latest()->filter(['search'])->get()
        ]);
    }

    public function showOne(Post $post)
    {
        return view('post', [
            'post' => $post,
        ]);
    }

    public function create()
    {
        return view('auth.create');
    }

    public function store()
    {
        $formData = request()->validate([
            'body' => 'required | min:3',
        ]);
        $substr = Str::substr($formData['body'], 0, 50);
        $slug = Str::slug($substr);
        $formData['user_id'] = auth()->id();
        $formData['slug'] = $slug;
        $formData['thumbnail'] = request()->file('thumbnail')
            ? request()
                ->file('thumbnail')
                ->store('thumbnails')
            : null;
        Post::create($formData);
        return to_route('home');
    }

    public function edit(Post $post)
    {
        $this->authorize('postEdit', $post);
        return view('auth.edit', [
            'post' => $post,
        ]);
    }

    public function update(Post $post)
    {
        $formData = request()->validate([
            'body' => 'required | min:5',
        ]);
        $formData['slug'] = $post->slug;
        $formData['user_id'] = auth()->id();
        $formData['thumbnail'] = request()->file('thumbnail')
            ? request()
                ->file('thumbnail')
                ->store('thumbnails')
            : $post->thumbnail;
        $post->update($formData);
        return to_route('home');
    }
}
