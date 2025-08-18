<x-layout title="Login">
  <x-slot:heading>
    Login
  </x-slot:heading>

  <div class="max-w-2xl mx-auto p-6 bg-white rounded-2xl shadow-md mt-10">
    <div class="flex justify-between items-center">
      <h2 class="text-2xl font-semibold mb-6 text-gray-800">Login</h2>
      <p class="text-lg font-bold mb-6 text-gray-800">Wellcome Back !</p>
    </div>

    <form action="/login" method="POST" class="space-y-2">
      @csrf
      <div>
        <x-form-label for="email">Email Address</x-form-label>
        <x-form-input type="email" id="email" name="email" :value="old('email')" placeholder="jhondoe@example.com"
          reqiured />

      </div>
      <x-form-error name="email" />

      <div>
        <x-form-label for="password">Password</x-form-label>
        <x-form-input type="password" id="password" name="password" placeholder="Please Enter A Storng Password"
          reqiured />

      </div>
      <x-form-error name="password" />

      <div class="flex justify-between items-center">
        <a href="/" class="font-bold text-center mt-5 inline-block">Cancel</a>

        <x-form-button>Login</x-form-button>
      </div>


    </form>
  </div>

</x-layout>