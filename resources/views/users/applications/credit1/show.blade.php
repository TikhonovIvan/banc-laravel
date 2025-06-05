@extends('layouts.app')

@section('title', 'BankLine | Автокредит')

@section('content')


    <div
        class="slider-area slider-height"
        style="background-image: url('{{asset('assets/img/hero/h1_hero.jpg')}}')"
    >
        <div class="container pb-5">
            <div class="pt-50 pb-2">

                <div class="row">
                    <div class="col-12">
                        <h3 class="mb-5 text-center">Полная информация о Потребительский кредит</h3>
                    </div>
                </div>
            </div>

            <div class="wrapper-block-cards">
                <div class="wrapper-block-cards d-flex flex-wrap gap-4">


                    @php
                        $principal = $application->amount;
                        $months = $application->term_months;
                        $annualRate = $application->interest_rate;

                        if ($principal > 0 && $months > 0 && $annualRate !== null) {
                            $monthlyRate = $annualRate / 12 / 100;
                            $monthlyPayment = $principal * ($monthlyRate * pow(1 + $monthlyRate, $months)) / (pow(1 + $monthlyRate, $months) - 1);
                            $totalPayment = $monthlyPayment * $months;
                            $overpayment = $totalPayment - $principal;
                        } else {
                            $monthlyPayment = null;
                            $overpayment = null;
                            $totalPayment = null;
                        }
                    @endphp

              <div class="row">
                  <div class="col-12">
                      <p class="card-text">Статус заявки: <span>{{ $application->status }}</span></p>
                      <p class="card-text">Сумма кредита: {{ $application->amount }}  сом</p>
                      <p class="card-text">Срок кредита: {{ $application->term_months }} мес.</p>
                      <p class="card-text">Подтверждение дохода : {{ $application->income_proof }}</p>
                      <p class="card-text">Кредит для покупки : {{ $application->credit_purpose }} г.</p>
                      <p class="card-text">Процентная ставка: {{ $application->interest_rate ?? 'N/A' }}%</p>

                      <p class="card-text">
                          Ежемесячный платёж: {{ $monthlyPayment ? number_format($monthlyPayment, 2, '.', ' ') . ' сом' : 'N/A' }}
                      </p>
                      <p class="card-text">
                          Переплата: {{ $overpayment ? number_format($overpayment, 2, '.', ' ') . ' сом' : 'N/A' }}
                      </p>
                      <p class="card-text">
                          Итоговая сумма к выплате: {{ $totalPayment ? number_format($totalPayment, 2, '.', ' ') . ' сом' : 'N/A' }}
                      </p>
                      <p class="card-text">Комментарий:  {{ $application->comment }}</p>
                  </div>

              </div>

            </div>
        </div>
    </div>

@endsection
