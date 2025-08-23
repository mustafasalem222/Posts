@props(['name'])
@php
    $defaults = [
        'type' => 'text',
        'id' => $name,
        'name' => $name,
        'class' => 'w-full border border-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500',
        'value' => old($name)
    ];
@endphp
<input {{ $attributes($defaults) }}>