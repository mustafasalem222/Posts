<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Likeable;

class Post extends Model
{
    use HasFactory, Likeable;

    protected $fillable = ['title', 'body'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function tag()
    {
        return $this->morphTo(Tag::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }



    public function loadAllRelations()
    {
        return $this->load([
            'user',
            'likes',
            'comments.user',
            'comments.likes'
        ]);
    }

}