<?php

namespace App\Http\Controllers;

use App\Mail\MustBeFollower;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function store(Post $post)
    {
        $commentData = request()->validate([
            'body' => ['required','min:5']
        ]);

        $post->comments()->create([
            'user_id' => auth()->id(),
            'body' => request('body'),
        ]);

        $followers = $post->followers->filter(fn ($follower) => $follower->id!=auth()->id());
        $followers->each(function ($follower) use ($post) {
            Mail::to($follower->email)->queue(new MustBeFollower($post));
        });

        return redirect("/post/$post->slug");
    }

    public function destory(Post $post)
    {
        foreach ($post->comments as $comment) {
            if (auth()->id() == $comment->user->id) {
                $comment->delete();
                return back();
            }
        }
    }
}
