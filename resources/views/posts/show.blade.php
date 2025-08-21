<x-layout title="Posts">
  <x-slot:heading>
    Posts
  </x-slot:heading>


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
      @foreach ($post->comments()->whereNull('parent_id')->with('user', 'replies')->get() as $comment)
      <x-comment :comment="$comment" :post="$post" />
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