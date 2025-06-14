@extends('layouts.app')

@section('title', 'BankLine | Потребительский кредит')

@section('content')

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
    <div
        class="slider-area slider-height"
        style="background-image: url('{{asset('assets/img/hero/h1_hero.jpg')}}')"
    >
        <div class="container">
            <div class="pt-100 pb-150">
                <div class="row">
                    <div class="col-12">
                        <h3 class="mb-5 text-center">
                            Оформить потребительский кредит
                        </h3>
                        <form class="needs-validation" novalidate method="post" action="{{ route('credit1.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <label for="amount">Желаемая сумма кредита</label>
                                    <input
                                        type="number"
                                        class="form-control"
                                        id="amount"
                                        name="amount"
                                        required
                                        placeholder="100 000"
                                    />
                                    <div class="valid-feedback">Looks good!</div>
                                </div>

                                <div class="row">
                                    <div class="col-3">
                                        <label for="term_months">Срок кредита</label>
                                        <select
                                            class="custom-select"
                                            id="term_months"
                                            name="term_months"
                                            required
                                        >
                                            <option selected disabled value="">Срок кредита (в месяцах)</option>
                                            <option value="3">3</option>
                                            <option value="6">6</option>
                                            <option value="9">9</option>
                                            <option value="12">12</option>
                                        </select>
                                        <div class="invalid-feedback">Please select a valid term.</div>
                                    </div>

                                    <div class="col-3">
                                        <label for="income_proof">Подтверждение дохода</label>
                                        <select
                                            class="custom-select"
                                            id="income_proof"
                                            name="income_proof"
                                            required
                                        >
                                            <option selected disabled value="">Подтверждение дохода</option>
                                            <option value="1">ДА</option>
                                            <option value="0">НЕТ</option>
                                        </select>
                                        <div class="invalid-feedback">Please select a valid option.</div>
                                    </div>

                                    <div class="col-3">
                                        <label for="credit_purpose">Кредит для покупки</label>
                                        <select
                                            class="custom-select"
                                            id="credit_purpose"
                                            name="credit_purpose"
                                            required
                                        >
                                            <option selected disabled value="">Выберите категорию</option>
                                            <option value="ремонта">ремонта</option>
                                            <option value="обучения">обучения</option>
                                            <option value="покупка техники">покупка техники</option>
                                        </select>
                                        <div class="invalid-feedback">Please select a valid category.</div>
                                    </div>
                                    <div class="col-4">
                                        <input type="hidden" name="interest_rate" value="8">
                                        <label class="mt-5">Процентная ставка 8%</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-12 mt-3">
                                    <label for="documents">Доп документы для подтверждения</label>
                                    <input
                                        type="file"
                                        class="form-control"
                                        id="documents"
                                        name="documents[]"
                                        multiple
                                        accept=".txt,.doc,.docx,.xls,.xlsx,.pdf"
                                    />
                                    <div class="valid-feedback">Looks good!</div>
                                </div>

                                <div class="col-6 mt-4">
                                    <label for="comment">Комментарий</label><br />
                                    <textarea
                                        name="comment"
                                        id="comment"
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
