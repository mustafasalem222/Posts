@props(['post'])

@auth
  @php
    $userLiked = $post->likes
    ->where('user_id', Auth::id())
    ->where('likeable_id', $post->id)
    ->first();
  @endphp

  @if (!$userLiked)
    <form action="/posts/{{ $post->id }}/like" method="POST">
    @csrf
    <button type="submit"
    class="text-red-500 text-2xl cursor-pointer hover:scale-125 transition-transform duration-200 focus:outline-none">
    <span class="flex items-center gap-x-1.5">
      ❤️
      <span class="text-sm text-gray-400 flex items-center justify-center">Like</span>
    </span>
    </button>
    </form>
  @else
    <form action="/posts/{{ $post->id }}/un-like" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit"
    class="text-blue-500 text-2xl cursor-pointer hover:scale-125 transition-transform duration-200 focus:outline-none">
    <span class="flex items-center gap-x-1.5">
      💙
      <span class="text-sm text-gray-400 flex items-center justify-center">Dislike</span>
    </span>
    </button>
    </form>
  @endif
@endauth

{{-- Show total likes count --}}
@if ($post->likes()->count())
  <span class="text-sm text-gray-600 flex items-center justify-center">
    {{ $post->likes()->count() }}
  </span>

  {{-- Show "Like" text for guests (not logged in) --}}
  @guest
    <span class="text-sm text-blue-800 flex items-center justify-center">Likes</span>
  @endguest

@endif