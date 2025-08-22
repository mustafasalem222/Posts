<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->with('user', 'comments', 'likes')->simplePaginate(3);
        return view('posts.index', compact('posts'));
    }


    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function like(Post $post)
    {
        $post->like();

        return back();
    }

    public function unLike(Post $post)
    {
        $post->unLike();

        return back();
    }
}