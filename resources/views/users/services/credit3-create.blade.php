@extends('layouts.app')

@section('title', 'BankLine | Автокредит')

@section('content')

    <div
        class="slider-area slider-height"
        style="background-image: url('assets/img/hero/h1_hero.jpg')"
    >
        <div class="container">
            <div class="pt-100 pb-150">
                <div class="row">
                    <div class="col-12">
                        <h3 class="mb-5 text-center">Оформить Автокредит</h3>
                        <form class="needs-validation" novalidate>
                            <div class="form-row d-none">
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">Фамилия</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="validationCustom01"
                                        required
                                    />
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom02">Имя</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="validationCustom02"
                                        required
                                    />
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom02">Очестов</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="validationCustom02"
                                        required
                                    />
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>

                            <div class="form-row d-none">
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">ID паспорта</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="validationCustom01"
                                        required
                                    />
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom02">ИНН паспорта</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="validationCustom02"
                                        required
                                    />
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom02">Кем выдано </label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="validationCustom02"
                                        required
                                    />
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom01">
                                        Марка и модель автомобиля</label
                                    >
                                    <input
                                        type="number"
                                        class="form-control"
                                        id="validationCustom01"
                                        required
                                        placeholder="Например: Toyota Camry, BMW X5"
                                    />
                                    <div class="valid-feedback">Looks good!</div>
                                </div>

                                <div class="col-4 mb-3">
                                    <label for="validationCustom01">
                                        Год выпуска автомобиля</label
                                    >
                                    <input
                                        type="number"
                                        class="form-control"
                                        id="validationCustom01"
                                        required
                                        placeholder="2005"
                                    />
                                    <div class="valid-feedback">Looks good!</div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <label for="validationCustom04">Тип автомобиля</label>
                                        <select
                                            class="custom-select"
                                            id="validationCustom04"
                                            required
                                        >
                                            <option selected disabled value="">
                                                Тип автомобиля
                                            </option>
                                            <option>Новый</option>
                                            <option>С пробегом</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a valid state.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom01">
                                        Стоимость автомобиля</label
                                    >
                                    <input
                                        type="number"
                                        class="form-control"
                                        id="validationCustom01"
                                        required
                                        placeholder="Полная цена машины"
                                    />
                                    <div class="valid-feedback">Looks good!</div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom01">
                                        Первоначальный взнос</label
                                    >
                                    <input
                                        type="number"
                                        class="form-control"
                                        id="validationCustom01"
                                        required
                                        placeholder="100 000 "
                                    />
                                    <div class="valid-feedback">Looks good!</div>
                                </div>

                                <div class="row">
                                    <div class="col-5">
                                        <label for="validationCustom04">Срок кредита </label>
                                        <select
                                            class="custom-select"
                                            id="validationCustom04"
                                            required
                                        >
                                            <option selected disabled value="">
                                                Срок кредита
                                            </option>
                                            <option>6 мес.</option>
                                            <option>9 мес.</option>
                                            <option>12 мес.</option>
                                            <option>24 мес.</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a valid state.
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5">
                                        <label for="validationCustom04">Цель покупки </label>
                                        <select
                                            class="custom-select"
                                            id="validationCustom04"
                                            required
                                        >
                                            <option selected disabled value="">
                                                Цель покупки
                                            </option>
                                            <option>Для личного пользования</option>
                                            <option>Для работы</option>
                                            <option>Такси</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a valid state.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-12 mt-3">
                                    <label for="validationCustom01">
                                        Доп документы для подтверждения
                                    </label>
                                    <input
                                        type="file"
                                        class="form-control"
                                        id="validationCustom01"
                                        required
                                    />
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-6 mt-4">
                                    <label for="validationCustom01">Комментарий </label>
                                    <br />
                                    <textarea
                                        name=""
                                        id=""
                                        style="width: 500px; height: 200px; padding: 10px"
                                    ></textarea>
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>

                            <button class="btn header-btn" type="submit">
                                Подать заявку
                            </button>
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
