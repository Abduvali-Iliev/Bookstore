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

    <form method="post" action="{{ route('admin.genres.update', ['genre' => $genre]) }}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <h1>Изменить жанр</h1>
        <div class="form-group">
            <label for="name">Название книги</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$genre->name}}">
        </div>

        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control" id="description" name="description">{{$genre->description}}</textarea>
        </div>

        <img src="{{asset('/storage/' . $genre->image)}}" alt="{{$genre->image}}" style="width:110px;height:150px;">
        <br>
        <div class="form-group my-4">
            <div class="custom-file">
                <label class="custom-file-label" for="customFile">Выберите файл</label>
                <input type="file" class="custom-file-input form-control" id="customFile" name="image">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Принять</button>
    </form>
@endsection
