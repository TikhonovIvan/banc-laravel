@extends('layouts.app')

@section('title', 'BankLine | Все заявки Автокредит')

@section('content')

    <div class="container mt-150">

        <div class="row">
            <h3 class="text-center mb-5">Заявки по Автокредитам</h3>
        </div>
        <div class="row">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col" class="text-center">Статус</th>
                    <th scope="col" class="text-center">ФИО</th>
                    <th scope="col">Сумма кредита</th>
                    <th scope="col">Срок кредита</th>
                    <th scope="col">Марка и модель автомобиля</th>
                    <th scope="col">Cтавка</th>
                    <th scope="col">Действие</th>

                </tr>
                </thead>
                <tbody>
                @foreach($applications as $application)
                    <tr>
                        <th scope="row">{{$application->id }}</th>
                        <th scope="row"> <p class="card-text">

                                @if ($application->status === 'одобрено')
                                    <span class="text-success">{{ $application->status }}</span>
                                @elseif ($application->status === 'отклонено')
                                    <span class="text-danger">{{ $application->status }}</span>
                                @elseif ($application->status === 'в обработке')
                                    <span class="text-primary">{{ $application->status }}</span>
                                @elseif ($application->status === 'ожидает документов')
                                    <span class="text-secondary">{{ $application->status }}</span>
                                @else
                                    <span class="text-muted">{{ $application->status }}</span>
                                @endif
                            </p></th>
                        <td class="text-center">{{$application->user->name}} {{$application->user->surname}} {{$application->user->patronymic  }}</td>
                        <td class="text-center">{{$application->loan_amount}}</td>
                        <td class="text-center">{{$application->term_months}} мес</td>
                        <td class="text-center">{{$application->property_type}}</td>
                        <td class="text-center" >{{$application->interest_rate}}%</td>
                        <td style="width: 160px;">
                            <a href="{{route('credit2.edit', $application->id)}}"  class="btn btn-success" style="height: 43px; padding: 15px; margin: auto">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z"></path>
                                </svg>
                            </a>

                            <a href="{{route('credit2.show', $application->id)}}"  class="btn btn-success" style="height: 43px; padding: 15px; margin: auto">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                </svg>
                            </a>

                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>

    </div>

@endsection
