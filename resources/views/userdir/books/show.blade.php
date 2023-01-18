@extends('base')
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

            <img class="mb-4 mr-5" height="460px"  style="display: inline-block" width="300px" src="{{asset('/storage/' . $book->image)}}" alt="{{$book->image}}">
            <div class="ml-2" style="display: inline-block">

                <p style="display:block">Цена: {{$book->price}}</p>
                @foreach($genres as $genre)
                    @if($book->genre_id == $genre->id)
                        <p style="display:block"> Genre: {{$genre->name}}</p>
                    @endif
                @endforeach
            </div>

            <hr>
            <p>{{$book->description}}</p>

    </div>



@endsection
