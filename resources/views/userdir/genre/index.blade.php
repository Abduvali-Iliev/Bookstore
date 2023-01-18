@extends('base')
@section('content')
    <div class="container">
        <p>Жанр на выбор</p>
        <div class="container inline-block">
            @foreach($genres as $genre)
            <div class="card inline-block mr-5" style="width: 18rem; display: inline-block; object-fit: cover">
                <div class="card-header text-center">
                   Genre
                </div>
                <a style="object-fit: cover" class="nav-link" href="{{route('genres.show', ['genre' => $genre])}}">
                    <img style="object-fit: cover" class="card-img-top" height="400" src="{{asset('/storage/' . $genre->image)}}" alt="{{$genre->image}}">
                </a>

                <div class="card-body border-top">
                    <a class="nav-link" href="{{route('genres.show', ['genre' => $genre])}}">{{$genre->name}}</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
