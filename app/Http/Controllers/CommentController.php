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
        $comment->author = $request->input('author');
        $comment->body = $request->input('body');
        $comment->score = $request->input('score');
        $comment->book_id = $book->id;
        $comment->save();
        return response()->json(['comment' => $comment], 201);
    }
}
