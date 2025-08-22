@props(['comment', 'post'])

@php
  $userLiked = $comment->likes->where('user_id', Auth::user()->id)->where('likeable_id', $comment->id)->first();
@endphp

@if (!$userLiked)
  <form action="/posts/{{ $post->id }}/comment/{{ $comment->id }}/like" method="POST">

    @csrf
    <button type="submit"
    class="text-red-500 text-2xl cursor-pointer hover:scale-125 transition-transform duration-200 focus:outline-none">
    <span class="flex items-center gap-x-1.5">
      ❤️
      <span class="text-sm text-gray-400">Like</span>
    </span>
    </button>
  </form>
@else
  <form action="/posts/{{ $post->id }}/comment/{{ $comment->id }}/like" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit"
    class="text-blue-500 text-2xl cursor-pointer hover:scale-125 transition-transform duration-200 focus:outline-none">
    <span class="flex items-center gap-x-1.5">
      💙
      <span class="text-sm text-gray-400">Dislike</span>
    </span>
    </button>
  </form>
@endif
@if ($comment->likes()->count())
  <span class="text-sm text-gray-600 flex items-center justify-center">{{ $comment->likes()->count() }}</span>
@endif