@extends('layouts.admin')
@section('title') Редактировать новость @stop
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать новость</h1>
    </div>
    <div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif

        <form method="post" action="{{ route('news.update', ['news' => $news]) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="category_id">Категория *</label>
                <select class="form-control" name="category_id[]" id="category_id" multiple>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                                {{ ($news->categories()->find($category->id)) ? 'selected' : '' }}
                        >
                            {{ $category->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title">Заголовок *</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ $news->title  }}">
            </div>

            <div class="form-group">
                <label for="image">Логотип</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>
            <div class="form-group">
                <label for="title">Автор</label>
                <input type="text" class="form-control" name="author" id="author" value="{{ $news->author  }}">
            </div>
            <div class="form-group">
                <label for="description">Описание *</label>
                <textarea class="form-control" name="description" id="description">{{ $news->description  }}</textarea>
            </div>
            <div class="form-group">
                <label for="detail_text">Детальный текст</label>
                <textarea class="form-control" name="detail_text" id="detail_text">{{ $news->detail_text  }}</textarea>
            </div>
            <div class="form-group">
                <label for="status">Статус</label>
                <select class="form-control" name="status" id="status">
                    <option @if($news->status == 'draft') selected @endif>draft</option>
                    <option @if($news->status == 'published') selected @endif>published</option>
                    <option @if($news->status == 'blocked') selected @endif>blocked</option>
                </select>
            </div>
            <br>
            <button class="btn btn-success" type="submit">Редактировать новость</button>
        </form>

    </div>
@endsection
