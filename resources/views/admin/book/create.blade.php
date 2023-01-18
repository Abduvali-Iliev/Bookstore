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

    <form method="post" action="{{ route('admin.books.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Название книги</label>
            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
            @error('name')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Описание книги</label>
            <textarea class="form-control" id="description" name="description">{{old('description')}}</textarea>
            @error('description')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="author_id">Автор</label>
            <select name="author_id" class="custom-select">
                {{old('author_id')}}
                @foreach($authors as $author)
                    <option value="{{$author->id}}">{{$author->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="genre_id">Жанр</label>
            <select name="genre_id" class="custom-select">
                {{old('genre_id')}}
                @foreach($genres as $genre)
                    <option value="{{$genre->id}}">{{$genre->name}}</option>
                @endforeach
            </select>
            @error('genre_id')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">Цена</label>
            <input class="form-control" id="price" name="price" value="{{old('price')}}">
            @error('price')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group my-4">
            <div class="custom-file">
                <label class="custom-file-label" for="customFile">Выбрать файл</label>
                <input type="file" class="custom-file-input form-control" id="customFile" name="image" value="{{old('image')}}">
            </div>
            @error('image')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Принять</button>
    </form>
@endsection
