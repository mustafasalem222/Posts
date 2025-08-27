<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Http\Requests\StorePostRequest;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()
            ->withAllRelations()
            ->withCount([
                'likes as likes_count',
                'comments as comments_count'
            ])
            ->get();

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $post->loadAllRelations()
            ->loadCount([
                'likes as likes_count',
                'comments as comments_count'
            ]);

        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(StorePostRequest $request)
    {
        $attributes = request()->validate([
            'body' => ['required', 'min:20', 'max:215'],
            'title' => ['required', 'min:5']
        ]);

        Auth::user()->posts()->create([
            'title' => $attributes['title'],
            'body' => $attributes['body'],
        ]);

        return redirect('/posts');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }
    public function update(Post $post)
    {


        $post->update($request->validated());

        return redirect("/posts/$post->id");
        ;
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('posts');
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