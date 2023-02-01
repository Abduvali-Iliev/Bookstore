<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Book;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CommentRequest $request, Book $book)
    {
        $comment = new Comment();
//        $comment->author = $request->input('author');
        $comment->body = $request->input('body');
        $comment->score = $request->input('score');
        $comment->book_id = $book->id;
        $comment->user_id = $request->user()->id;
        $comment->save();
        return response()->json([
            'comment' => view('comments.comment', compact('comment', 'book'))->render()],
            201);
    }

    public function show(Comment $comment)
    {
        $this->authorize('view', $comment);

    }

    public function edit(Book $book, Comment $comment)
    {
        return view('comments.edit', compact('comment', 'book'));
    }

    public function update(Book $book, Comment $comment, Request $request)
    {
        $this->authorize('update', $comment);
        $validated = $request->validate([
                'score' => "required|regex:'[1-5]'",
                'body' => 'required| min: 5']);
        $comment->update($validated);
        return redirect()->route('books.show', compact('book', 'comment'));
    }

    /**
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Book $book, Comment $comment): \Illuminate\Http\RedirectResponse
    {
        $this->authorize('delete', $comment);
        $comment->delete();
        return redirect()
            ->route('books.show', compact('comment', 'book'))
            ->with('status', "comment successfully deleted!");
    }

}
