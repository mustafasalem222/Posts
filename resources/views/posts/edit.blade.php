<x-layout title="Edit Post">
  <x-slot:heading>
    Edit Post
  </x-slot:heading>

  <div class="max-w-2xl mx-auto p-6 bg-white rounded-2xl shadow-md mt-10">
    <h2 class="text-2xl font-semibold mb-6 text-gray-800">Update Post</h2>

    <form action="/posts/{{ $post->id }}" method="POST" class="space-y-4">
      @csrf
      @method('PATCH')
      <!-- important for edit -->

      <!-- Post Title -->
      <div>
        <x-form-label for="title">Title</x-form-label>
        <x-form-input type="text" id="title" name="title" :value="old('title', $post->title)" required />
        <x-form-error name="title" />
      </div>

      <!-- Post Body -->
      <div>
        <x-form-label for="body">Body</x-form-label>
        <textarea id="body" name="body" maxlength="210" rows="6"
          class="w-full border resize-none border-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
          required>{{ old('body', $post->body) }}</textarea>
        <x-form-error name="body" />
      </div>

      <!-- Actions -->
      <div class="flex justify-between items-center">
        <div class="pt-4 flex items-center space-x-2 justify-between">
          <button type="submit"
            class="bg-blue-600 cursor-pointer hover:bg-blue-700 text-white px-4 py-2 rounded-xl transition duration-200 shadow-sm">
            Update
          </button>
          <x-link-click href="/posts/{{ $post->id }}">Cancel</x-link-click>
        </div>
        <button form="delete-form"
          class=" bg-red-600 cursor-pointer hover:bg-red-700 text-white px-4 py-2 rounded-xl transition duration-200 shadow-sm">Delete</button>
      </div>

    </form>
    <form action="/posts/{{ $post->id }}" method="POST" class="hidden" id="delete-form">
      @csrf
      @method('DELETE')
    </form>
  </div>
</x-layout>