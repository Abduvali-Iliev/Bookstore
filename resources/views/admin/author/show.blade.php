@extends('layouts.admin')
@section('content')
    <div class="container mb-4">
        <h2>Книжный магазин "РаРиТеТ"</h2>
    </div>
    <div class="card " style="width: 18rem;">
        <div class="card-header">
            Детали автора: {{$author->name}}
        </div>
        <img class="card-img-top " src="{{asset('/storage/' . $author->image)}}" alt="{{$author->image}}">

        <div class="card-body">
            <h5 class="card-title">{{$author->name}}</h5>
            <p class="card-text">
                @if (!is_null($author->description))
                    {{$author->description}}
                @else
                    No description
                @endif
            </p>

            <a href="{{route('admin.authors.index')}}" class="btn btn-default btn-sm">Назад</a>|
            <a href="{{route('admin.authors.edit', ['author' => $author])}}" class="btn  btn-sm">Изменить</a>
        </div>

    </div>
@endsection
