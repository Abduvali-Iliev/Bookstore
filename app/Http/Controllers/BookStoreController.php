<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\BookStore;
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
        $books = BookStore::all();
        return view('userdir.books.index', compact('books'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookStore  $book
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(BookStore $book)
    {
        $authors = Author::all();
        $genres = Genre::all();
        return view('userdir.books.show', compact('book', 'authors', 'genres'));
    }

}
