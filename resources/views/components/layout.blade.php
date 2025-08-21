<!DOCTYPE html>
<html class="h-full bg-gray-100">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/js/app.js'])
  <title>{{$title}}</title>
</head>

<body class="h-full">
  <div class="min-h-full">
    <nav class="bg-gray-800">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
          <div class="flex items-center">
            <div class="shrink-0">
              <img class="size-8" src="{{ asset('images/how-to-read-code-season-2.webp') }}" alt="Your Company" />
            </div>
            <div class="hidden md:block">
              <div class="ml-10 flex items-baseline space-x-4">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>

                <x-nav-link href="/posts" :active="request()->is('posts*')">Posts</x-nav-link>

                <x-nav-link href="/jobs" :active="request()->is('jobs*')">Jobs</x-nav-link>

                <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
              </div>
            </div>
          </div>
          @guest
        <div class="flex items-center justify-between">
        <x-nav-link href="/login" :active="request()->is('login')">Login</x-nav-link>
        <x-nav-link href="/register" :active="request()->is('register')">Register</x-nav-link>
        </div>
      @endguest
          @auth
        <form method="POST" action="/logout">
        @csrf
        <x-form-button-destroy>Log Out</x-form-button-destroy>
        </form>
      @endauth
        </div>
      </div>


    </nav>

    <header class="bg-white shadow-sm">
      <div class="mx-auto max-w-7xl px-4 flex items-center justify-between py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $heading }}</h1>
        @if ($linkName ?? false)
      <x-link-click href="/jobs/create">{{ $linkName }}</x-link-click>
    @endif
      </div>


    </header>
    <main>
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        {{ $slot }}
      </div>
    </main>
  </div>

</body>

</html>