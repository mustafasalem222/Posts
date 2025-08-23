@props(['post'])

@can('accses', $post)
  <span class="text-blue-900 font-black  ">You</span>
@endcan