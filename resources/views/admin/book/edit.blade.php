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

    <form class="mb-5" method="post" action="{{ route('admin.books.update', ['book' => $book]) }}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <h1>Изменить книгу</h1>
        <div class="form-group">
            <label for="name">Название книги</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$book->name}}">
        </div>

        <div class="form-group">
            <label for="description">Описание книги</label>
            <textarea class="form-control" id="description" name="description" >{{$book->description}}</textarea>
        </div>

        <div class="form-group">
            <label for="author_id">Автор</label>
            <select name="author_id" class="custom-select">
                @foreach($authors as $author)
                    <option value="{{$author->id}}">{{$author->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="genre_id">Жанр</label>
            <select name="genre_id" class="custom-select">
                @foreach($genres as $genre)
                    <option value="{{$genre->id}}">{{$genre->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="price">Цена</label>
            <input class="form-control" id="price" name="price" value="{{$book->price}}">
        </div>

        <img src="{{asset('/storage/' . $book->image)}}" alt="{{$book->image}}" style="width:110px;height:170px;">
        <br>
        <div class="form-group my-4">
            <div class="custom-file">
                <label class="custom-file-label" for="customFile">Choose file</label>
                <input type="file" class="custom-file-input form-control" id="customFile" name="image">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Принять изменения</button>
    </form>
@endsection
