@props(['comment', 'post'])

<div class="comment mb-4 p-3 space-y-3 bg-white rounded shadow-sm">
  <div class="flex items-center mb-2 justify-between">
    <div class="flex items-center gap-2">
      <span class="font-medium">{{ $comment->user->full_name }}</span>
      <span class="text-gray-500 text-sm">{{ $comment->created_at->format('g:i A') }}</span>
    </div>
    @if ($post->user->is($comment->user))
    <span class="text-gray-600 text-sm">Author</span>
  @endif
  </div>

  <p class="text-gray-700">{{ $comment->body }}</p>

  <div class="mt-2 flex gap-4 text-sm text-gray-500">
    <button class="hover:text-blue-500 cursor-pointer reply-btn">Reply</button>
    <x-like-comment :post="$post" :comment="$comment" />
  </div>

  <!-- Reply form -->
  @auth
    <div class="reply-form mt-3 hidden">
    <form method="POST" action="/posts/{{ $post->id }}/comment/{{ $comment->id }}/reply">
      @csrf
      <textarea name="reply" class="w-full p-2 resize-none border rounded" placeholder="Write a reply..."></textarea>
      <button type="submit" class="mt-2 px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">
      Post Reply
      </button>
    </form>
    </div>
  @endauth

  <!-- Nested Replies -->
  @if ($comment->replies->count())
    <div class="space-y-10">
    @foreach ($comment->replies as $reply)
    <x-reply :comment="$reply" :post="$post" />
    @endforeach
    </div>
  @endif
</div>