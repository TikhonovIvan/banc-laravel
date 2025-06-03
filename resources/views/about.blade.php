@extends('layouts.app')

@section('title', 'BankLine | О нашей компании')

@section('content')

    <!-- Hero Start-->
    <div
        class="hero-area2 slider-height2 hero-overly2 d-flex align-items-center"
    >
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center pt-50">
                        <h2>О нашей компании</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Hero End -->
    <!-- About Law Start-->
    <div class="about-low-area section-padding2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="about-caption mb-50">
                        <!-- Section Tittle -->
                        <div class="section-tittle mb-35">
                            <span>О нашей компании</span>
                            <h2>
                                Создание более светлого финансового будущего и хорошей
                                поддержки.
                            </h2>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                            oeiusmod tempor incididunt ut labore et dolore magna aliqua.
                            Ut eniminixm, quis nostrud exercitation ullamco laboris nisi
                            ut aliquip exeaoauat. Duis aute irure dolor in reprehe.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                            oeiusmod tempor incididunt ut labore et dolore magna aliq.
                        </p>
                        <a href="apply.html" class="btn">Подать заявку на кредит</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <!-- about-img -->
                    <div class="about-img">
                        <div class="about-font-img d-none d-lg-block">
                            <img src="assets/img/gallery/about2.png" alt="" />
                        </div>
                        <div class="about-back-img">
                            <img src="assets/img/gallery/about1.png" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Law End-->

    <!-- Support Company Start-->
    <div class="support-company-area section-padding3 fix">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6">
                    <div class="support-location-img mb-50">
                        <img src="assets/img/gallery/single2.jpg" alt="" />
                        <div class="support-img-cap">
                            <span> c 2023 года</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="right-caption">
                        <!-- Section Tittle -->
                        <div class="section-tittle">
                            <span>Почему стоит выбрать нашу компанию?</span>
                            <h2>Мы обещаем вам устойчивое будущее.</h2>
                        </div>
                        <div class="support-caption">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna
                                aliqua. Ut enim ad minim veniam, quis nostrud.
                            </p>
                            <div class="select-suport-items">
                                <label class="single-items"
                                >Добиться хорошего результата можно, но сложно.

                                    <input type="checkbox" checked="checked active" />
                                    <span class="checkmark"></span>
                                </label>
                                <label class="single-items"
                                >На них распространяются те же временные ограничения.

                                    <input type="checkbox" checked="checked active" />
                                    <span class="checkmark"></span>
                                </label>
                                <label class="single-items"
                                >Я приду к вам, кто меня знает.

                                    <input type="checkbox" checked="checked active" />
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Support Company End-->
    <!-- Application Area Start -->
    <div
        class="application-area pt-150 pb-140"
        data-background="assets/img/gallery/section_bg03.jpg"
    >
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <!-- Section Tittle -->
                    <div class="section-tittle section-tittle2 text-center mb-45">
                        <span>Подайте заявку в три простых шага</span>
                        <h2>Легкий процесс подачи заявки на любой вид кредита</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-9 col-xl-8">
                    <!--Hero form -->
                    <form action="#" class="search-box">
                        <div class="select-form">
                            <div class="select-itms">
                                <select name="select" id="select1">
                                    <option value="">Выбрать сумму</option>
                                    <option value="">$120</option>
                                    <option value="">$700</option>
                                    <option value="">$750</option>
                                    <option value="">$250</option>
                                </select>
                            </div>
                        </div>
                        <div class="select-form">
                            <div class="select-itms">
                                <select name="select" id="select1">
                                    <option value="">Количество месяцев</option>
                                    <option value="">7 Days</option>
                                    <option value="">10 Days</option>
                                    <option value="">14 Days Days</option>
                                    <option value="">20 Days</option>
                                </select>
                            </div>
                        </div>
                        <div class="input-form">
                            <input type="text" placeholder="Сумма возврата" />
                        </div>
                        <div class="search-form">
                            <a href="apply.html">Подать заявку</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Application Area End -->

    <!-- Blog Ara Start -->
    <div class="home-blog-area section-padding30">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-10">
                    <!-- Section Tittle -->
                    <div class="section-tittle text-center mb-70">
                        <span>Новости из нашего последнего блога</span>
                        <h2>Новости со всего мира, отобранные нами.</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <!-- single-david -->
                    <div class="single-blogs mb-30">
                        <div class="blog-images">
                            <img src="assets/img/gallery/blog1.png" alt="" />
                        </div>
                        <div class="blog-captions">
                            <span>20.04.2025</span>
                            <h2>
                                <a href="blog_details.html"
                                >Появление пестицидов принесло с собой как преимущества,
                                    так и недостатки.</a
                                >
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6">
                    <!-- single-david -->
                    <div class="single-blogs mb-30">
                        <div class="blog-images">
                            <img src="assets/img/gallery/blog1.png" alt="" />
                        </div>
                        <div class="blog-captions">
                            <span>20.04.2025</span>
                            <h2>
                                <a href="blog_details.html"
                                >Появление пестицидов принесло с собой как преимущества,
                                    так и недостатки.</a
                                >
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Ara End -->

@endsection
