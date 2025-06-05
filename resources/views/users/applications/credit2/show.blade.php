@extends('layouts.app')

@section('title', 'BankLine | Ипотечный кредит')

@section('content')


    <div
        class="slider-area slider-height"
        style="background-image: url('{{asset('assets/img/hero/h1_hero.jpg')}}')"
    >
        <div class="container pb-5">
            <div class="pt-50 pb-2">

                <div class="row">
                    <div class="col-12">
                        <h3 class="mb-5 text-center">Полная информация о Ипотечный кредите</h3>
                    </div>
                </div>
            </div>

            <div class="wrapper-block-cards">
                <div class="wrapper-block-cards d-flex flex-wrap gap-4">
                    @php
                        $loanIPC = $application->loan_amount;
                        $termMonths1 = $application->term_years * 12;
                        $annualRate1 = $application->interest_rate;

                        if ($loanIPC && $termMonths1 && $annualRate1) {
                            $monthlyRate = $annualRate1 / 12 / 100;
                            $monthlyPayment = $loanIPC * ($monthlyRate * pow(1 + $monthlyRate, $termMonths1)) / (pow(1 + $monthlyRate, $termMonths1) - 1);
                            $overpayment = $monthlyPayment * $termMonths1 - $loanIPC;
                            $totalRepayment = $monthlyPayment * $termMonths1;
                        } else {
                            $monthlyPayment = null;
                            $overpayment = null;
                            $totalRepayment = null;
                        }
                    @endphp

                    <div class="row">
                        <div class="col-12">
                            <p class="card-text">Статус заявки: <span>{{ $application->status }}</span></p>
                            <p class="card-text">Сумма кредита: {{ $application->loan_amount }} сом</p>
                            <p class="card-text">Срок кредита: {{ $application->term_years }} лет</p>
                            <p class="card-text">Тип недвижимости : {{ $application->property_type }}</p>
                            <p class="card-text">Регион покупки недвижимости: {{ $application->region }} г.</p>
                            <p class="card-text">Стоимость недвижимости: {{ $application->property_value }} сом</p>
                            <p class="card-text">Первоначальный взнос: {{ $application->initial_payment }} сом</p>
                            <p class="card-text">Цель покупки: {{ $application->purpose }}</p>
                            <p class="card-text">Процентная ставка: {{ $application->interest_rate ?? 'N/A' }}%</p>
                            <p class="card-text">
                                Ежемесячный платёж:
                                {{ $monthlyPayment ? number_format($monthlyPayment, 2, '.', ' ') . ' сом' : 'N/A' }}
                            </p>
                            <p class="card-text">
                                Переплата:
                                {{ $overpayment ? number_format($overpayment, 2, '.', ' ') . ' сом' : 'N/A' }}
                            </p>
                            <p class="card-text">
                                Итоговая сумма к выплате:
                                {{ $totalRepayment ? number_format($totalRepayment, 2, '.', ' ') . ' сом' : 'N/A' }}
                            </p>
                            <p class="card-text">Комментарий: {{ $application->comment }}</p>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>

@endsection
