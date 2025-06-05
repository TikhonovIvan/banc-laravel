<header>
    <!-- Header Start -->
    <div class="header-area header-transparent">
        <div class="main-header header-sticky">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <!-- Logo -->
                    <div class="col-xl-2 col-lg-2 col-md-1">
                        <div class="logo">
                            <a href="{{route('home')}}">BankLine</a>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-10 col-md-10">
                        <div
                            class="menu-main d-flex align-items-center justify-content-end"
                        >
                            <!-- Main-menu -->
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>


                                    <ul id="navigation " >
                                        @auth
                                            <li class="">
                                                <a href="#">Услуги</a>
                                                <ul class="submenu">
                                                    <li>
                                                        <a href="{{route('credit1.create')}}">Потребительский кредит</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{route('credit2.create')}}">Ипотечное кредитование</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{route('credit3.create')}}">Автокредит</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            @can('index-credit1')
                                            <li class="">
                                                <a href="#">Все заявки</a>
                                                <ul class="submenu">
                                                    <li>
                                                        <a href="{{route('credit1.index')}}">Потребительский кредит</a>
                                                    </li>
                                                    <li>
                                                        <a href="">Ипотечное кредитование</a>
                                                    </li>
                                                    <li>
                                                        <a href="">Автокредит</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            @endcan

                                            <li>
                                                <a href="blog.html">Блог</a>
                                                <ul class="submenu">
                                                    <li><a href="blog.html">Блог</a></li>
                                                    <li>
                                                        <a href="blog_details.html">Новости</a>
                                                    </li>
                                                    <li><a href="elements.html">Element</a></li>
                                                    <li><a href="apply.html">Apply Now</a></li>
                                                </ul>
                                            </li>

                                            <li  ><a href="#" class="account">{{auth()->user()->email}}</a></li>
                                        @else
                                            <li class=""><a href="{{route('home')}}">Главная</a></li>
                                            <li><a href="{{route('about')}}">О нас</a></li>
                                            <li><a href="{{route('services')}}">Услуги</a></li>
                                            <li>
                                                <a href="blog.html">Блог</a>
                                                <ul class="submenu">
                                                    <li><a href="blog.html">Блог</a></li>
                                                    <li>
                                                        <a href="blog_details.html">Новости</a>
                                                    </li>
                                                    <li><a href="elements.html">Element</a></li>
                                                    <li><a href="apply.html">Apply Now</a></li>
                                                </ul>
                                            </li>


                                            <li><a href="{{route('contact')}}">Контакты</a></li>


                                        @endauth
                                    </ul>
                                </nav>
                            </div>

                            @auth

                                <div class="dropdown ">
                                    <button
                                        class="btn header-btn dropdown-toggle"
                                        type="button"
                                        data-toggle="dropdown"
                                        aria-expanded="false"
                                    >
                                        Личный кабинет
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('account.edit')}}"
                                        >Личный кабинет</a
                                        >
                                        <a class="dropdown-item" href="{{route('applications.index')}}"
                                        >Мои заявки</a
                                        >
                                        <a class="dropdown-item" href="{{route('logout')}}">Выйти</a>
                                    </div>
                                </div>

                            @else
                                <div class="header-right-btn f-right d-none d-lg-block">
                                    <a href="{{route('login')}}" class="btn header-btn ">Войти</a>
                                </div>

                            @endauth
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>



