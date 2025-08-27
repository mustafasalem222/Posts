<x-layout title="Posts">

  <x-slot:heading>
    Posts
  </x-slot:heading>

  <x-slot:linkhref>/posts/create</x-slot:linkhref>

  <div class="space-y-10 divide-y-4 divide-blue-900 px-5 my-10">
    @foreach ($posts as $post)
      <x-post :$post />
    @endforeach
  </div>


</x-layout>