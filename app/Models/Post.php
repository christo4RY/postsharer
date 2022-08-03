<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory , Searchable;

    public function toSearchableArray()
    {
        return [
        'body' => $this->body,
    ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }

    public function unSubscribe()
    {
        return $this->followers()->detach(auth()->id());
    }

    public function subscribe()
    {
        return $this->followers()->attach(auth()->id());
    }

    public function ScopeFilter($query)
    {
        $query->when(request('search'), function ($query, $profile) {
            $query->whereHas('user', function ($query) use ($profile) {
                $query->where('name', 'LIKE', '%' . $profile . '%');
            });
        });
    }
}
