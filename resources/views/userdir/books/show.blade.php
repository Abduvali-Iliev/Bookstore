@extends('layouts.app')
@section('content')
    <div class="container">
        <string><a href="{{route('books.index')}}">Главная</a></string>
        @foreach($genres as $genre)
            @if($genre->id == $book->genre_id)
                <a href="{{route('genres.show', ['genre'=>$genre])}}">->{{$genre->name}}</a>
            @endif
        @endforeach
        ->{{$book->name}}
        @foreach($authors as $author)
            @if($book->author_id == $author->id)
                <h1><a href="{{route('authors.show', ['author' => $author])}}">{{$book->author->name}}</a></h1>
            @endif
        @endforeach
        <h2>{{$book->name}}</h2>

        <img class="mb-4 mr-5" height="460px" style="display: inline-block" width="300px"
             src="{{asset('/storage/' . $book->image)}}" alt="{{$book->image}}">
        <div class="ml-2" style="display: inline-block">

            <p style="display:block">Цена: {{$book->price}}</p>
            @foreach($genres as $genre)
                @if($book->genre_id == $genre->id)
                    <p style="display:block"> Genre: {{$genre->name}}</p>
                @endif
            @endforeach
        </div>

        <hr>
        <p class="mb-5">{{$book->description}}</p>


        <div class="comment-form mt-5 mb-5">
            <form id="create-comment" class="needs-validation" novalidate>
                @csrf
                <input type="hidden" id="book_id" value="{{$book->id}}">
                <div class="form-group">
                    <label for="authorInput">Автор</label>
                    <input name="author" type="text" class="form-control" id="authorInput"
                           aria-describedby="authorHelpText"
                           required>
                    <div class="invalid-feedback">
                        Введённое имя не валидно.
                    </div>
                    <small id="authorHelpText" class="form-text text-muted">Напишите свое имя.</small>
                </div>
                <div class="form-group">
                    <label for="commentFormControl">Коментарии</label>
                    <textarea name="body" class="form-control" id="commentFormControl" rows="3" required></textarea>
                    <div class="invalid-feedback">
                        Введённые коментарии не валидны.
                    </div>
                </div>

                <div class="dropup-center dropup mt-4">
                    <label>
                        Оценка книги
                    </label>
                    <select class="form-select" aria-label="Default select example" name="score">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option selected value="5">5</option>
                    </select>
                </div>

                <div class="text-center">
                    <button id="create-comment-btn" type="submit" class="mt-3 btn btn-outline-primary btn-sm btn-block">
                        Добавить коментарии
                    </button>
                </div>
            </form>

        </div>

    </div>

    <button class="btn btn-outline-secondary mb-4 btn-lg d-block mx-auto" data-bs-toggle="collapse" data-bs-target="#commentCollapse"
            aria-expanded="false" aria-controls="commentCollapse">All comments</button>


    <div class="scrollit collapse multi-collapse" id="commentCollapse" >
        @foreach($book->comments as $comment)
            <div class="card mb-4">
                <div class="card-header">
                    Автор:
                    <string class="text-primary">{{$comment->author}}</string>
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p>{{$comment->body}}</p>
                        <footer class="blockquote-footer">Оценка <cite title="Source Title">{{$comment->score}}</cite>
                        </footer>
                    </blockquote>
                </div>
            </div>
        @endforeach
    </div>


@endsection





