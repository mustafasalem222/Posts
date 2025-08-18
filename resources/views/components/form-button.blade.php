<div class="pt-4">
  <button {{ $attributes->merge(['class' => 'bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-xl transition duration-200 shadow-sm', 'type' => 'submit']) }}>{{ $slot }}</button>
</div>