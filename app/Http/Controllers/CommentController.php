<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**



    /**
     * Store a newly created resource in storage.
     */
    public function store(Post $post, Comment $comment)
    {
        if ($post->is($comment->post)) {

            request()->validate([
                'reply' => ['required']
            ]);
            $post->comments()->create([
                'user_id' => Auth::user()->id,
                'body' => request('reply'),
                'parent_id' => $comment->id
            ]);

        } else {

            request()->validate([
                'comment' => ['required']
            ]);

            $post->comments()->create([
                'user_id' => Auth::user()->id,
                'body' => request('comment')
            ]);
        }

        return back();

    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }

    public function like(Comment $comment)
    {
        $comment->like();

        return back();
    }

    public function unLike(Comment $comment)
    {
        $comment->unLike();

        return back();
    }
}