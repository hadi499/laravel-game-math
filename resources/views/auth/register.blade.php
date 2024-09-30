@extends('layouts')

@section('content')
<!-- resources/views/livewire/register-form.blade.php -->
<div class="flex flex-col items-center justify-center mt-6 p-2">
  <div class="flex justify-center mb-3">
    <img src="{{asset('images/sinau-dasar2.png')}}" class="w-56 h-[80px] rounded-lg " alt="logo">

  </div>
  <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8 border">


    <h2 class="text-2xl font-bold text-center text-blue-800 mb-6 mt-3">Create an Account</h2>

    <!-- Form Start -->
    <form action="/register" method="POST">
      @csrf
      <div class="mb-4">
        <label for="name" class="block text-blue-700 font-semibold mb-2">Name</label>
        <input type="text" id="name" name="name"
          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
          value="{{ old('name') }}">
        @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
      </div>

      <!-- Email -->
      <div class="mb-4">
        <label for="email" class="block text-blue-700 font-semibold mb-2">Email</label>
        <input type="email" id="email" name="email"
          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
          value="{{ old('email') }}">
        @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
      </div>

      <!-- Password -->
      <div class="mb-4">
        <label for="password" class="block text-blue-700 font-semibold mb-2">Password</label>
        <input type="password" id="password" name="password"
          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
      </div>

      <!-- Confirm Password -->
      <div class="mb-6">
        <label for="password_confirmation" class="block text-blue-700 font-semibold mb-2">Confirm Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation"
          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        @error('password_confirmation') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
      </div>

      <!-- Submit Button -->
      <div class="flex items-center justify-center">
        <button type="submit"
          class="bg-blue-600 text-white font-semibold px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
          Register
        </button>
      </div>
    </form>
    <!-- Form End -->
  </div>
</div>
@endsection