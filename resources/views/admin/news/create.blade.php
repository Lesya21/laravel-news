@extends('layouts.admin')
@section('title') Добавить новость @stop
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить новость</h1>
    </div>
    <div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif

        <form method="post" action="{{ route('news.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="category_id">Категория *</label>
                <select class="form-control" name="category_id[]" id="category_id" multiple>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                                {{ (collect(old('category_id'))->contains($category->id)) ? 'selected':'' }}
                        >
                            {{ $category->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title">Заголовок *</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
            </div>

            <div class="form-group">
                <label for="image">Логотип</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>
            <div class="form-group">
                <label for="title">Автор</label>
                <input type="text" class="form-control" name="author" id="author" value="{{ old('author') }}">
            </div>
            <div class="form-group">
                <label for="description">Описание *</label>
                <textarea class="form-control" name="description" id="description">{!! old('description') !!}</textarea>
            </div>
            <div class="form-group">
                <label for="detail_text">Детальный текст</label>
                <textarea class="form-control" name="detail_text" id="detail_text">{!! old('detail_text') !!}</textarea>
            </div>
            <br>
            <button class="btn btn-success" type="submit">Добавить новость</button>
        </form>

    </div>
@endsection


@push('js')
    <script>
	    ClassicEditor
	    .create( document.querySelector( '#detail_text' ) )
	    .then( editor => {
		    console.log( editor );
	    } )
	    .catch( error => {
		    console.error( error );
	    } );
    </script>
@endpush
