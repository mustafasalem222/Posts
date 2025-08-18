<x-layout>
  <x-slot:heading>
    Job Listings
  </x-slot:heading>
  <x-slot:title>
    Job Listings
  </x-slot:title>
  @auth

    <x-slot:linkName>Create</x-slot:linkName>
  @endauth

  <div class="space-y-4">
    @foreach ($jobs as $job)
    <a href="/jobs/{{ $job['id'] }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
      <div class="font-bold group flex items-center justify-between text-blue-500">
      {{ $job->employer->name }}
      @can ('edit', $job)
      <p class="text-green-500 duration-200 group-hover:text-green-600 font-bold ">Own</p>
    @endcan
      </div>
      <div>
      <strong>{{ $job['title'] }}:</strong> Pays {{ $job['salary'] }} per year.
      </div>
    </a>
  @endforeach
    <div class="mt-auto p-6">
      {{ $jobs->links()}}
    </div>
  </div>
</x-layout>