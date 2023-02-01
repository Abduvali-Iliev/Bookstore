@extends('layouts.admin')
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container mb-4">
        <h2>Книжный магазин "РаРиТеТ"</h2>
    </div>

    <form class="mb-5" method="post" action="{{ route('books.comments.update', ['book' => $book, 'comment' => $comment]) }}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <h1>Изменить комментарии</h1>

        <div class="form-group">
            <label for="body">Комментарии</label>
            <textarea class="form-control" id="body" name="body" >{{$comment->body}}</textarea>
        </div>

        <div class="dropup-center dropup mt-4" id="score">
            <label>
                Оценка книги
            </label>
            <input type="hidden" id="book_id" value="{{$book->id}}">
            <select class="form-select" aria-label="Default select example" name="score">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option selected value="5">5</option>
            </select>
        </div>

        <br>

        <button type="submit" class="btn btn-primary">Принять изменения</button>
    </form>
@endsection
