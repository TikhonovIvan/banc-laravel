@extends('layouts.app')

@section('title', 'BankLine |  Ипотечный кредит')

@section('content')
    <div
        class="slider-area slider-height"
        style="background-image: url('{{asset('assets/img/hero/h1_hero.jpg')}}')"
    >
        <div class="container">
            <div class="pt-100 pb-150">
                <div class="row">
                    <div class="col-12">
                        <h3 class="mb-5 text-center">Оформить ипотечный кредит</h3>
                        <form class="needs-validation" novalidate method="POST" enctype="multipart/form-data"
                              action="{{ route('credit2.store') }}">
                            @csrf
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
                                    <input type="number" class="form-control" name="loan_amount"
                                           placeholder="1000000"
                                           required>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <label>Срок кредита</label>
                                        <select class="custom-select" name="term_years" required>
                                            <option disabled selected>Срок кредита (лет)</option>
                                            <option>3</option>
                                            <option>6</option>
                                            <option>9</option>
                                            <option>12</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label>Тип недвижимости</label>
                                        <select class="custom-select" name="property_type" required>
                                            <option disabled selected>Тип недвижимости</option>
                                            <option>Квартира</option>
                                            <option>Частный дом</option>
                                            <option>Студия</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label>Район покупки недвижимости</label>
                                    <input type="text" class="form-control" name="region" placeholder="Первомайский район" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Стоимость недвижимости</label>
                                    <input type="number" class="form-control" name="property_value" placeholder="2000000" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Первоначальный взнос</label>
                                    <input type="number" class="form-control" name="initial_payment" placeholder="1000000"  required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="row">
                                    <div class="col-6">
                                        <label>Цель покупки</label>
                                        <select class="custom-select" name="purpose" required>
                                            <option disabled selected>Цель покупки</option>
                                            <option>Для проживания</option>
                                            <option>Сдачи в аренду</option>
                                            <option>Инвестиции</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="mt-5">Процентная ставка 14%</label>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-12 mt-3">
                                    <label>Доп документы для подтверждения</label>
                                    <input type="file" class="form-control" name="documents[]" multiple>
                                </div>
                                <div class="col-6 mt-4">
                                    <label>Комментарий</label>
                                    <textarea name="comment"
                                              style="width: 500px; height: 200px; padding: 10px"></textarea>
                                </div>
                            </div>

                            <button class="btn header-btn" type="submit">Подать заявку</button>
                        </form>

                    </div>

                    <script>
                        // Example starter JavaScript for disabling form submissions if there are invalid fields
                        (function () {
                            "use strict";
                            window.addEventListener(
                                "load",
                                function () {
                                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                    var forms =
                                        document.getElementsByClassName("needs-validation");
                                    // Loop over them and prevent submission
                                    var validation = Array.prototype.filter.call(
                                        forms,
                                        function (form) {
                                            form.addEventListener(
                                                "submit",
                                                function (event) {
                                                    if (form.checkValidity() === false) {
                                                        event.preventDefault();
                                                        event.stopPropagation();
                                                    }
                                                    form.classList.add("was-validated");
                                                },
                                                false
                                            );
                                        }
                                    );
                                },
                                false
                            );
                        })();
                    </script>
                </div>
            </div>
        </div>
    </div>

@endsection
