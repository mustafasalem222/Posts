<x-layout title="Job">
  <x-slot:heading>
    Job Page
  </x-slot:heading>
  <h2 class="font-bold text-2xl mb-6">{{ $job->title}}</h2>
  <p>
    This Job Pays <span class="font-xl text-green-500">{{ $job->salary}}</span> And The Employer Is <strong>
      {{ $job->employer->name }} </strong>
  </p>
  @can ('edit', $job)
    <p class="mt-6 flex items-center justify-between">
    <x-link-click href="{{$job->id}}/edit">Edit</x-link-click>

    </p>
  @endcan

</x-layout>