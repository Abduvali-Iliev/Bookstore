@extends('layouts.admin')
@section('content')

    <div class="container">

        <div style="padding-bottom: 30px;">
            <h1>Книги </h1>
            <a href="{{route("admin.books.create")}}" type="button" class="btn btn-outline-primary">
                Добавить новую
            </a>
        </div>

        <table class="table" style="padding-top: 30px">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Название</th>
                <th scope="col">Автор</th>
                <th scope="col">Жанр</th>
                <th scope="col">Цена</th>
                <th scope="col">Действие</th>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
                <tr>
                    <td >{{$loop->iteration}}</td>
                    <td >
                        {{$book->name}}
                    </td>
                    <td >
                        {{$book->author->name}}
                    </td>

                    <td >
                        {{$book->genre->name}}
                    </td>

                    <td>
                        {{$book->price}}
                    </td>
                    <td>
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <a class="btn btn-outline-warning"
                                       href="{{route('admin.books.edit', ['book' => $book])}}">
                                        Изменить
                                    </a>
                                </div>
                                <div class="col-12 col-md-4">
                                    <form method="post" action="{{route('admin.books.destroy', ['book' => $book])}}">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger">Удалить</button>
                                    </form>
                                </div>
                                <div class="col-12 col-md-4">
                                    <a href="{{route('admin.books.show', ['book' => $book])}}">
                                        <button type="submit" class="btn btn-outline-danger">
                                            Показать
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>


@endsection
