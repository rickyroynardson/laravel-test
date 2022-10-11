@extends('main')
@section('title', $title)
@section('content')
  <div class="min-h-screen max-w-4xl xl:max-w-6xl mx-auto px-5 pt-24">
    <h1 class="text-3xl mb-6 lg:font-semibold lg:text-4xl">
      <span class="pb-2 border-b-2 border-cyan-600">Edit B</span>ook
    </h1>

    <div class="bg-white rounded-xl overflow-x-auto border-x border-t p-6">
      <form action="{{ route('book.update', $book) }}" method="POST">
        @method('PATCH')
        @csrf
        <div class="mb-3">
          <label for="nomor_buku" class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-1">Nomor
            Buku</label>
          <input type="text" name="nomor_buku" id="nomor_buku" value="{{ old('nomor_buku', $book->nomor_buku) }}"
            class="bg-white w-full rounded-lg border px-4 py-2 @error('nomor_buku') border-red-600 @enderror" readonly>
          @error('nomor_buku')
            <small class="text-red-600">{{ $message }}</small>
          @enderror
        </div>
        <div class="mb-3">
          <label for="nama_pemilik" class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-1">Nama
            Pemilik</label>
          <input type="text" name="nama_pemilik" id="nama_pemilik"
            value="{{ old('nama_pemilik', $book->nama_pemilik) }}"
            class="bg-white w-full rounded-lg border px-4 py-2 @error('nama_pemilik') border-red-600 @enderror">
          @error('nama_pemilik')
            <small class="text-red-600">{{ $message }}</small>
          @enderror
        </div>
        <div class="mb-3">
          <label for="no_hp" class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-1">No HP</label>
          <input type="text" name="no_hp" id="no_hp" value="{{ old('no_hp', $book->no_hp) }}"
            class="bg-white w-full rounded-lg border px-4 py-2 @error('no_hp') border-red-600 @enderror">
          @error('no_hp')
            <small class="text-red-600">{{ $message }}</small>
          @enderror
        </div>
        <div class="mb-5">
          <label for="email" class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-1">Email</label>
          <input type="email" name="email" id="email" value="{{ old('email', $book->email) }}"
            class="bg-white w-full rounded-lg border px-4 py-2 @error('email') border-red-600 @enderror">
          @error('email')
            <small class="text-red-600">{{ $message }}</small>
          @enderror
        </div>
        <div class="flex gap-3">
          <button type="submit"
            class="bg-green-600 text-white rounded-xl text-sm font-semibold px-5 py-2.5 transition-all duration-300 hover:bg-green-700">Update</button>
          <a href="{{ route('book.index') }}"
            class="bg-gray-500 text-white rounded-xl text-sm font-semibold px-5 py-2.5 transition-all duration-300 hover:bg-gray-600">Back</a>
        </div>
      </form>
    </div>
  </div>
@endsection
