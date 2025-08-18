<x-layout title="Edit {{ $job->title }}">
  <x-slot:heading>
    Edit Job: {{ $job->title }}
  </x-slot:heading>

  <div class="max-w-2xl mx-auto p-6 bg-white rounded-2xl shadow-md mt-10">
    <div class="flex justify-between items-center">
      <h2 class="text-2xl font-semibold mb-6 text-gray-800">Edit Your Job</h2>
    </div>

    <form action="/jobs/{{ $job->id }}" method="POST" class="space-y-2">
      @method('PATCH')
      @csrf
      <!-- Job Title -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Job Title</label>
        <input type="text" name="title" value="{{ $job->title }}" placeholder="e.g. Frontend Developer"
          class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>
      @error('title')
      <p class="text-[#f00] text-xs font-bold my-3">{{ $message }}</p>
    @enderror
      <!-- Salary -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Salary</label>
        <input type="text" name="salary" value="{{ $job->salary }}" placeholder="u.s. $15,000 USD/Year"
          class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>
      @error('salary')
      <p class="text-[#f00] text-xs font-bold my-3">{{ $message }}</p>
    @enderror

      <!-- Submit Button -->
      <div class="flex justify-between items-center">
        <button form="delete-form"
          class=" bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-xl transition duration-200 shadow-sm">Delete</button>
        <div class="pt-4 flex items-center space-x-2 justify-between">
          <x-link-click href="/jobs/{{ $job->id }}">Cancel</x-link-click>
          <button type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-xl transition duration-200 shadow-sm">
            Update
          </button>
        </div>
      </div>

    </form>
    <form action="/jobs/{{ $job->id }}" method="POST" class="hidden" id="delete-form">
      @csrf
      @method('DELETE')
    </form>
  </div>

</x-layout>