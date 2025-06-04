@extends('layouts.app')

@section('title', 'BankLine | Автокредит')

@section('content')

    <div
        class="slider-area slider-height"
        style="background-image: url('{{asset('assets/img/hero/h1_hero.jpg')}}')"
    >
        <div class="container">
            <div class="pt-100 pb-150">
                <div class="row">
                    <div class="col-12">
                        <h3 class="mb-5 text-center">Оформить Автокредит</h3>
                        <form class="needs-validation" novalidate method="POST" action="{{ route('credit3.store') }}"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label>Сумма кредита</label>
                                    <input type="number" class="form-control" name="loan_amount" required>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label>Марка и модель автомобиля</label>
                                    <input type="text" class="form-control" name="car_make_model" required
                                           placeholder="Toyota Camry, BMW X5">
                                </div>

                                <div class="col-4 mb-3">
                                    <label>Год выпуска автомобиля</label>
                                    <input type="number" class="form-control" name="car_year" required
                                           placeholder="2005">
                                </div>

                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label>Тип автомобиля</label>
                                        <select class="custom-select" name="car_type" required>
                                            <option selected disabled value="">Тип автомобиля</option>
                                            <option value="новый">Новый</option>
                                            <option value="с пробегом">С пробегом</option>
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <label>Стоимость автомобиля</label>
                                    <input type="number" class="form-control" name="car_price" required
                                           placeholder="Полная цена машины">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label>Первоначальный взнос</label>
                                    <input type="number" class="form-control" name="initial_payment" required
                                           placeholder="100 000">
                                </div>

                                <div class="col-3 ">
                                    <label>Срок кредита (мес.)</label>
                                    <select class="custom-select" name="term_months" required>
                                        <option selected disabled value="">Срок кредита</option>
                                        <option value="6">6 мес.</option>
                                        <option value="9">9 мес.</option>
                                        <option value="12">12 мес.</option>
                                        <option value="24">24 мес.</option>
                                    </select>
                                </div>

                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label>Цель покупки</label>
                                        <select class="custom-select" name="purpose" required>
                                            <option selected disabled value="">Цель покупки</option>
                                            <option value="Для личного пользования">Для личного пользования</option>
                                            <option value="Для работы">Для работы</option>
                                            <option value="Такси">Такси</option>
                                        </select>
                                    </div>

                                    <div class="col-6">
                                        <label class="mt-5">Процентная ставка: <strong>5%</strong></label>
                                        <input type="hidden" name="interest_rate" value="5">
                                    </div>
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="col-md-12 mt-3">
                                    <label>Доп документы для подтверждения</label>
                                    <input type="file" name="documents[]" class="form-control" multiple required>
                                </div>

                                <div class="col-6 mt-4">
                                    <label>Комментарий</label>
                                    <textarea name="comment"
                                              style="width: 500px; height: 200px; padding: 10px"></textarea>
                                </div>
                            </div>

                            <button class="btn header-btn mt-3" type="submit">Подать заявку</button>
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
