@extends('layouts.app')

@section('title', 'BankLine | Автокредит')

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
                        <h3 class="mb-5 text-center">Полная информация о Автокредит</h3>
                    </div>
                </div>
            </div>

            <div class="wrapper-block-cards">
                <div class="wrapper-block-cards d-flex flex-wrap gap-4">

                    @php
                        $loanAmount = $application->loan_amount - $application->initial_payment;
                        $months = $application->term_months;
                        $rate = $application->interest_rate / 100 / 12;

                        if ($rate > 0 && $months > 0) {
                            $monthlyPayment = $loanAmount * ($rate * pow(1 + $rate, $months)) / (pow(1 + $rate, $months) - 1);
                            $monthlyPaymentFormatted = number_format($monthlyPayment, 2, '.', ' ');

                            $totalRepayment = $monthlyPayment * $months;
                            $overpayment = $totalRepayment - $loanAmount;
                            $overpaymentFormatted = number_format($overpayment, 2, '.', ' ');
                        } else {
                            $monthlyPaymentFormatted = 'N/A';
                            $overpaymentFormatted = 'N/A';
                        }
                    @endphp
              <div class="row">
                  <div class="col-12">
                      <p class="card-text">Статус заявки: <span>{{ $application->status }}</span></p>
                      <p class="card-text">Сумма кредита: {{ $application->loan_amount }}  сом</p>
                      <p class="card-text">Срок кредита: {{ $application->term_months }} мес.</p>
                      <p class="card-text">Марка и модель: {{ $application->car_make_model }}</p>
                      <p class="card-text">Год выпуска: {{ $application->car_year }} г.</p>
                      <p class="card-text">Тип автомобиля : {{ $application->car_type }} </p>
                      <p class="card-text">Стоимость автомобиля: {{ $application->car_price }} </p>
                      <p class="card-text">Первоначальный взнос: {{ $application->initial_payment }} </p>
                      <p class="card-text">Цель покупки: {{ $application->purpose }} </p>
                      <p class="card-text">Процентная ставка: {{ $application->interest_rate ?? 'N/A' }}%</p>

                      <p class="card-text">Ежемесячный платёж: {{ $monthlyPaymentFormatted }} сом</p>
                      <p class="card-text">Переплата: {{ $overpaymentFormatted }} сом</p>
                      <p class="card-text">Комментарий: {{  $application->comment }}</p>
                  </div>

              </div>

            </div>
        </div>
    </div>

@endsection
