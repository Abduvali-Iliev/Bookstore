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

    <form method="post" action="{{ route('admin.genres.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Название жанра</label>
            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
            @error('name')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control" id="description" name="description">{{old('description')}}</textarea>
            @error('description')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group my-4">
            <div class="custom-file">
                <label class="custom-file-label" for="customFile">Выберите файл</label>
                <input type="file" class="custom-file-input form-control" id="customFile" name="image" value="{{old('image')}}">
                @error('image')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Принять</button>
    </form>
@endsection
