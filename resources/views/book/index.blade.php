@extends('main')
@section('title', $title)
@section('content')
  <div class="min-h-screen max-w-4xl xl:max-w-6xl mx-auto px-5 pt-24">
    <h1 class="text-3xl mb-6 lg:font-semibold lg:text-4xl">
      <span class="pb-2 border-b-2 border-cyan-600">All Bo</span>ok
    </h1>

    <div class="flex justify-end mb-3">
      <a href="{{ route('book.create') }}"
        class="bg-cyan-600 text-white rounded-xl text-sm font-semibold float-right px-4 py-2 transition-all duration-300 hover:bg-cyan-700">Tambah</a>
    </div>

    <div class="bg-white rounded-xl overflow-x-auto border-x border-t">
      <table class="table-auto w-full">
        <thead class="border-b">
          <tr class="bg-gray-50">
            <th class="text-left p-4 font-medium">Nomor Buku</th>
            <th class="text-left p-4 font-medium">Nama Pemilik</th>
            <th class="text-left p-4 font-medium">No HP</th>
            <th class="text-left p-4 font-medium">Email</th>
            <th class="text-left p-4 font-medium">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($books as $book)
            <tr class="border-b hover:bg-gray-100">
              <td class="p-4">{{ $book->nomor_buku }}</td>
              <td class="p-4">{{ $book->nama_pemilik }}</td>
              <td class="p-4">{{ $book->no_hp }}</td>
              <td class="p-4">{{ $book->email }}</td>
              <td class="p-4 flex gap-2">
                <a href="{{ route('book.edit', $book) }}"
                  class="bg-yellow-500 text-white rounded-xl text-xs font-semibold px-3 py-1 transition-all duration-300 hover:bg-yellow-600">Edit</a>
                <form action="{{ route('book.destroy', $book) }}" method="POST"
                  onsubmit="return confirm('Yakin untuk hapus?')">
                  @method('DELETE')
                  @csrf
                  <button type="submit"
                    class="bg-red-600 text-white rounded-xl text-xs font-semibold px-3 py-1 transition-all duration-300 hover:bg-red-700">Hapus</button>
                </form>
              </td>
            </tr>
          @empty
            <tr class="border-b hover:bg-gray-100">
              <td colspan="5" class="p-4">Tidak ada buku ditemukan</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
@endsection
