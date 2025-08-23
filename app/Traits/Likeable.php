<?php

namespace App\Traits;

use App\Models\Like;

trait Likeable
{
    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function like(): void
    {
        $this->likes()->create(['user_id' => auth()->id()]);
    }

    public function unLike(): void
    {
        $this->likes()->where('user_id', auth()->id())->delete();
    }
}