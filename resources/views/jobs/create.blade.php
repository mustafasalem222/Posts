<x-layout title="Create Job">
  <x-slot:heading>
    Create Job
  </x-slot:heading>

  <div class="max-w-2xl mx-auto p-6 bg-white rounded-2xl shadow-md mt-10">
    <div class="flex justify-between items-center">
      <h2 class="text-2xl font-semibold mb-6 text-gray-800">Create New Job</h2>
      <p class="text-sm font-semibold mb-6 text-gray-800">We Just Need A Handful Of Details From You</p>
    </div>

    <form action="/jobs" method="POST" class="space-y-2">
      @csrf
      <!-- Job Title -->
      <div>
        <x-form-label for="title">Title</x-form-label>
        <x-form-input type="text" id="title" name="title" placeholder="e.g. Frontend Developer" reqiured />

      </div>
      <x-form-error name="title" />
      <!-- Salary -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Salary</label>
        <input type="text" name="salary" placeholder="u.s. $15,000 USD/Year"
          class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>

      <x-form-error name="salary" />
      <!-- Submit Button -->
      <div class="flex justify-between items-center">
        <a href="/jobs" class="font-bold text-center mt-5 inline-block">Cancel</a>
        <x-form-button>Create</x-form-button>
      </div>


    </form>
  </div>

</x-layout>