@extends('layouts.app')

@section('content')
    @yield('header', View::make('header', ['settings' => $settings]))
    <div class="content">
        <section class="banner">
            <div class="container">
                <div class="banner_container">
                    <div class="banner_container__button">
                        <a href="{{ $settings->getAttribute('general_settings')['tg'] }}" target="_blank" rel="noopener">
                            <button class="tg"><svg width="19" height="17" viewBox="0 0 19 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.2955 16.9975C15.1471 16.9975 14.9997 16.9536 14.8733 16.8678L10.0959 13.6272L7.53361 15.4709C7.33266 15.6154 7.07364 15.6518 6.84029 15.5684C6.60724 15.4848 6.43025 15.2917 6.36708 15.0524L5.08051 10.1767L0.483458 8.41888C0.194056 8.30817 0.00212334 8.03131 1.74993e-05 7.72145C-0.00208834 7.41159 0.186033 7.13211 0.474032 7.01749L17.9537 0.0622004C18.033 0.028507 18.117 0.00905292 18.2016 0.00383845C18.2319 0.00203345 18.2623 0.0020335 18.2925 0.00373823C18.4677 0.0141672 18.6399 0.0855652 18.7743 0.217331C18.7882 0.230969 18.8015 0.244907 18.814 0.259448C18.9253 0.3866 18.9865 0.54163 18.998 0.699568C19.0008 0.739278 19.0006 0.77949 18.9971 0.819701C18.9947 0.848381 18.9906 0.87696 18.9848 0.905339L16.0343 16.3862C15.9869 16.6349 15.8176 16.843 15.5837 16.94C15.491 16.9785 15.393 16.9975 15.2955 16.9975ZM10.5154 12.0942L14.7709 14.9807L17.0667 2.93487L8.77496 10.9136L10.4953 12.0806C10.5022 12.0849 10.5089 12.0896 10.5154 12.0942ZM6.97286 11.4523L7.54264 13.6113L8.77024 12.7279L7.16279 11.6375C7.08808 11.587 7.0241 11.524 6.97286 11.4523ZM2.82144 7.70229L5.978 8.90914C6.20413 8.99558 6.3748 9.18571 6.43657 9.41976L6.83688 10.9369C6.85523 10.7619 6.93455 10.5972 7.06341 10.4732L14.9642 2.87069L2.82144 7.70229Z" fill="white"></path></svg>
                                TELEGRAM
                            </button>
                        </a>
                    </div><br/>
                    <div class="banner_container__button">
                        <a href="{{ $settings->getAttribute('general_settings')['gd'] }}"><button class="docs">GOOGLE DOCS</button></a>
                    </div>
                    <div class="banner_container__txt">
                        <div class="banner_container__button_txt">
                            <a href="{{ $settings->getAttribute('general_settings')['tg'] }}" target="_blank" rel="noopener">
                                <button class="tg"><svg width="19" height="17" viewBox="0 0 19 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.2955 16.9975C15.1471 16.9975 14.9997 16.9536 14.8733 16.8678L10.0959 13.6272L7.53361 15.4709C7.33266 15.6154 7.07364 15.6518 6.84029 15.5684C6.60724 15.4848 6.43025 15.2917 6.36708 15.0524L5.08051 10.1767L0.483458 8.41888C0.194056 8.30817 0.00212334 8.03131 1.74993e-05 7.72145C-0.00208834 7.41159 0.186033 7.13211 0.474032 7.01749L17.9537 0.0622004C18.033 0.028507 18.117 0.00905292 18.2016 0.00383845C18.2319 0.00203345 18.2623 0.0020335 18.2925 0.00373823C18.4677 0.0141672 18.6399 0.0855652 18.7743 0.217331C18.7882 0.230969 18.8015 0.244907 18.814 0.259448C18.9253 0.3866 18.9865 0.54163 18.998 0.699568C19.0008 0.739278 19.0006 0.77949 18.9971 0.819701C18.9947 0.848381 18.9906 0.87696 18.9848 0.905339L16.0343 16.3862C15.9869 16.6349 15.8176 16.843 15.5837 16.94C15.491 16.9785 15.393 16.9975 15.2955 16.9975ZM10.5154 12.0942L14.7709 14.9807L17.0667 2.93487L8.77496 10.9136L10.4953 12.0806C10.5022 12.0849 10.5089 12.0896 10.5154 12.0942ZM6.97286 11.4523L7.54264 13.6113L8.77024 12.7279L7.16279 11.6375C7.08808 11.587 7.0241 11.524 6.97286 11.4523ZM2.82144 7.70229L5.978 8.90914C6.20413 8.99558 6.3748 9.18571 6.43657 9.41976L6.83688 10.9369C6.85523 10.7619 6.93455 10.5972 7.06341 10.4732L14.9642 2.87069L2.82144 7.70229Z" fill="white"></path></svg>
                                    TELEGRAM
                                </button>
                            </a>
                        </div>
                        <div class="banner_container__button_txt">
                            <a href="{{ $settings->getAttribute('general_settings')['gd'] }}"><button class="docs">GOOGLE DOCS</button></a>
                        </div>
                    </div>
                </div>
                <div class="line"><hr></div>
            </div>
        </section>
        <section class="about" id="o-nas">
            <div class="container">
                <div class="about_txt">
                    <span>{!! $content['about']['value'] !!}</span>
                </div>
                <div class="about_items">
                    <div class="about_items__item">
                        <div class="about_items__item__img">
                            <img src="{{ asset('client/img/auch/png/us1.png') }}" alt="">
                        </div>
                        <div class="about_items__item__text">
                            <span>{!! $content['about_1']['value'] !!}</span>
                            <p>{!! $content['about_2']['value'] !!}</p>
                        </div>
                    </div>
                    <div class="about_items__item">
                        <div class="about_items__item__img">
                            <img src="{{ asset('client/img/auch/png/us2.png') }}" alt="">
                        </div><br>
                        <div class="about_items__item__text">
                            <span>{!! $content['about_3']['value'] !!}</span>
                            <p>{!! $content['about_4']['value'] !!}</p>
                        </div>
                    </div>
                    <div class="about_items__item">
                        <div class="about_items__item__img">
                            <img src="{{ asset('client/img/auch/png/us3.png') }}" alt="">
                        </div>
                        <div class="about_items__item__text">
                            <span>{!! $content['about_5']['value'] !!}</span>
                            <p>{!! $content['about_6']['value'] !!}</p>
                        </div>
                    </div>
                    <div class="about_items__item">
                        <div class="about_items__item__img">
                            <img src="{{ asset('client/img/auch/png/us4.png') }}" alt="">
                        </div>
                        <div class="about_items__item__text">
                            <span>{!! $content['about_7']['value'] !!}</span>
                            <p>{!! $content['about_8']['value'] !!}</p>
                        </div>
                    </div>
                    <div class="about_items__item">
                        <div class="about_items__item__img">
                            <img src="{{ asset('client/img/auch/png/us5.png') }}" alt="">
                        </div>
                        <div class="about_items__item__text">
                            <span>{!! $content['about_9']['value'] !!}</span>
                            <p>{!! $content['about_10']['value'] !!}</p>
                        </div>
                    </div>
                    <div class="about_items__item">
                        <div class="about_items__item__img">
                            <img src="{{ asset('client/img/auch/png/us6.png') }}" alt="">
                        </div>
                        <div class="about_items__item__text">
                            <span>{!! $content['about_11']['value'] !!}</span>
                            <p>{!! $content['about_12']['value'] !!}</p>
                        </div>
                    </div>
                </div>
                <div class="line"><hr></div>
            </div>
        </section>
        <section class="cooperate" id="how">
            <div class="container">
                <div class="cooperate__content">
                    <div class="cooperate__content__left">
                        <img class="how_img" src="{{ asset('client/img/auch/png/how.png') }}" alt="">
                    </div>
                    <div class="cooperate__content__right">
                        <div class="cooperate__content__right__txt">
                            <span>Как это работает?</span>
                        </div>
                        <div class="cooperate__content__right__taxt">
                            <p>Зарабатывать на дропшиппинге с Кроссы.ua может каждый. Мы поможем Вам зарабатывать не переступая порог дома. <br/><br/>
                                1. Вы находите клиента - он отправляет Вам заказ. <br/><br/>
                                2. Вы предоставляете информацию о заказе нам. <br/><br/>
                                3. Мы обрабатываем Ваш заказ: <br/><br/>
                                а) отправляем Вашему клиенту наложенным платежом (без предоплаты) — покупатель осматривает и оплачивает товар на почте; <br/><br/>
                                б) отправляем товар Вашему клиенту по полной предоплате на карту; <br/><br/>
                                в) приглашаем Вашего клиента к нам в шоурум в городе Киев. <br/><br/>
                                4. Ваш заработок переводим Вам удобным для Вас способом.</p>
                        </div>
                    </div>
                </div>
                <div class="line"><hr></div>
            </div>
        </section>
        <section class="art"></section>
        <section class="kwest">
            <div class="container">
                <div class="kwest_cont_kanye">
                    <img src="{{ asset('client/img/auch/jpg/kross.jpg') }}" alt="">
                </div>
                <div class="kwest_txt">
                    <span>{!! $content['spros']['value'] !!}</span>
                </div>
                <div class="kwest_cont">
                    <div class="kwest_cont_items">
                        <div class="kwest_cont_items__item">
                            <div class="kwest_cont_items__item__image">
                                <img src="{{ asset('client/img/auch/png/galochka.png') }}" alt="">
                            </div>
                            <div class="kwest_cont_items__item__text">
                                <p>{!! $content['spros_1']['value'] !!}</p>
                            </div>
                        </div>
                        <div class="kwest_cont_items__item">
                            <div class="kwest_cont_items__item__image">
                                <img src="{{ asset('client/img/auch/png/galochka.png') }}" alt="">
                            </div>
                            <div class="kwest_cont_items__item__text">
                                <p>{!! $content['spros_2']['value'] !!}</p>
                            </div>
                        </div>
                        <div class="kwest_cont_items__item">
                            <div class="kwest_cont_items__item__image">
                                <img src="{{ asset('client/img/auch/png/galochka.png') }}" alt="">
                            </div>
                            <div class="kwest_cont_items__item__text">
                                <p>{!! $content['spros_3']['value'] !!}</p>
                            </div>
                        </div>
                        <div class="kwest_cont_items__item">
                            <div class="kwest_cont_items__item__image">
                                <img src="{{ asset('client/img/auch/png/galochka.png') }}" alt="">
                            </div>
                            <div class="kwest_cont_items__item__text">
                                <p>{!! $content['spros_4']['value'] !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="line"><hr></div>
            </div>
        </section>
        <section class="cooperate" id="nachat">
            <div class="container">
                <div class="cooperate__content">
                    <div class="cooperate__content__left">
                        <img src="{{ asset('client/img/auch/png/girlboks.png') }}" alt="">
                    </div>
                    <div class="cooperate__content__right">
                        <div class="cooperate__content__right__txt">
                            <span>{!! $content['coop']['value'] !!}</span>
                        </div>
                        <div class="cooperate__content__right__taxt">
                            <p>{!! $content['coop_1']['value'] !!}</p>

                            <p>{!! $content['coop_2']['value'] !!}</p>

                            <p>{!! $content['coop_3']['value'] !!}</p>

                            <p>{!! $content['coop_4']['value'] !!}</p>

                            <p>{!! $content['coop_5']['value'] !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @yield('footer', View::make('footer', ['settings' => $settings, 'content' => $content]))
@endsection
