@props(['post', 'edit' => false])

@can('accses', $post)
  @if ($edit)
    <x-link-click href="/posts/{{ $post->id }}/edit">Edit</x-link-click>
  @else
    <span class="text-blue-900 font-black  ">You</span>
  @endif
@endcan