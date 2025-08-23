@props(['linkhref'])

@php
  $defaults = [
    'class' => 'bg-slate-600 hover:bg-slate-700 text-white px-4 py-2 rounded-xl transition duration-200 shadow-sm',
  ];
  $defaults['href'] = $linkhref ?? '';
@endphp
<a {{ $attributes($defaults) }}>{{ $slot }}</a>