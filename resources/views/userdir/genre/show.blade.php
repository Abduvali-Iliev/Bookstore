@extends('layouts.app')
@section('content')
    <div class="container">
        <p><a href="{{route('genres.index')}}">Главная</a>->{{$genre->name}}</p>

        <h2>{{$genre->name}}</h2>
        <p>{{$genre->description}}</p>
    </div>


    <h1 class="m-4">Книги в этом жанре</h1>

    @foreach($books as $book)
        @if($book->genre_id == $genre->id)
        <div class="card mr-5 mb-5" style="width: 18rem; display: inline-block; object-fit: cover">
            <div class="card-header">Book {{$book->name}} detail </div>
            <a href="{{route('books.show', ['book' => $book])}}">
            <img class="card-img-top" height="430px" src="{{asset('/storage/' . $book->image)}}" alt="{{$book->image}}">
            </a>
            <div class="card-body">
                <h5 class="card-title">{{$book->name}}</h5>
                <p class="card-text">
                    {{$book->author->name}}
                </p>
            </div>
            <footer class="blockquote-footer mb-3">
                Price: {{number_format($book->price, 2)}}
            </footer>
        </div>
        @endif
    @endforeach
@endsection
