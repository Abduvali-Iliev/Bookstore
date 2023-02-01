<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class BookStoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $books = Book::all();
        return view('admin.book.index', compact('books'));
    }

    /**
     * @return Factory|View|Application
     */
    public function create()
    {
        $authors = Author::all();
        $genres = Genre::all();
        return view('admin.book.create', compact('authors', 'genres'));
    }

    /**
     * @param BookRequest $request
     * @return RedirectResponse
     */
    public function store(BookRequest $request)
    {

        $validated = $request->validated();
        $file = $request->file('image');
        if (!is_null($file)){
            $path = $file->store('image', 'public');
            $validated['image'] = $path;
        }
        $book = Book::create($validated);
        return redirect()->route('admin.books.index', $book)
            ->with('status', "{$book->name} successfully created!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return Application|Factory|View
     */
    public function show(Book $book)
    {
        $authors = Author::all();
        $genres = Genre::all();
        return view('admin.book.show', compact('book', 'authors', 'genres'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Book $book
     * @return Application|Factory|View|Response
     */
    public function edit(Book $book)
    {
        $authors = Author::all();
        $genres = Genre::all();
        return view('admin.book.edit', compact('book', 'authors', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateBookRequest $request
     * @param Book $book
     * @return RedirectResponse
     */
    public function update(UpdateBookRequest $request, Book $book): RedirectResponse
    {
        $validated = $request->validated();
        if ($request->hasFile('image')){
            $file = $request->file('image');
            $path = $file->store('pictures/books', 'public');
            $validated['image'] = $path;
        }
        $book->update($validated);
        return redirect()->route('admin.books.index', $book)
            ->with('status', "Book {$book->name} successfully updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Book $book
     * @return RedirectResponse
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()
            ->route('admin.books.index', $book)
            ->with('status', "{$book->name} successfully deleted!");
    }

}
