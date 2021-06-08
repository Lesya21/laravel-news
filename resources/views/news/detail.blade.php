@extends('layouts.default')
@section('title') {{ $news->title  }} @stop
@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">{{ $news->title  }}</h1>
                <p>{{ $news->created_at }}</p>
                <p>{{ $news->description }}</p>
            </div>
        </div>
    </section>
    <div class="container">
        {{ $news->detail_text  }}
    </div>
@endsection
