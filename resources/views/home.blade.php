@extends('layouts.app')

@section('content')
    @yield('header', View::make('header', ['settings' => $settings]))
    <div class="content">
        <section class="banner">
            <div class="banner_bg">
            </div>
            <div class="banner_cont">
                <div class="container">
                    <div class="banner_container">
                        <div class="banner_container__button">
                            <button>Войти</button>
                        </div>
                        <div class="banner_container__txt">
                            {!! $content['site_title']['value'] !!}
                        </div>
                        <div class="banner_container__img">
                            <img src="{{ asset('client/img/auch/png/shoes_bg.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="social">
            <div class="container">
                <div class="social_items">
                    <div class="social_items__item">
                        <a href="{{ $settings->getAttribute('general_settings')['tg'] }}" target="_blank"><span class="telegram pc">Телеграм Канал</span></a>
                        <a href="{{ $settings->getAttribute('general_settings')['tg'] }}" target="_blank"><span class="telegram mob">Телеграм</span></a>
                        <p>3 400+ партнёров</p>
                    </div>
                    <div class="social_items__item">
                        <a href="{{ $settings->getAttribute('general_settings')['vk'] }}" target="_blank"><span class="vk pc">Группа Вконтакте</span></a>
                        <a href="{{ $settings->getAttribute('general_settings')['vk'] }}" target="_blank"><span class="vk mob">Вконтакте</span></a>
                        <p>7 800+ партнёров</p>
                    </div>
                    <div class="social_items__item">
                        <a href="{{ $settings->getAttribute('general_settings')['inst'] }}" target="_blank"><span class="inst pc">Наш Инстаграм</span></a>
                        <a href="{{ $settings->getAttribute('general_settings')['inst'] }}" target="_blank"><span class="inst mob">Инстаграм</span></a>
                        <p>610+ партнёров</p>
                    </div>
                </div>
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
                        </div>
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
            </div>
        </section>
        <section class="art">
            <div class="art_bg">
                <img src="{{ asset('client/img/auch/jpg/art.jpg') }}" alt="">
            </div>
        </section>
        <section class="kwest">
            <div class="container">
                <div class="kwest_txt">
                    <span>{!! $content['spros']['value'] !!}</span>
                </div>
                <div class="kwest_cont">
                    <div class="kwest_cont_items">
                        <div class="kwest_cont_items__item">
                            <div class="kwest_cont_items__item__image">
                                <img src="{{ asset('client/img/auch/png/sneakers1.png') }}" alt="">
                            </div>
                            <div class="kwest_cont_items__item__text">
                                <p>{!! $content['spros_1']['value'] !!}</p>
                            </div>
                        </div>
                        <div class="kwest_cont_items__item">
                            <div class="kwest_cont_items__item__image">
                                <img src="{{ asset('client/img/auch/png/sneakers2.png') }}" alt="">
                            </div>
                            <div class="kwest_cont_items__item__text">
                                <p>{!! $content['spros_2']['value'] !!}</p>
                            </div>
                        </div>
                        <div class="kwest_cont_items__item">
                            <div class="kwest_cont_items__item__image">
                                <img src="{{ asset('client/img/auch/png/sneakers3.png') }}" alt="">
                            </div>
                            <div class="kwest_cont_items__item__text">
                                <p>{!! $content['spros_3']['value'] !!}</p>
                            </div>
                        </div>
                        <div class="kwest_cont_items__item">
                            <div class="kwest_cont_items__item__image">
                                <img src="{{ asset('client/img/auch/png/sneakers4.png') }}" alt="">
                            </div>
                            <div class="kwest_cont_items__item__text">
                                <p>{!! $content['spros_4']['value'] !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="kwest_cont_kanye">
                        <img src="{{ asset('client/img/auch/png/kw.png') }}" alt="">
                    </div>
                </div>
            </div>
        </section>
        <section class="reviews" id="reviews">
            <div class="container">
                <div class="reviews_txt">
                    <span>{!! $content['otziv']['value'] !!}</span>
                </div>
                <div class="reviews_items">
                    @foreach($comments as $comment)
                    <div class="reviews_items__item">
                        <div class="reviews_items__item__img">
                            <img src="{{ asset('client/img/auch/png/review'.$comment->getKey().'.png') }}" alt="">
                        </div>
                        <div class="reviews_items__item__txt">
                            <a href="{{ $comment->getAttribute('url') }}" target="_blank"><span>{{ $comment->getAttribute('name') }}</span></a>
                            <p>{{ $comment->getAttribute('text') }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="reviews_button">
                    <a href="{{ $settings->getAttribute('general_settings')['vkotzivi'] }}" target="_blank"><button>{!! $content['otziv_1']['value'] !!}</button></a>
                </div>
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
