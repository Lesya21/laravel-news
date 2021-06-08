@extends('layouts.admin')
@section('title') Список категорий @stop
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список категорий</h1>
    </div>
    <div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Активность</th>
                <th>Название</th>
                <th>Описание</th>
                <th>Дата создания</th>
                <th>Дейсвия</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->active }}</td>
                    <td>{{ $category->title }}</td>
                    <td>{{ $category->description }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td><a href="">Ред.</a>||<a href="">Уд.</a></td>
                </tr>
            </tbody>
            @empty
                <tr>
                    <td colspan="5"><h3>Категорий нет.</h3></td>
                </tr>
            @endforelse
        </table>
    </div>
@endsection
