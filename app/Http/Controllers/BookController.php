<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('book.index', [
            'title' => 'Book',
            'books' => Book::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $now = Carbon::now();
        // $now = Carbon::createFromDate(2022, 12, 1);
        $noBook = Book::where('nomor_buku', 'like', 'BOOK/' . $now->format('m') . '/%')->orderBy('id', 'DESC')->first();
        if ($noBook) {
            $lastNum = (int) substr($noBook->nomor_buku, -5);
            $lastNum += 1;
            $lastNum = substr('00000' . $lastNum, -5);

            $noBook = substr($noBook->nomor_buku, 0, -8) . $now->format('d') . '/' . $lastNum;
        } else {
            $noBook = 'BOOK/' . $now->format('m') . '/' . $now->format('d') . '/00001';
        }
        return view('book.create', [
            'title' => 'Create Book',
            'noBook' => $noBook
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_buku' => 'required|max:16',
            'nama_pemilik' => 'required',
            'no_hp' => 'required|max:13',
            'email' => 'required|email'
        ]);
        Book::create($validated);
        return redirect(route('book.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('book.edit', [
            'title' => 'Edit Book',
            'book' => $book
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'nomor_buku' => 'required|max:16',
            'nama_pemilik' => 'required',
            'no_hp' => 'required|max:13',
            'email' => 'required|email'
        ]);
        $book->update($validated);
        return redirect(route('book.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect(route('book.index'));
    }
}
