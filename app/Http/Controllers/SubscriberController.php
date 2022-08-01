<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function subscribers(Post $post){
        if(User::find(auth()->id())->isSubscribe($post)){
            $post->unSubscribe();
        }else{
            $post->subscribe();
        }
        return back();
    }
}
