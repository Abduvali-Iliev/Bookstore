@extends('layouts.admin')
@section('content')
    <div class="container mb-4">
        <h2>Книжный магазин "РаРиТеТ"</h2>
    </div>
    <div class="card " style="width: 18rem;">
        <div class="card-header">
            Деталь жанра: {{$genre->name}}
        </div>
        <img class="card-img-top" src="{{asset('storage/' . $genre->image)}}" alt="{{$genre->image}}">

        <div class="card-body">
            <h5 class="card-title">{{$genre->name}}</h5>
            <a href="{{route('admin.genres.index')}}" class="btn btn-default btn-sm">Back</a>|
            <a href="{{route('admin.genres.edit', ['genre' => $genre])}}" class="btn btn-primary btn-sm">Edit</a>
        </div>
    </div>

    <p class="mt-5 mb-5">{{$genre->description}}</p>
@endsection
