@extends('layouts.app')

@section('title', 'BankLine | Регистрация')

@section('content')
    <div
        class="slider-area slider-height"
        style="background-image: url('{{asset('assets/img/hero/h1_hero.jpg')}}')"
    >
        <div class="container">
            <div class="pt-100 pb-150">
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

                <div class="row">
                    <div class="col-12">
                        <h3 class="mb-5 text-center">Регистрация учетной записи</h3>
                        <form class="needs-validation" novalidate method="post" action="{{route('register.create')}}">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">Фамилия</label>
                                    <input
                                        name="surname"
                                        type="text"
                                        class="form-control"
                                        id="validationCustom01"
                                        required
                                        value="{{old('surname')}}"
                                        placeholder="Укажите фамилию"
                                    />
                                    <div class="valid-feedback">Все хорошо!</div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom02">Имя</label>
                                    <input
                                        name="name"
                                        type="text"
                                        class="form-control"
                                        id="validationCustom02"
                                        required
                                        value="{{old('name')}}"
                                        placeholder="Укажите имя"
                                    />
                                    <div class="valid-feedback">Все хорошо!</div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom02">Отчество</label>
                                    <input
                                        name="patronymic"
                                        type="text"
                                        class="form-control"
                                        id="validationCustom02"
                                        required
                                        value="{{old('patronymic')}}"
                                        placeholder="Укажите отчество"
                                    />
                                    <div class="valid-feedback">Все хорошо!</div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">ID паспорта</label>
                                    <input
                                        name="passport_id"
                                        type="text"
                                        class="form-control"
                                        id="validationCustom01"
                                        required
                                        value="{{old('passport_id')}}"
                                        placeholder="ID0102030"
                                    />
                                    <div class="valid-feedback">Все хорошо!</div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom02">ИНН паспорта</label>
                                    <input
                                        name="passport_inn"
                                        type="text"
                                        class="form-control"
                                        id="validationCustom02"
                                        required
                                        value="{{old('passport_inn')}}"
                                        placeholder="Укажите 14 значное число"
                                    />
                                    <div class="valid-feedback">Все хорошо!</div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom02">Кем выдано </label>
                                    <input
                                        name="issued_by"
                                        type="text"
                                        class="form-control"
                                        id="validationCustom02"
                                        required
                                        value="{{old('issued_by')}}"
                                        placeholder="MKK-0112"
                                    />
                                    <div class="valid-feedback">Все хорошо!</div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">Дата выдачи</label>
                                    <input
                                        name="date_start"
                                        type="date"
                                        class="form-control"
                                        id="validationCustom01"
                                        required
                                        value="{{old('date_start')}}"
                                    />
                                    <div class="valid-feedback">Все хорошо!</div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom02">Срок окончания </label>
                                    <input
                                        name="date_end"
                                        type="date"
                                        class="form-control"
                                        id="validationCustom02"
                                        required
                                        value="{{old('date_end')}}"
                                    />
                                    <div class="valid-feedback">Все хорошо!</div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom02">Дата рождения</label>
                                    <input
                                        name="birth"
                                        type="date"
                                        class="form-control"
                                        id="validationCustom02"
                                        required
                                        value="{{old('birth')}}"
                                    />
                                    <div class="valid-feedback">Все хорошо!</div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom03">Город</label>
                                    <input
                                        name="city"
                                        type="text"
                                        class="form-control"
                                        id="validationCustom03"
                                        required
                                        value="{{old('city')}}"
                                        placeholder="Бишкек"
                                    />
                                    <div class="invalid-feedback">
                                        Please provide a valid city.
                                    </div>
                                </div>
                                <div class="col-4 mb-3">
                                    <label for="validationCustom03">Адрес прописки</label>
                                    <input
                                        name="address"
                                        type="text"
                                        class="form-control"
                                        id="validationCustom03"
                                        required
                                        value="{{old('address')}}"
                                        placeholder="Админская улица, 1"
                                    />
                                    <div class="invalid-feedback">
                                        Please provide a valid city.
                                    </div>
                                </div>

                                <style>
                                    .nice-select {
                                        width: 360px;
                                    }
                                </style>
                                <div class="row">
                                    <div class="col-3">
                                        <label for="validationCustom04">Пол</label>
                                        <select
                                            name="gender"
                                            class="custom-select"
                                            id="validationCustom04"
                                            required
                                        >
                                            <option selected disabled value="">
                                                Укажите ваш пол
                                            </option>
                                            <option value="man">Муж</option>
                                            <option value="woman">Жен</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a valid state.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">Email</label>
                                    <input
                                        name="email"
                                        type="text"
                                        class="form-control"
                                        id="validationCustom01"
                                        required
                                        value="{{old('email')}}"
                                        placeholder="user@gmail.com"
                                    />
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom02">Пароль</label>
                                    <input
                                        name="password"
                                        type="password"
                                        class="form-control"
                                        id="validationCustom02"
                                        required
                                        placeholder="Введите пароль"
                                    />
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom02">Повторный пароль</label>
                                    <input
                                        name="repeat_password"
                                        type="password"
                                        class="form-control"
                                        id="validationCustom02"
                                        required
                                        placeholder="Введите пароль"
                                    />
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">Номер телефона</label>
                                    <input
                                        name="phone"
                                        type="text"
                                        class="form-control"
                                        id="validationCustom01"
                                        required
                                        value="{{old('phone')}}"
                                        placeholder="+99650505050"

                                    />
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom02"
                                    >Должность на работе</label
                                    >
                                    <input
                                        name="position_at_work"
                                        type="text"
                                        class="form-control"
                                        id="validationCustom02"
                                        required
                                        value="{{old('position_at_work')}}"
                                        placeholder="Инженер..."
                                    />
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom02">Адрес работы</label>
                                    <input
                                        name="work_address"
                                        type="text"
                                        class="form-control"
                                        id="validationCustom02"
                                        required
                                        value="{{old('work_address')}}"
                                        placeholder="Адрес работы"
                                    />
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>

                            <button class="btn header-btn" type="submit">
                                Зарегистрироваться
                            </button>

                            <div class="mt-4">
                                <p>
                                    У меня есть у четная запись
                                    <a
                                        href="{{route('login')}}"
                                        style="color: gray; border-bottom: 1px solid #000"
                                    >
                                        четная запись!</a
                                    >
                                </p>
                            </div>
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
