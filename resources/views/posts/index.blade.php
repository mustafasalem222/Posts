<x-layout title="Posts">
  <x-slot:heading>
    Posts
  </x-slot:heading>

  <div class="space-y-10 divide-y-4 divide-blue-900 px-5 my-10">
    @foreach ($posts as $post)
    <div class="bg-white py-6 px-4 flex-col rounded flex   ">
      <div class="flex-1 basis-[5rem] ">
      <a href="/{{  $post->user->first_name}}"
        class="font-medium text-xl">{{ $post->user->first_name . ' ' . $post->user->last_name  }}</a>
      <p>{{ $post->created_at->format('g:i A') }}</p>
      </div>
      <div>
      <h3 class="text-2xl font-bold ">{{ $post->title }}</h3>
      <p class="text-xl font-medium text-wrap my-8">{{ $post->body }}</p>

      </div>
      <div class="flex items-center justify-between">
      <a href="/posts/{{ $post->id }}#comment" class="inline-block text-[#565555] hover:underline  ">Comment</a>
      </div>
    </div>
  @endforeach
  </div>
  <div class="p-6 mt-5">
    {{ $posts->links() }}
  </div>
</x-layout>