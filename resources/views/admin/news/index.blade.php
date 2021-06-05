@extends('layouts.admin')
@section('title') Список новостей @stop
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список новостей</h1>
    </div>
    <div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Описание</th>
                <th>Статус</th>
                <th>Автор</th>
                <th>Дата создания</th>
                <th>Дейсвия</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($newsList as $news)
                <tr>
                    <td>{{ $news->id }}</td>
                    <td>{{ $news->title }}</td>
                    <td>{{ $news->description }}</td>
                    <td>{{ $news->status }}</td>
                    <td>{{ $news->author }}</td>
                    <td>{{ $news->created_at }}</td>
                    <td><a href="">Ред.</a>||<a href="">Уд.</a></td>
                </tr>
            </tbody>
            @empty
                <tr>
                    <td colspan="7"><h3>Новостей нет.</h3></td>
                </tr>
            @endforelse
        </table>
    </div>
@endsection
