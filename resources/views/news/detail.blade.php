@extends('layouts.default')
@section('title') Новость с id {{ $id  }} @stop
@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Детальная новость</h1>
            </div>
        </div>
    </section>
    <div class="container">
        Новость с id {{ $id  }}
    </div>
@endsection
