@extends('authentication.main')
@section('title', $title)
@section('content')
  <div class="bg-white rounded-xl shadow-lg w-full max-w-xl px-4 py-6">
    <h1 class="text-3xl mb-4">Login.</h1>

    @if (session()->has('authenticate'))
      <ul class="mb-3 list-disc list-inside">
        <li class="text-red-600 text-lg font-semibold">{{ session()->get('authenticate') }}</li>
      </ul>
    @endif
    <form action="{{ route('login') }}" method="POST">
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
      <div>
        <input type="checkbox" name="remember_me" id="remember_me">
        <label for="remember_me">Remember me</label>
      </div>
      <div class="flex justify-between items-center">
        <p class="text-gray-700">Belum ada akun? <a href="{{ route('register') }}"
            class="text-cyan-600 hover:underline">Daftar</a></p>
        <button type="submit"
          class="bg-gray-700 text-white rounded-xl text-sm font-semibold px-5 py-2.5 transition-all duration-300 hover:bg-gray-600">Login</button>
      </div>
    </form>
  </div>
@endsection
