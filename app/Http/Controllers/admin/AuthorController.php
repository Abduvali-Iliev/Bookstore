<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Author;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $authors = Author::all();
        return view('admin.author.index', compact('authors'));
    }

    /**
     * @return Factory|View|Application
     */
    public function create()
    {
        return view('admin.author.create');
    }

    /**
     * @param AuthorRequest $request
     * @return RedirectResponse
     */
    public function store(AuthorRequest $request)
    {
        $validated = $request->validated();
        $file = $request->file('image');
        if (!is_null($file)){
            $path = $file->store('pictures/authors', 'public');
            $validated['image'] = $path;
        }
        $author = Author::create($validated);
        return redirect()->route('admin.authors.index', $author)->with('status', "{$author->name} successfully created!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return Application|Factory|View
     */
    public function show(Author $author)
    {
        return view('admin.author.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Author $author
     * @return Application|Factory|View|Response
     */
    public function edit(Author $author)
    {
        return view('admin.author.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AuthorRequest $request
     * @param Author $author
     * @return RedirectResponse
     */
    public function update(AuthorRequest $request, Author $author)
    {
        $validated = $request->validated();
        if ($request->hasFile('image')){
            $file = $request->file('image');
            $path = $file->store('image', 'public');
            $validated['image'] = $path;
        }
        $author->update($validated);
        return redirect()->route('admin.authors.index', compact('author'))
            ->with('status', "Author {$author->name} successfully updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Author $author
     * @return RedirectResponse
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()
            ->route('admin.authors.index')
            ->with('status', "{$author->name} successfully deleted!");
    }

}
