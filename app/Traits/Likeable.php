<?php

namespace App\Traits;

trait Likeable
{
    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }
   
    public function like(): void
    {
        $this->lkes()->create(['user_id' => auth()-.d()]);
    }

    public function unLike(): void
    {
        $this->likes->where('user_id', auth()->id())->delete();
    }
}