@extends('layouts.app')
@section('content')
    <div class="container">
        <p>Жанр на выбор</p>
        <div class="container inline-block">
            @foreach($authors as $author)
                <div class="card inline-block mr-5" style="width: 18rem; display: inline-block; object-fit: cover">
                    <div class="card-header text-center">
                        Genre
                    </div>
                    <a style="object-fit: cover" class="nav-link" href="{{route('authors.show', ['author' => $author])}}">
                        <img style="object-fit: cover" class="card-img-top" height="400" src="{{asset('/storage/' . $author->image)}}" alt="{{$author->image}}">
                    </a>

                    <div class="card-body border-top">
                        <a class="nav-link" href="{{route('authors.show', ['author' => $author])}}">{{$author->name}}</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
