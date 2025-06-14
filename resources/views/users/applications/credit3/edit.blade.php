@extends('layouts.app')

@section('title', 'BankLine | Обновить Автокредит')

@section('content')
    <div class="slider-area slider-height" style="background-image: url('{{ asset('assets/img/hero/h1_hero.jpg') }}')">
        <div class="container">
            <div class="pt-100 pb-150">
                <div class="row">
                    <div class="col-12">
                        <h3 class="mb-5 text-center">Обновить Автокредит</h3>
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
                        {{-- Список загруженных документов --}}
                        <div class="form-row mt-3">
                            <div class="col-md-12">
                                <label>Загруженные документы:</label>
                                @forelse ($application->documents as $doc)
                                    <div class="d-flex align-items-center mb-2" style="color: #000">


                                        <a href="{{ asset('storage/' . $doc->file_path) }}"
                                           target="_blank"
                                           class="mr-3"
                                           style="color: #000">
                                            {{ $doc->original_name }}
                                        </a>
                                        <a href="{{ route('credit3.document.download', $doc->id) }}"
                                           class="btn btn-sm btn-outline-primary mr-2">
                                            Скачать
                                        </a>
                                        <form action="{{ route('credit3.document.destroy', $doc->id) }}" method="POST" class="ml-3">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Удалить</button>
                                        </form>
                                    </div>
                                @empty
                                    <p>Документы не загружены</p>
                                @endforelse
                            </div>
                        </div>
                        <form class="needs-validation" novalidate method="POST" action="{{ route('credit3.update', $application->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label>Сумма кредита</label>
                                    <input type="number" class="form-control" name="loan_amount" required value="{{ old('loan_amount', $application->loan_amount) }}">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>Марка и модель автомобиля</label>
                                    <input type="text" class="form-control" name="car_make_model" required value="{{ old('car_make_model', $application->car_make_model) }}">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>Год выпуска автомобиля</label>
                                    <input type="number" class="form-control" name="car_year" required value="{{ old('car_year', $application->car_year) }}">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label>Тип автомобиля</label>
                                    <select class="custom-select" name="car_type" required>
                                        <option disabled value="">Тип автомобиля</option>
                                        <option value="новый" {{ old('car_type', $application->car_type) === 'новый' ? 'selected' : '' }}>Новый</option>
                                        <option value="с пробегом" {{ old('car_type', $application->car_type) === 'с пробегом' ? 'selected' : '' }}>С пробегом</option>
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>Стоимость автомобиля</label>
                                    <input type="number" class="form-control" name="car_price" required value="{{ old('car_price', $application->car_price) }}">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>Первоначальный взнос</label>
                                    <input type="number" class="form-control" name="initial_payment" required value="{{ old('initial_payment', $application->initial_payment) }}">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label>Срок кредита (мес.)</label>
                                    <select class="custom-select" name="term_months" required>
                                        <option disabled value="">Срок кредита</option>
                                        @foreach([6, 9, 12, 24] as $term)
                                            <option value="{{ $term }}" {{ old('term_months', $application->term_months) == $term ? 'selected' : '' }}>{{ $term }} мес.</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>Цель покупки</label>
                                    <select class="custom-select" name="purpose" required>
                                        <option disabled value="">Цель покупки</option>
                                        <option value="Для личного пользования" {{ old('purpose', $application->purpose) === 'Для личного пользования' ? 'selected' : '' }}>Для личного пользования</option>
                                        <option value="Для работы" {{ old('purpose', $application->purpose) === 'Для работы' ? 'selected' : '' }}>Для работы</option>
                                        <option value="Такси" {{ old('purpose', $application->purpose) === 'Такси' ? 'selected' : '' }}>Такси</option>
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>Процентная ставка</label>
                                    <input type="text" class="form-control" value="{{ $application->interest_rate }}%" readonly>
                                    <input type="hidden" name="interest_rate" value="{{ $application->interest_rate }}">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label>Дополнительные документы</label>
                                    <input type="file" name="documents[]" class="form-control" multiple>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>Комментарий</label>
                                    <textarea name="comment" class="form-control" rows="4">{{ old('comment', $application->comment) }}</textarea>
                                </div>
                            </div>

                            @can('index-credit1')
                                <div class="form-row mt-4">
                                    <div class="col-md-12">
                                        <label for="status">Статус заявки:</label><br>

                                        @php
                                            $statuses = ['в обработке', 'одобрено', 'отклонено', 'ожидает документов'];
                                        @endphp

                                        @foreach($statuses as $status)
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input"
                                                       type="radio"
                                                       name="status"
                                                       id="status_{{ $loop->index }}"
                                                       value="{{ $status }}"
                                                    {{ $application->status === $status ? 'checked' : '' }}>
                                                <label class="form-check-label" for="status_{{ $loop->index }}">
                                                    {{ ucfirst($status) }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endcan

                            <button class="btn header-btn mt-3" type="submit">Обновить заявку</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- JS Валидация --}}
    <script>
        (function () {
            "use strict";
            window.addEventListener("load", function () {
                var forms = document.getElementsByClassName("needs-validation");
                Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener("submit", function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add("was-validated");
                    }, false);
                });
            }, false);
        })();
    </script>
@endsection
