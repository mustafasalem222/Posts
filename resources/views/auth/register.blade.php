<x-layout title="Register">
  <x-slot:heading>
    Register
  </x-slot:heading>

  <div class="max-w-2xl mx-auto p-6 bg-white rounded-2xl shadow-md mt-10">
    <div class="flex justify-between items-center">
      <h2 class="text-2xl font-semibold mb-6 text-gray-800">Reigster</h2>
      <p class="text-lg font-bold mb-6 text-gray-800">Join Us</p>
    </div>

    <form action="/register" method="POST" class="space-y-2">
      @csrf

      <div>
        <x-form-label for="first_name">First Name</x-form-label>
        <x-form-input value="{{ old('first_name') }}" type="text" id="first_name" name="first_name" placeholder="Jhon"
          reqiured />

      </div>
      <x-form-error name="first_name" />

      <div>
        <x-form-label for="last_name">Last Name</x-form-label>
        <x-form-input type="text" value="{{ old('last_name') }}" id="last_name" name="last_name" placeholder="Doe"
          reqiured />

      </div>
      <x-form-error name="last_name" />



      <div>
        <x-form-label for="email">Email Address</x-form-label>
        <x-form-input type="email" value="{{ old('email') }}" id="email" name="email" placeholder="jhondoe@example.com"
          reqiured />

      </div>
      <x-form-error name="email" />

      <div>
        <x-form-label for="password">Password</x-form-label>
        <x-form-input type="password" id="password" value="{{ old('password') }}" name="password"
          placeholder="Please Enter A Storng Password" reqiured />

      </div>
      <x-form-error name="password" />
      <div>
        <x-form-label for="password_confirmation">Confirm Password</x-form-label>
        <x-form-input type="password" id="password_confirmation" value="{{ old('password_confirmation') }}"
          name="password_confirmation" placeholder="Confirm Your Passwod" reqiured />

      </div>
      <x-form-error name="password_confirmation" />
      <div class="flex justify-between items-center">
        <a href="/" class="font-bold text-center mt-5 inline-block">Cancel</a>
        <a href="/login" class="font-bold text-center mt-5 inline-block">Signed in ! Login Now</a>
        <x-form-button>Register</x-form-button>
      </div>


    </form>
  </div>

</x-layout>