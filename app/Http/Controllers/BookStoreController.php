<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class BookStoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $books = Book::all();
        return view('userdir.books.index', compact('books'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Book $book)
    {
        $authors = Author::all();
        $genres = Genre::all();
        return view('userdir.books.show', compact('book', 'authors', 'genres'));
    }

}
