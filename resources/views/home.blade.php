@extends('layouts.auth')

@section('content')
    <h1 class="text-3xl">Домашняя страница</h1>

    <form method="post" action="{{ route('user.change', ['user' => $user]) }}">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="title">Имя</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
        </div>
        <div class="form-group">
            <label for="description">E-mail</label>
            <input type="text" class="form-control" name="email" id="email" value="{{ $user->email }}">
        </div>
        <br>
        <br>
        <button class="btn btn-success" type="submit">Изменить пользователя</button>
    </form>
@endsection
