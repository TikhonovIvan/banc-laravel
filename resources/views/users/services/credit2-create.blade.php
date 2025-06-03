@extends('layouts.app')

@section('title', 'BankLine | Ипотечный кредит')

@section('content')
    <div
        class="slider-area slider-height"
        style="background-image: url('assets/img/hero/h1_hero.jpg')"
    >
        <div class="container">
            <div class="pt-100 pb-150">
                <div class="row">
                    <div class="col-12">
                        <h3 class="mb-5 text-center">Оформить ипотечный кредит</h3>
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
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01"> Сумма кредита</label>
                                    <input
                                        type="number"
                                        class="form-control"
                                        id="validationCustom01"
                                        required
                                        placeholder="Желаемая сумма ипотеки"
                                    />
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <label for="validationCustom04">Срок кредита</label>
                                        <select
                                            class="custom-select"
                                            id="validationCustom04"
                                            required
                                        >
                                            <option selected disabled value="">
                                                Срок кредита (лет)
                                            </option>
                                            <option>3</option>
                                            <option>6</option>
                                            <option>9</option>
                                            <option>12</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a valid state.
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label for="validationCustom04">Тип недвижимости</label>
                                        <select
                                            class="custom-select"
                                            id="validationCustom04"
                                            required
                                        >
                                            <option selected disabled value="">
                                                Тип недвижимости
                                            </option>
                                            <option>Квартира</option>
                                            <option>Частный дом</option>
                                            <option>Студия</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a valid state.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">
                                        Регион покупки недвижимости</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="validationCustom01"
                                        required
                                        placeholder="Город, регион или область"
                                    />
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom02"
                                    >Стоимость недвижимости</label
                                    >
                                    <input
                                        type="number"
                                        class="form-control"
                                        id="validationCustom02"
                                        required
                                        placeholder="Полная стоимость объекта"
                                    />
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom02"
                                    >Первоначальный взнос
                                    </label>
                                    <input
                                        type="number"
                                        class="form-control"
                                        id="validationCustom02"
                                        required
                                        placeholder="Сумма, которую клиент готов внести"
                                    />
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="row">
                                    <div class="col-4">
                                        <label for="validationCustom04">Цель покупки</label>
                                        <select
                                            class="custom-select"
                                            id="validationCustom04"
                                            required
                                        >
                                            <option selected disabled value="">
                                                Цель покупки
                                            </option>
                                            <option>Для проживания</option>
                                            <option>Сдачи в аренду</option>
                                            <option>Инвестиции</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a valid state.
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label for="validationCustom04">Тип недвижимости</label>
                                        <select
                                            class="custom-select"
                                            id="validationCustom04"
                                            required
                                        >
                                            <option selected disabled value="">
                                                Тип недвижимости
                                            </option>
                                            <option>Квартира</option>
                                            <option>Частный дом</option>
                                            <option>Студия</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a validtion> state.
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
