@extends('layouts.app')

@section('title', 'BankLine | Вход')

@section('content')


    <div
        class="slider-area slider-height"
        style="background-image: url('{{asset('assets/img/hero/h1_hero.jpg')}}')">
        <div class="container">

            <div class="pt-80 pb-150">
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
                    <div class="col-6">
                        <form method="post" action="{{route('login.auth')}}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email </label>
                                <input
                                    name="email"
                                    type="email"
                                    class="form-control"
                                    id="exampleInputEmail1"
                                    aria-describedby="emailHelp"
                                />
                                <small id="emailHelp" class="form-text text-muted"
                                >Введите ваш email для входа в личный кабинет.</small
                                >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Пароль</label>
                                <input
                                    name="password"
                                    type="password"
                                    class="form-control"
                                    id="exampleInputPassword1"
                                />
                                <small id="emailHelp" class="form-text text-muted"
                                >Введите пароль для входа.</small
                                >
                            </div>

                            <button type="submit" class="btn header-btn">войти</button>

                            <div class="mt-4">
                                <p>
                                    Если у вас нет учетной записи, то вы можете пройти
                                    <a
                                        href="{{route('register')}}"
                                        style="color: gray; border-bottom: 1px solid #000"
                                    >
                                        регистрацию.</a
                                    >
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
