<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /** @use HasFactory<\Database\Factories\CommentFactory> */
    use HasFactory;


    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        // He Expected Forgin Id For comments_id

        return $this->hasMany($this, 'parent_id')->with('user', 'replies');

    }
    public function parent()
    {
        return $this->belongsTo($this);
    }


    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }
}