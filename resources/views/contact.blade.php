@extends('layouts.app')

@section('title', 'BankLine | Контакты')

@section('content')

    <section class="contact-section">
        <div class="container">
            <div class="hero-cap text-center py-5">
                <h2>Контакты</h2>
            </div>

            <div class="row">
                <div class="col-4">
                    <div class="d-flex media contact-info">
                        <span class="contact-info__icon"><i class="ti-home"></i></span>
                        <div class="media-body">
                            <h3>Бишкек</h3>
                            <p>Медецинский MУК 167</p>
                        </div>
                    </div>

                    <div class="d-flex media contact-info">
                <span class="contact-info__icon"
                ><i class="ti-tablet"></i
                    ></span>
                        <div class="media-body">
                            <h3><a href="tel:+996500505050">(+996) 500-50-50-50</a></h3>
                            <p>С понедельника по пятницу с 9:00 до 18:00</p>
                        </div>
                    </div>

                    <div class="d-flex media contact-info">
                        <span class="contact-info__icon"><i class="ti-email"></i></span>
                        <div class="media-body">
                            <h3>support@colorlib.com</h3>
                            <p>Отправьте нам свой запрос в любое время!</p>
                        </div>
                    </div>
                </div>

                <div class="col-8" style="">
                    <a
                        href="https://yandex.com/maps/10309/bishkek/?utm_medium=mapframe&utm_source=maps"
                        style="
                  color: #eee;
                  font-size: 12px;
                  position: absolute;
                  top: 0px;
                "
                    >Бишкек</a
                    ><a
                        href="https://yandex.com/maps/10309/bishkek/?ll=74.637963%2C42.863607&mode=routes&rtext=~42.863607%2C74.637963&rtt=auto&ruri=~ymapsbm1%3A%2F%2Forg%3Foid%3D166428047585&utm_medium=mapframe&utm_source=maps&z=17"
                        style="
                  color: #eee;
                  font-size: 12px;
                  position: absolute;
                  top: 14px;
                "
                    >Яндекс Карты</a
                    ><iframe
                        src="https://yandex.com/map-widget/v1/?ll=74.637963%2C42.863607&mode=routes&rtext=~42.863607%2C74.637963&rtt=auto&ruri=~ymapsbm1%3A%2F%2Forg%3Foid%3D166428047585&z=17"
                        width="860"
                        height="400"
                        frameborder="1"
                        allowfullscreen="true"
                        style="position: relative"
                    ></iframe>
                </div>
            </div>
        </div>
    </section>

@endsection
