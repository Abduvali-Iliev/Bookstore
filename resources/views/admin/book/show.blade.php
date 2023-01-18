@extends('layouts.admin')
@section('content')
    <div class="container mb-4">
        <h2>Книжный магазин "РаРиТеТ"</h2>

    <div class="card " style="width: 18rem;">
        <div class="card-header">Детали книги: {{$book->name}}</div>
        <img class="card-img-top" src="{{asset('/storage/' . $book->image)}}" alt="{{$book->image}}">
        <div class="card-body">
            <h5 class="card-title">{{$book->name}}</h5>
            <p class="card-text">
                @if (!is_null($book->description))
                    {{$book->description}}
                @else
                    No description
                @endif
            </p>
        </div>
        <footer class="blockquote-footer mb-3">
            Цена: {{number_format($book->price, 2)}}
        </footer>
    </div>

</div>
@endsection
