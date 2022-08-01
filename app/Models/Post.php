<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function followers(){
        return $this->belongsToMany(User::class);
    }

    public function unSubscribe(){
        return $this->followers()->detach(auth()->id());
    }

    public function subscribe(){
        return $this->followers()->attach(auth()->id());
    }

    public function ScopeFilter($query)
    {
        // $query->when(request('search'), function ($query, $search) {
        //     $query->where('body', 'LIKE', '%' . $search . '%');
        // });

        $query->when(request('search'), function ($query, $profile) {
            $query->whereHas('user', function ($query) use ($profile) {
                $query->where('name', 'LIKE', '%' . $profile . '%');
            });
        });
    }
}
