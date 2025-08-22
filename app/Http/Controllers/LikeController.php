<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use \Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Post $post, Comment $comment)
    {
        if (request()->is("posts/$post->id/like")) {
            $post->likes()->create([
                'user_id' => Auth::user()->id
            ]);

        } else {
            $comment->likes()->create([
                'user_id' => Auth::user()->id
            ]);
        }

        return back();
    }
    public function destroy(Post $post, Comment $comment)
    {
        if (request()->is("posts/$post->id/like")) {
            $post->likes()->where('user_id', Auth::user()->id)->delete();

        } else {
            $comment->likes()->where('user_id', Auth::user()->id)->delete();
        }

        return back();
    }
}