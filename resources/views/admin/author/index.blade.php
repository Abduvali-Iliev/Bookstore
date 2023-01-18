@extends('layouts.admin')
@section('content')

    <div class="container">

        <div style="padding-bottom: 30px;">
            <h1>Авторы</h1>
            <a href="{{route("admin.authors.create")}}" type="button" class="btn btn-outline-primary">
                Добавить новую
            </a>
        </div>

        <table class="table" style="padding-top: 30px">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Имя</th>
                <th scope="col">Описание</th>
                <th scope="col">Действие</th>
            </tr>
            </thead>
            <tbody>
            @foreach($authors as $author)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td >
                            {{$author->name}}
                    </td>
                    <td width="51%">
                            {{$author->description}}
                    </td>
                    <td>
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <a class="btn btn-outline-warning"
                                       href="{{route('admin.authors.edit', ['author' => $author])}}">
                                        Изменить
                                    </a>
                                </div>
                                <div class="col-12 col-md-4">
                                    <form method="post" action="{{route('admin.authors.destroy', ['author' => $author])}}">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger">Удалить</button>
                                    </form>
                                </div>
                                <div class="col-12 col-md-4">
                                    <a href="{{route('admin.authors.show', ['author' => $author])}}">
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
