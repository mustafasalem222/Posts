<x-layout title="Posts">

  <x-slot:heading>
    Posts
  </x-slot:heading>

  <div class="space-y-10 divide-y-4 divide-blue-900 px-5 my-10">
    @foreach ($posts as $post)

    <div class="bg-white py-6 px-4 flex flex-col gap-y-4 rounded shadow-md">

      <!-- User Info -->
      <div class="flex items-center justify-between">
      <div>
        <a href="/{{ $post->user->first_name }}" class="font-medium text-xl">
        {{ $post->user->first_name . ' ' . $post->user->last_name }}
        </a>
        <p class="text-sm text-gray-500">{{ $post->created_at->format('g:i A') }}</p>
      </div>
      </div>

      <!-- Post Content -->
      <div>
      <h3 class="text-2xl font-bold">{{ $post->title }}</h3>
      <p class="text-xl font-medium text-wrap my-4">{{ $post->body }}</p>
      </div>

      <!-- Actions: Like & Comment -->
      <div class="flex items-center justify-between mt-2">
      @auth

      <div class="flex items-center gap-x-3">
      <x-like-post :post="$post" />
      </div>

      <a href="/posts/{{ $post->id }}#comment" class="inline-block text-[#565555] hover:underline">
      Comment
      </a>
    @endauth
      </div>

    </div>
  @endforeach
  </div>

  <!-- Pagination -->
  <div class="p-6 mt-5">
    {{ $posts->links() }}
  </div>
</x-layout>