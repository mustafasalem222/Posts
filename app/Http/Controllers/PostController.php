<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()
            ->with(['user', 'likes'])
            ->withCount('comments')
            ->get();

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $post->loadAllRelations()->loadCount('comments');

        // Get all Comments 
        $comments = $post->comments->whereNull('parent_id');

        function nestedReplies($comments, $post)
        {
            // Get All Replies For Comments
            $comments->each(function ($comment) use ($post) {
                $comment->replies = $post->comments->where('parent_id', $comment->id);

                foreach ($comment->replies as $reply) {
                    // Check If The Reply has Replies
                    if ($post->comments->where('parent_id', $reply['id'])->isEmpty()) {
                        return;
                    }

                    $reply['replies'] = $post->comments->where('parent_id', $reply['id']);
                    // Nested Replies
                    nestedReplies($reply['replies'], $post);
                }
            });
        }

        nestedReplies($comments, $post);

        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(StorePostRequest $request)
    {
        Auth::user()->posts()->create($request->validated());

        return redirect('/posts');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Post $post, UpdatePostRequest $request)
    {
        $post->update($request->validated());

        return redirect("/posts/$post->id");
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