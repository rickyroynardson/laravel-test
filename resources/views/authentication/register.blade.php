@extends('authentication.main')
@section('title', $title)
@section('content')
  <div class="bg-white rounded-xl shadow-lg w-full max-w-xl px-4 py-6">
    <h1 class="text-3xl mb-4">Register.</h1>

    <form action="{{ route('register') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="email" class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-1">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}"
          class="bg-white w-full rounded-lg border px-4 py-2 @error('email') border-red-600 @enderror">
        @error('email')
          <small class="text-red-600">{{ $message }}</small>
        @enderror
      </div>
      <div class="mb-3">
        <label for="password" class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-1">Password</label>
        <input type="password" name="password" id="password" value="{{ old('password') }}"
          class="bg-white w-full rounded-lg border px-4 py-2 @error('password') border-red-600 @enderror">
        @error('password')
          <small class="text-red-600">{{ $message }}</small>
        @enderror
      </div>
      <div class="mb-5">
        <label for="password_confirmation"
          class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-1">Confirm Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation"
          value="{{ old('password_confirmation') }}"
          class="bg-white w-full rounded-lg border px-4 py-2 @error('password_confirmation') border-red-600 @enderror">
        @error('password_confirmation')
          <small class="text-red-600">{{ $message }}</small>
        @enderror
      </div>
      <div class="flex justify-between items-center">
        <p class="text-gray-700">Sudah ada akun? <a href="{{ route('login') }}"
            class="text-cyan-600 hover:underline">Masuk</a></p>
        <button type="submit"
          class="bg-gray-700 text-white rounded-xl text-sm font-semibold px-5 py-2.5 transition-all duration-300 hover:bg-gray-600">Register</button>
      </div>
    </form>
  </div>
@endsection
