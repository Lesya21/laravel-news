@extends('layouts.admin')
@section('title') Список новостей @stop
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список новостей</h1>
        <a href="{{ route('news.create')  }}">Добавить новость</a>
    </div>
    <div>
        <table class="table table-bordered admin-news-item">
            <thead>
            <tr>
                <th>ID</th>
                <th>Категории</th>
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
                    <td>
                        @forelse($news->categories as $category)
                            ({{ $category->id  }}) {{ $category->title }} <br><br>
                        @empty
                            Нет категории
                        @endforelse
                    </td>
                    <td>{{ $news->title }}</td>
                    <td>{{ $news->description }}</td>
                    <td>{{ $news->status }}</td>
                    <td>{{ $news->author }}</td>
                    <td>{{ $news->created_at }}</td>
                    <td>
                        <a href="{{ route('news.edit', ['news' => $news])  }}">Изменить</a><br><br>
                        <button @click.prevent="send({{ $news->id }}, $event.target)">Удалить</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7"><h3>Новостей нет.</h3></td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <script src="{{ mix('js/admin-news-item.js') }}"></script>
    </div>
@endsection
