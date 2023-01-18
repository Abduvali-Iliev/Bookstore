@extends('layouts.admin')
@section('content')

    <div class="container">

    <div style="padding-bottom: 30px;">
        <h1>Жанры</h1>
        <a href="{{route("admin.genres.create")}}" type="button" class="btn btn-outline-primary">
            Добавить новую
        </a>
    </div>

    <table class="table" style="padding-top: 30px">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название</th>
            <th scope="col">Описание</th>
            <th scope="col">Действие</th>
        </tr>
        </thead>
        <tbody>
        @foreach($genres as $genre)
            <tr class="">
                <th scope="row">{{$loop->iteration}}</th>
                <td class="">
                    {{$genre->name}}
                </td>
                <td class="sm" width="51%">
                    {{$genre->description}}
                </td>
                <td>
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <a class="btn btn-outline-warning"
                                   href="{{route('admin.genres.edit', ['genre' => $genre])}}">
                                    Изменить
                                </a>
                            </div>
                            <div class="col-12 col-md-4">
                                <form method="post" action="{{route('admin.genres.destroy', ['genre' => $genre])}}">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger">Удалить</button>
                                </form>
                            </div>
                            <div class="col-12 col-md-4">
                                        <a href="{{route('admin.genres.show', ['genre' => $genre])}}">
                                            <button type="submit" class="btn btn-outline-danger">
                                            Показать
                                            </button>
                                        </a>
                            </div>
                        </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    </div>


@endsection
