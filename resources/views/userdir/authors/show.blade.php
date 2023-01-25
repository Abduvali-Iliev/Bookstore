@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="mb-4">
            <p><a href="{{route('authors.index')}}">Главная</a>->{{$author->name}}</p>
            <h1 class="d-inline-block mr-5">{{$author->name}}</h1>
            <string class="ml-1 text-muted ">Автор</string>
        </div>

        <img class="mb-4 " height="350px" width="280px" src="{{asset('/storage/' . $author->image)}}" alt="{{$author->image}}">
        <p>{{$author->description}}</p>


        <h1 class="m-4">Книги в этого автора</h1>

        @foreach($books as $book)
            @if($book->author_id == $author->id)
                <div class="card mr-5 mb-5" style="width: 18rem; display: inline-block;">
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
    </div>



@endsection

