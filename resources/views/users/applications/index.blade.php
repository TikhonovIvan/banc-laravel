@extends('layouts.app')

@section('title', 'BankLine | Мои заявки')

@section('content')


    <div
        class="slider-area slider-height"
        style="background-image: url('{{asset('assets/img/hero/h1_hero.jpg')}}')"
    >
        <div class="container pb-5">
            <div class="pt-50 pb-2">
                <div class="row d-flex justify-content-center" >
                    <div class="col-6 text-center">

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible  show" role="alert">
                                <ul class="list-unstyled">
                                    @foreach ($errors->all() as $error)
                                        <li> <strong>{{ $error }}</strong> </li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible  show" role="alert">
                                <strong>{{session('success')}}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h3 class="mb-5 text-center">Мои заявки</h3>
                    </div>
                </div>
            </div>

            <div class="wrapper-block-cards">
                <div class="card" style="width: 18rem">
                    <div class="card-body">
                        <h5 class="card-title">Потребительский кредит</h5>
                        <p class="card-text">Статус заявки: <span>В обработке</span></p>
                        <p class="card-text">Сумма кредита: 100 000cом</p>
                        <a href="show-credit.html" class="btn-cast"
                        >Узнать подробности</a
                        >
                        <a href="#" class="btn-cast">Отметить заявку</a>
                    </div>
                </div>

                <div class="card" style="width: 18rem">
                    <div class="card-body">
                        <h5 class="card-title">Ипотечный кредит</h5>
                        <p class="card-text">Статус заявки: <span>В обработке</span></p>
                        <p class="card-text">Сумма кредита: 100 000cом</p>
                        <a href="show-credit.html" class="btn-cast"
                        >Узнать подробности</a
                        >
                        <a href="#" class="btn-cast">Отметить заявку</a>
                    </div>
                </div>

                <div class="card" style="width: 18rem">
                    <div class="card-body">
                        <h5 class="card-title">Автокредит</h5>
                        <p class="card-text">Статус заявки: <span>В обработке</span></p>
                        <p class="card-text">Сумма кредита: 100 000cом</p>
                        <a href="show-credit.html" class="btn-cast"
                        >Узнать подробности</a
                        >
                        <a href="#" class="btn-cast">Отметить заявку</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
