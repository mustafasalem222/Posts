<x-layout title="Posts">
  <x-slot:heading>
    Posts
  </x-slot:heading>

  <div class="space-y-10 divide-blue-900 px-5 my-10">
    <!-- Post -->
    <div class="bg-white py-6 px-4 flex-col rounded flex">
      <div class="flex-1 basis-[5rem] ">
        <a href="/{{ $post->user->first_name }}"
          class="font-medium text-xl">{{ $post->user->first_name . ' ' . $post->user->last_name }}</a>
        <p>{{ $post->created_at->format('g:i A') }}</p>
      </div>
      <div>
        <h3 class="text-2xl font-bold ">{{ $post->title }}</h3>
        <p class="text-xl font-medium text-wrap my-8">{{ $post->body }}</p>
      </div>
    </div>

    <!-- Comments Section -->
    <div class="bg-white py-6 px-4 flex-col rounded flex">
      @if ($post->comments()->count() > 0)

      <h3 class="text-center my-5 text-3xl font-bold">Comments</h3>

      <div class="flex flex-col justify-center gap-5">
      @foreach ($post->comments()->with('user')->get() as $comment)
      <div class="comment mb-4 p-3 bg-white rounded shadow-sm">
        <div class="flex items-center mb-2 justify-between">
        <div class="flex items-center">
        <span class="font-medium">{{ $comment->user->first_name . ' ' . $comment->user->last_name }}</span>
        <span class="ml-2 text-gray-500 text-sm">{{ $comment->created_at->format('g:i A') }}</span>

        </div>
        @can('view', $comment)
      <h1 class=" text-green-600 ">You</h1>
      @endcan
        </div>
        <p class="text-gray-700">{{ $comment->body }}</p>

        <div class="mt-2 flex gap-4 text-sm text-gray-500">
        <button class="hover:text-blue-500">Like</button>
        <button type="button" class="reply-btn hover:text-blue-500 cursor-pointer">Reply</button>
        </div>
        @auth

      <!-- Reply form (hidden by default) -->
      <div class="reply-form mt-3 hidden">
      <form method="POST" action="/posts/{{ $post->id }}/comment/{{ $comment->id }}/reply">

        @csrf
        <textarea name="reply" class="w-full p-2 resize-none border rounded"
        placeholder="Write a reply..."></textarea>
        <button type="submit" class="mt-2 px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">
        Post Reply
        </button>
      </form>
      </div>
      <!-- Nested Replies (example shape only) -->

      <div class="ml-6 mt-4 space-y-4">
      <div class="reply p-3 bg-gray-50 rounded shadow-sm">
        <div class="flex items-center gap-2 mb-1">
        <span class="font-medium">Nested User</span>
        <span class="text-gray-500 text-xs">4:05 PM</span>
        </div>
        <p class="text-gray-700 text-sm">This is a reply to the comment.</p>

        <div class="mt-1 flex gap-3 text-xs text-gray-500">
        <button type="button" class="reply-btn hover:text-blue-500">Reply</button>
        </div>
        <!-- Nested Reply Form -->
        <div class="reply-form mt-2 hidden">
        <textarea class="w-full p-2 resize-none border rounded"
        placeholder="Write a nested reply..."></textarea>
        <button class="mt-2 px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">Post Reply</button>
        </div>
      </div>
      </div>
      @endauth
      </div>
    @endforeach
      </div>
    @else

      <h3 class="text-center my-5 text-3xl font-bold">No Comments Yet ...</h3>


    @endif

      <!-- Add new comment -->
      @auth
      <form method="POST" action="/posts/{{ $post->id }}/comment" class="my-5">
      @csrf
      <x-form-input type="text" id="comment" name="comment" placeholder="Add Your Comment"
        class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
      </form>
    @endauth
    </div>
  </div>

  <!-- JavaScript -->
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const replyButtons = document.querySelectorAll(".reply-btn");

      replyButtons.forEach(button => {
        button.addEventListener("click", () => {
          const replyForm = button.closest(".comment, .reply").querySelector(".reply-form");

          // اقفل أي فورم مفتوح غير الحالي
          document.querySelectorAll(".reply-form").forEach(form => {
            if (form !== replyForm) {
              form.classList.add("hidden");
            }
          });

          // اعمل toggle للفورم الحالي
          replyForm.classList.toggle("hidden");
        });
      });
    });
  </script>
</x-layout>