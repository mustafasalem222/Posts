<x-layout title="Create Post">
  <x-slot:heading>
    Create Post
  </x-slot:heading>

  <div class="max-w-2xl mx-auto p-6 bg-white rounded-2xl shadow-md mt-10">
    <div class="flex justify-between items-center">
      <h2 class="text-2xl font-semibold mb-6 text-gray-800">Create New Post</h2>
      <p class="text-sm font-semibold mb-6 text-gray-800">Share your thoughts with the community</p>
    </div>

    <form action="/posts" method="POST" class="space-y-4">
      @csrf

      <!-- Post Title -->
      <!-- Post Title -->
      <div>
        <x-form-label for="title">Title</x-form-label>
        <x-form-input name="title" placeholder="Enter post title" required />
        <x-form-error name="title" />
      </div>

      <!-- Post Body -->
      <div>
        <x-form-label for="body">Body</x-form-label>
        <textarea id="body" name="body" rows="6" placeholder="Write your post here..."
          class="w-full border resize-none border-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('body') ?? '' }}</textarea>
        <x-form-error name="body" />
      </div>


      <!-- Actions -->
      <div class="flex justify-between items-center">
        <a href="/posts" class="font-bold text-center mt-5 inline-block">Cancel</a>
        <x-form-button>Create</x-form-button>
      </div>
    </form>
  </div>
</x-layout>