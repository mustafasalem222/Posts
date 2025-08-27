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

    public function scopeWithAllRelations($query)
    {
        return $query->with([
            'user',
            'likes',
            'comments' => function ($q) {
                $q->whereNull('parent_id')
                    ->with(['user', 'replies.user', 'replies.likes', 'likes'])
                    ->withCount(['likes', 'replies']);
            }
        ]);
    }

    public function loadAllRelations()
    {
        return $this->load([
            'user',
            'likes',
            'comments' => function ($q) {
                $q->whereNull('parent_id')
                    ->with(['user', 'replies.user', 'replies.likes', 'likes'])
                    ->withCount(['likes', 'replies']);
            }
        ]);
    }

}