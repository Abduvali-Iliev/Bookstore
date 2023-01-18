<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GenreRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Author;
use App\Models\BookStore;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|\Illuminate\Http\Response
     */
    public function index()
    {
        $genres = Genre::all();
        return view('admin.genre.index', compact('genres'));
    }

    /**
     * @return Factory|View|Application
     */
    public function create()
    {
        return view('admin.genre.create');
    }

    /**
     * @param GenreRequest $request
     * @return RedirectResponse
     */
    public function store(GenreRequest $request)
    {
        $validated = $request->validated();
        $file = $request->file('image');
        if (!is_null($file)){
            $path = $file->store('image', 'public');
            $validated['image'] = $path;
        }
        $genre = Genre::create($validated);
        return redirect()->route('admin.genres.index')->with('status', "{$genre->name} successfully created!");
    }

    /**
     * Display the specified resource.
     *
     * @param Genre $genre
     *
     */
    public function show(Genre $genre)
    {

        return view('admin.genre.show', compact('genre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Genre $genre
     * @return Application|Factory|View
     */
    public function edit(Genre $genre)
    {
        return view('admin.genre.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param GenreRequest $request
     * @param Genre $genre
     * @return RedirectResponse
     */
    public function update(GenreRequest $request, Genre $genre)
    {
        $validated = $request->validated();
        if ($request->hasFile('image')){
            $file = $request->file('image');
            $path = $file->store('pictures/genres', 'public');
            $validated['image'] = $path;
        }
        $genre->update($validated);
        return redirect()->route('admin.genres.index', compact('genre'))
            ->with('status', "Genre {$genre->name} successfully updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Genre $genre
     * @return RedirectResponse
     */

    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect()
            ->route('admin.genres.index')
            ->with('status', "{$genre->name} successfully deleted!");
    }

}
