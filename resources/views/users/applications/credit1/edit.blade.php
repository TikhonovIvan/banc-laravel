@extends('layouts.app')

@section('title', 'BankLine | Обновить Потребительский кредит')

@section('content')
    <div class="slider-area slider-height" style="background-image: url('{{ asset('assets/img/hero/h1_hero.jpg') }}')">
        <div class="container">
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

            <div class="pt-100 pb-150">
                <div class="row">
                    <div class="col-12">
                        <h3 class="mb-5 text-center">Обновить потребительский кредит</h3>
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
                                        <a href="{{ route('credit1.document.download', $doc->id) }}"
                                           class="btn btn-sm btn-outline-primary mr-2">
                                            Скачать
                                        </a>


                                        <form action="{{ route('credit1.document.destroy', $doc->id) }}"
                                              method="POST" class="ml-3">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Удалить</button>
                                        </form>
                                    </div>
                                @empty
                                    <p>Документы не загружены</p>
                                @endforelse
                            </div>
                        <form class="needs-validation" novalidate method="POST"
                              action="{{ route('credit1.update', $application->id) }}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <label for="amount">Желаемая сумма кредита</label>
                                    <input type="number" class="form-control" id="amount" name="amount" required
                                           placeholder="100 000" value="{{ old('amount', $application->amount) }}">
                                    <div class="valid-feedback">Looks good!</div>
                                </div>

                                <div class="row">
                                    <div class="col-3">
                                        <label for="term_months">Срок кредита</label>
                                        <select class="custom-select" id="term_months" name="term_months" required>
                                            <option disabled value="">Срок кредита (в месяцах)</option>
                                            @foreach([3,6,9,12] as $term)
                                                <option value="{{ $term }}" {{ $application->term_months == $term ? 'selected' : '' }}>
                                                    {{ $term }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">Please select a valid term.</div>
                                    </div>

                                    <div class="col-3">
                                        <label for="income_proof">Подтверждение дохода</label>
                                        <select class="custom-select" id="income_proof" name="income_proof" required>
                                            <option disabled value="">Подтверждение дохода</option>
                                            <option value="1" {{ $application->income_proof ? 'selected' : '' }}>ДА</option>
                                            <option value="0" {{ !$application->income_proof ? 'selected' : '' }}>НЕТ</option>
                                        </select>
                                        <div class="invalid-feedback">Please select a valid option.</div>
                                    </div>

                                    <div class="col-3">
                                        <label for="credit_purpose">Кредит для покупки</label>
                                        <select class="custom-select" id="credit_purpose" name="credit_purpose" required>
                                            <option disabled value="">Выберите категорию</option>
                                            @foreach(['ремонта', 'обучения', 'покупка техники'] as $purpose)
                                                <option value="{{ $purpose }}" {{ $application->credit_purpose == $purpose ? 'selected' : '' }}>
                                                    {{ $purpose }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">Please select a valid category.</div>
                                    </div>

                                    <div class="col-4">
                                        <input type="hidden" name="interest_rate" value="{{ $application->interest_rate }}">
                                        <label class="mt-5">Процентная ставка {{ $application->interest_rate }}%</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-12 mt-3">
                                    <label for="documents">Доп. документы</label>
                                    <input type="file" class="form-control" id="documents" name="documents[]" multiple
                                           accept=".txt,.doc,.docx,.xls,.xlsx,.pdf">
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>



                            <div class="form-row mt-4">
                                <div class="col-6">
                                    <label for="comment">Комментарий</label><br />
                                    <textarea name="comment" id="comment"
                                              style="width: 500px; height: 200px; padding: 10px">{{ old('comment', $application->comment) }}</textarea>
                                    <div class="valid-feedback">Looks good!</div>
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

                            <button class="btn header-btn mt-4" type="submit">
                                Обновить заявку
                            </button>
                        </form>


                        </div>
                    </div>

                    {{-- JS для валидации --}}
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
