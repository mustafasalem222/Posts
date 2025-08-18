@props(['name'])
@error($name)
  <p class="text-[#f00] text-xs font-bold my-3">{{ $message }}</p>
@enderror