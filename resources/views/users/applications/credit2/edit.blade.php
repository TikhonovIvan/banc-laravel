@extends('layouts.app')

@section('title', 'BankLine | Обновить Ипотечный кредит')

@section('content')
    <div class="slider-area slider-height" style="background-image: url('{{ asset('assets/img/hero/h1_hero.jpg') }}')">
        <div class="container">
            <div class="pt-100 pb-150">
                <div class="row">
                    <div class="col-12">
                        <h3 class="mb-5 text-center">Обновить ипотечный кредит</h3>

                        {{-- Список загруженных документов --}}
                        <div class="form-row mt-3">
                            <div class="col-md-12">
                                <label>Загруженные документы:</label>
                                @forelse ($application->documents as $doc)
                                    <div class="d-flex align-items-center mb-2" style="color: #000">
                                        <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank" class="mr-3" style="color: #000">
                                            {{ $doc->original_name }}
                                        </a>
                                        <form action="{{ route('credit2.document.destroy', $doc->id) }}" method="POST" class="ml-3">
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

                        <form class="needs-validation mt-4" novalidate method="POST" enctype="multipart/form-data"
                              action="{{ route('credit2.update', $application->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-row d-none">
                                <input type="hidden" name="surname">
                                <input type="hidden" name="name">
                                <input type="hidden" name="patronymic">
                                <input type="hidden" name="passport_id">
                                <input type="hidden" name="passport_inn">
                                <input type="hidden" name="issued_by">
                            </div>

                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label>Сумма кредита</label>
                                    <input type="number" class="form-control" name="loan_amount" required
                                           value="{{ old('loan_amount', $application->loan_amount) }}">
                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <label>Срок кредита</label>
                                        <select class="custom-select" name="term_years" required>
                                            <option disabled>Срок кредита (лет)</option>
                                            @foreach([3, 6, 9, 12] as $year)
                                                <option value="{{ $year }}" {{ old('term_years', $application->term_years) == $year ? 'selected' : '' }}>
                                                    {{ $year }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-4">
                                        <label>Тип недвижимости</label>
                                        <select class="custom-select" name="property_type" required>
                                            <option disabled>Тип недвижимости</option>
                                            @foreach(['Квартира', 'Частный дом', 'Студия'] as $type)
                                                <option value="{{ $type }}" {{ old('property_type', $application->property_type) == $type ? 'selected' : '' }}>
                                                    {{ $type }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label>Регион покупки недвижимости</label>
                                    <input type="text" class="form-control" name="region" required
                                           value="{{ old('region', $application->region) }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Стоимость недвижимости</label>
                                    <input type="number" class="form-control" name="property_value" required
                                           value="{{ old('property_value', $application->property_value) }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Первоначальный взнос</label>
                                    <input type="number" class="form-control" name="initial_payment" required
                                           value="{{ old('initial_payment', $application->initial_payment) }}">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="row">
                                    <div class="col-6">
                                        <label>Цель покупки</label>
                                        <select class="custom-select" name="purpose" required>
                                            <option disabled>Цель покупки</option>
                                            @foreach(['Для проживания', 'Сдачи в аренду', 'Инвестиции'] as $purpose)
                                                <option value="{{ $purpose }}" {{ old('purpose', $application->purpose) == $purpose ? 'selected' : '' }}>
                                                    {{ $purpose }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="mt-5">Процентная ставка {{ $application->interest_rate }}%</label>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-12 mt-3">
                                    <label>Дополнительные документы</label>
                                    <input type="file" class="form-control" name="documents[]" multiple>
                                </div>
                                <div class="col-6 mt-4">
                                    <label>Комментарий</label>
                                    <textarea name="comment" class="form-control" style="width: 500px; height: 200px; padding: 10px">{{ old('comment', $application->comment) }}</textarea>
                                </div>
                            </div>

                            <button class="btn header-btn mt-4" type="submit">Обновить заявку</button>
                        </form>

                    </div>

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
                </div>
            </div>
        </div>
    </div>
@endsection
