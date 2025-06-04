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
                <div class="wrapper-block-cards d-flex flex-wrap gap-4">

                    {{-- Потребительские кредиты --}}
                    @foreach ($loanApplications as $application)
                        <div class="card d-flex flex-column" style="width: 18rem; ">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Потребительский кредит</h5>
                                <p class="card-text">Статус заявки: <span>{{ $application->status }}</span></p>
                                <p class="card-text">Сумма кредита: {{ number_format($application->amount, 0, '.', ' ') }} сом</p>
                                <p class="card-text">Срок кредита: {{ $application->term_months }} мес.</p>
                                <p class="card-text">Кредит для: {{ $application->credit_purpose }}</p>
                                <p class="card-text">Процентная ставка: {{ $application->interest_rate }}%</p>

                                <div class="mt-auto">
                                    <a href="#" class="btn-cast">Узнать подробности</a>
                                    <a href="{{ route('credit1.edit', $application->id) }}" class="btn-cast">Обновить заявку</a>
                                    <form action="{{ route('credit1.destroy', $application->id) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите отменить заявку?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-cast">Отменить заявку</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    @endforeach

                    {{-- Ипотека --}}
                    @foreach ($mortgageApplications as $application)
                        <div class="card d-flex flex-column"   style="width: 18rem; ">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Ипотечный кредит</h5>
                                <p class="card-text">Статус заявки: <span>{{ $application->status }}</span></p>
                                <p class="card-text">Сумма кредита: {{ number_format($application->loan_amount, 0, '.', ' ') }} сом</p>
                                <p class="card-text">Срок кредита: {{ $application->term_years }} лет</p>
                                <p class="card-text">Тип недвижимости: {{ $application->property_type }}</p>
                                <p class="card-text">Процентная ставка: {{ $application->interest_rate }}%</p>
                                <div class="mt-auto">
                                    <a href="#" class="btn-cast">Узнать подробности</a>
                                    <a href="{{ route('credit2.edit', $application->id) }}" class="btn-cast">Обновить заявку</a>
                                    <form action="{{ route('credit2.destroy', $application->id) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите отменить заявку?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-cast">Отменить заявку</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{-- Автокредит --}}
                    @foreach ($autoCreditApplications as $application)
                        <div class="card d-flex flex-column"  style="width: 18rem;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Автокредит</h5>
                                <p class="card-text">Статус заявки: <span>{{ $application->status }}</span></p>
                                <p class="card-text">Сумма кредита: {{ number_format($application->loan_amount, 0, '.', ' ') }} сом</p>
                                <p class="card-text">Срок кредита: {{ $application->term_months }} мес.</p>
                                <p class="card-text">Марка и модель: {{ $application->car_make_model }}</p>
                                <p class="card-text">Год выпуска: {{ $application->car_year }} г.</p>
                                <p class="card-text">Процентная ставка: {{ $application->interest_rate ?? 'N/A' }}%</p>
                                <div class="mt-auto">
                                    <a href="{{ route('credit3.show', $application->id) }}" class="btn-cast">Узнать подробности</a>
                                    <a href="{{ route('credit3.edit', $application->id) }}" class="btn-cast">Обновить заявку</a>
                                    <form action="{{ route('credit3.destroy', $application->id) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите отменить заявку?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-cast">Отменить заявку</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </div>
    </div>

@endsection
