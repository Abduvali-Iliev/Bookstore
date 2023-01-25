@extends('layouts.app')
@section('content')
    <div class="container">
        <p>Жанр на выбор</p>
        <div class="container inline-block">
            @foreach($books as $book)
                <div class="card inline-block mr-5" style="width: 18rem; display: inline-block; object-fit: cover">
                    <div class="card-header text-center">
                        Genre
                    </div>
                    <a style="object-fit: cover" class="nav-link" href="{{route('books.show', ['book' => $book])}}">
                        <img style="object-fit: cover" class="card-img-top" height="400" src="{{asset('/storage/' . $book->image)}}" alt="{{$book->image}}">
                    </a>

                    <div class="card-body border-top">
                        <a class="nav-link" href="{{route('books.show', ['book' => $book])}}">{{$book->name}}</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
