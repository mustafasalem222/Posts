@props(['model' => false])

@auth
  @php
    $userLiked = $model->likes->where('user_id', Auth::id())->where('likeable_id', $model->id)->first();
  @endphp

  @if (!$userLiked)
    <form action="/{{ strtolower(class_basename($model)) . 's'  }}/{{$model->id}}/like" method="POST">

      @csrf
      <button type="submit"
        class="like-btn text-red-500 text-2xl cursor-pointer group transition-transform duration-200 focus:outline-none">
        <span class="flex items-center gap-x-1.5">
          <i class="fa-regular fa-heart transition-all duration-300 ease-in-out transform group-hover:scale-110"></i>
          <span class="text-sm text-gray-400 flex items-center justify-center">Like</span>
        </span>
      </button>
    </form>
  @else
    <form action="/{{ strtolower(class_basename($model)) . 's'  }}/{{$model->id}}/un-like" method="POST">
      @csrf
      @method('DELETE')
      <button type="submit"
        class="dislike-btn text-red-500 text-2xl cursor-pointer group transition-transform duration-200 focus:outline-none">
        <span class="flex items-center gap-x-1.5">
          <i class="fa-solid fa-heart transition-all duration-300 ease-in-out transform group-hover:scale-110"></i>
          <span class="text-sm text-gray-400 flex items-center justify-center">Dislike</span>
        </span>
      </button>
    </form>
  @endif
@endauth
@if ($model->likes->count())
  <span class="text-sm text-gray-600 flex items-center justify-center">
    {{ $model->likes->count()}}
  </span>

  {{-- Show "Like" text for guests (not logged in) --}}
  @guest
    <span class="text-sm text-blue-800 flex items-center justify-center">Likes</span>
  @endguest

@endif

<script>
  // لكل زرار Like أو Dislike
  document.querySelectorAll('.like-btn, .dislike-btn').forEach((btn) => {
    const heartIcon = btn.querySelector('i');

    // Hover effect
    btn.addEventListener('mouseenter', () => {
      if (heartIcon.classList.contains('fa-regular')) {
        heartIcon.classList.remove('fa-regular');
        heartIcon.classList.add('fa-solid');
      } else {
        heartIcon.classList.remove('fa-solid');
        heartIcon.classList.add('fa-regular');
      }
    });

    btn.addEventListener('mouseleave', () => {
      if (heartIcon.classList.contains('fa-solid')) {
        heartIcon.classList.remove('fa-solid');
        heartIcon.classList.add('fa-regular');
      } else {
        heartIcon.classList.remove('fa-regular');
        heartIcon.classList.add('fa-solid');
      }
    });

    // Click effect (يبدل الشكل قبل ما الفورم يتبعت)
    btn.addEventListener('click', () => {
      if (heartIcon.classList.contains('fa-regular')) {
        heartIcon.classList.remove('fa-regular');
        heartIcon.classList.add('fa-solid');
      } else {
        heartIcon.classList.remove('fa-solid');
        heartIcon.classList.add('fa-regular');
      }
    });
  });
</script>