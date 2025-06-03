@extends('layouts.app')

@section('title', 'BankLine | Наши услуги')

@section('content')

    <!-- Hero Start-->
    <div
        class="hero-area2 slider-height2 hero-overly2 d-flex align-items-center"
    >
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center pt-50">
                        <h2>Наши услуги</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Hero End -->

    <!-- Services Area Start -->
    <div
        class="services-area pt-150 pb-150"
        data-background="assets/img/gallery/section_bg02.jpg"
    >
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <!-- Section Tittle -->
                    <div class="section-tittle text-center mb-80">
                        <span>Услуги, которые мы предоставляем</span>
                        <h2>
                            Высокопроизводительные услуги для всех отраслей
                            промышленности.
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-between">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-cat text-center mb-50">
                        <div class="cat-icon">
                            <span class="flaticon-work"></span>
                        </div>
                        <div class="cat-cap">
                            <h5><a href="services.html">Ипотечное кредитование</a></h5>
                            <p>
                                <font style="vertical-align: inherit"
                                >Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                </font>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-cat text-center mb-50">
                        <div class="cat-icon">
                            <span class="flaticon-loan"></span>
                        </div>
                        <div class="cat-cap">
                            <h5><a href="services.html">Потребительский кредит</a></h5>
                            <p>
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-cat text-center mb-50">
                        <div class="cat-icon">
                  <span class="flaticon-car-front"
                  ><!-- Иконка машины -->
                    <i class="fa-solid fa-car-rear"></i>
                  </span>
                        </div>
                        <div class="cat-cap">
                            <h5><a href="services.html">Автокредит</a></h5>
                            <p>
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services Area End -->


@endsection
