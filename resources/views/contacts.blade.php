@extends('layouts.default')
@section('title') Форма для запроса выгрузки @stop
@section('content')

<div class="container" id="order-form">
    <div class="col-8">
        <div class="row py-lg-5">
            <h1 class="fw-light">Форма заказа на получение выгрузки данных</h1>
        </div>

        <form method="POST" action="{{ route('forms.data')  }}">
            @csrf
            <div class="mb-3">
                <input class="form-control" type="text" name="name" v-model="name" placeholder="Имя"/>
            </div>
            <div class="mb-3">
                <input class="form-control" type="text" name="tel" v-model="phone" placeholder="Телефон"/>
            </div>
            <div class="mb-3">
                <input class="form-control" type="email" name="email" v-model="email" placeholder="E-mail"/>
            </div>
            <div class="mb-3">
                <textarea name="comment" class="form-control" type="text" v-model="comment" placeholder="Какие данные вам нужны?"></textarea>
            </div>
            <transition name="fade">
                <div class="modal-header alert alert-success" v-if="success">
                    Отправлено!
                </div>
            </transition>
            <transition name="fade">
                <div class="modal-header alert alert-danger" v-if="error">
                    Ошибка!
                </div>
            </transition>
            <div class="col-8">
                <button class="btn btn-primary btn-lg" type="submit" @click.prevent="send('{{ route('forms.data') }}')">Отправить</button>
            </div>
        </form>
    </div>
</div>
<script src="{{ mix('js/order-form.js') }}"></script>
@endsection
