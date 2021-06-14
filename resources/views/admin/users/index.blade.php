@extends('layouts.admin')
@section('title') Список пользователей @stop
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список пользователей</h1>
    </div>
    <div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>E-mail</th>
                <th>Админ</th>
                <th>Дейсвия</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->is_admin ? 'Да' : 'Нет' }}</td>
                    <td>
                        <a href="{{ route('users.edit', ['user' => $user])  }}">Изменить</a>
                        <button @click.prevent="send({{ $user->id }}, $event.target)">Удалить</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7"><h3>Пользователей нет.</h3></td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
