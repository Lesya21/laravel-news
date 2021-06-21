@extends('layouts.admin')
@section('title') Изменить пользователя @stop
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Изменить пользователя</h1>
    </div>
    <div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif

        <form method="post" action="{{ route('users.update', ['user' => $user]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title">Имя</label>
                <input readonly type="text" class="form-control" name="title" id="title" value="{{ $user->name }}">
            </div>
            <div class="form-group">
                <label for="description">E-mail</label>
                <input readonly type="text" class="form-control" name="email" id="email" value="{{ $user->email }}">
            </div>
            <br>
            <div class="form-check">
                <label class="form-check-label" for="is_admin">Администратор</label>
                <input class="form-check-input" {{ ($user->is_admin) ? 'checked' : '' }} type="checkbox" value="1" id="is_admin" name="is_admin">
            </div>
            <br>
            <button class="btn btn-success" type="submit">Изменить пользователя</button>
        </form>

    </div>
@endsection
