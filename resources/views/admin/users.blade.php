@extends('layouts.app')

@section('title', 'BankLine | Все заявки Потребительский кредит')

@section('content')

    <div class="container mt-150">

        <div class="row">
            <h3 class="text-center mb-5">Пользователи системы</h3>
        </div>


        <div class="row">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col" class="text-center">ФИО</th>
                    <th scope="col">Email</th>
                    <th scope="col">Телефон</th>
                    <th scope="col">Город</th>
                    <th scope="col">Адрес</th>
                    <th scope="col">Действие</th>

                </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td class="text-center">{{$user->surname}} {{$user->name}} {{$user->patronymic}}</td>
                        <td class="text-center">{{$user->email}}</td>
                        <td class="text-center">{{$user->phone}}</td>
                        <td class="text-center">{{$user->city}}</td>
                        <td class="text-center">{{$user->address}}</td>
                        <td style="width: 160px;">
                            <a href=""  class="btn btn-success" style="height: 43px; padding: 15px; margin: auto">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z"></path>
                                </svg>
                            </a>

                            <a href=""  class="btn btn-success" style="height: 43px; padding: 15px; margin: auto">
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
            <div class="mt-4 mb-4 w-100 d-flex justify-content-center">
                {{ $users->links() }}
            </div>

        </div>

    </div>

@endsection
