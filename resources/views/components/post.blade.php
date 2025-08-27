@props(['post', 'show' => false])
<div class="bg-white py-6 px-4 flex flex-col gap-y-4 rounded shadow-md">

  <!-- User Info -->
  <div class="flex items-center justify-between">
    <div class="flex items-center justify-between">
      <div>
        <a href="/{{ $post->user->full_name }}" class="font-medium text-xl">
          {{ $post->user->full_name }}
        </a>
        <p class="text-sm text-gray-500">{{ $post->created_at->format('g:i A') }}</p>
      </div>
    </div>
    <x-accses-post :post="$post" />
  </div>

  <!-- Post Content -->
  <div>
    @if ($show)
      <p class="text-2xl font-bold">{{ $post->title }}</p>
    @else
      <a href="/posts/{{ $post->id }}" class="text-2xl font-bold">{{ $post->title }}</a>
    @endif
    <p class="text-xl font-medium text-wrap my-4">{{ $post->body }}</p>
  </div>

  <!-- Actions: Like & Comment -->
  <div class="flex items-center justify-between mt-2">

    <div class="flex items-center gap-x-3">
      <x-like :model="$post" />
    </div>

    @auth
      @if ($show)
        <x-accses-post :post="$post" :edit="1" />
      @else
        <a href="/posts/{{ $post->id }}#comment" class="block text-[#565555] ">
          <div class="flex items-center space-x-4">
            <i class="fa-regular fa-comments text-[#888] mr-1"></i>
            @if ($post->comments_count)
              {{ $post->comments_count }}
            @endif
          </div>
      @endif
      </a>
    @endauth
  </div>

</div>