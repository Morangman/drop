<footer class="footer">
    <div class="container">
        <div class="footer_cont">
            <div class="footer__left">
                <p>Связь с командой:</p>
                <span class="city">{!! $content['footer_4']['value'] !!}</span>
                <a href="{{ $settings->getAttribute('general_settings')['boss'] }}" target="_blank"><span class="director">Директор (предложения и пожелания)</span></a>
                <a href="{{ $settings->getAttribute('general_settings')['buh'] }}" target="_blank"><span class="accountant">Бухгалтер (финансы, взаиморасчёты с партнёрами)</span></a>
                <a href="{{ $settings->getAttribute('general_settings')['manager'] }}" target="_blank"><span class="manager">Менеджер (по заказам и сотрудничеству)</span></a>
            </div>
            <div class="footer__middle">
                <p>Наши соц. сети:</p>
                <a href="{{ $settings->getAttribute('general_settings')['vk'] }}" target="_blank"><span class="vk">Группа Вконтакте</span></a>
                <a href="{{ $settings->getAttribute('general_settings')['tg'] }}" target="_blank"><span class="telegra">Телеграм Канал</span></a>
                <a href="{{ $settings->getAttribute('general_settings')['inst'] }}" target="_blank"><span class="insta">Инстаграм Аккаунт</span></a>
            </div>
            <div class="footer__right">
                <div class="footer__right__bank">
                    <div class="footer__right__bank__image">
                        <img src="{{ asset('client/img/auch/png/bank.png') }}" alt="">
                    </div>
                    <div class="footer__right__bank__info">
                        <p>{!! $content['footer_1']['value'] !!}</p>
                    </div>
                </div>
                <div class="footer__right__info">
                    <div class="footer__right__info__logo">
                        <img src="{{ asset('client/img/auch/png/logow.png') }}" alt="">
                    </div>
                    <div class="footer__right__info__txt">
                        <p>{!! $content['footer_2']['value'] !!}</p>
                        <p>{!! $content['footer_3']['value'] !!}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__mob">
            <div class="footer__mob__title">Связь с командой</div>
            <div class="footer__mob__adress"><span>{!! $content['footer_4']['value'] !!}</span></div>
            <div class="footer__mob__items">
                <a href="{{ $settings->getAttribute('general_settings')['boss'] }}" target="_blank">
                    <div class="footer__mob__item">
                        <div class="footer__mob__item__img">
                            <img src="{{ asset('client/img/auch/png/direct.png') }}" alt="">
                        </div>
                        <div class="footer__mob__item__title">Директор</div>
                        <div class="footer__mob__item__subtitle">предложения и пожелания</div>
                    </div>
                </a>
                <a href="{{ $settings->getAttribute('general_settings')['buh'] }}" target="_blank">
                    <div class="footer__mob__item">
                        <div class="footer__mob__item__img">
                            <img src="{{ asset('client/img/auch/png/buhg.png') }}" alt="">
                        </div>
                        <div class="footer__mob__item__title">Бухгалтер</div>
                        <div class="footer__mob__item__subtitle">финансы, взаиморасчеты с партнерами</div>
                    </div>
                </a>
                <a href="{{ $settings->getAttribute('general_settings')['manager'] }}" target="_blank">
                    <div class="footer__mob__item">
                        <div class="footer__mob__item__img">
                            <img src="{{ asset('client/img/auch/png/manage.png') }}" alt="">
                        </div>
                        <div class="footer__mob__item__title">Манеджер</div>
                        <div class="footer__mob__item__subtitle">по заказам и сотрудничеству</div>
                    </div>
                </a>

            </div>
            <div class="footer__mob__foot">
                <div class="footer__mob__foot__item">
                    <div class="footer__mob__foot__item__img">
                        <img src="{{ asset('client/img/auch/png/banks.png') }}" alt="">
                    </div>
                    <p>{!! $content['footer_1']['value'] !!}</p>
                </div>
                <div class="footer__mob__foot__item">
                    <div class="footer__mob__foot__item__img">
                        <img src="{{ asset('client/img/auch/png/logosma.png') }}" alt="">
                    </div>
                    <p>{!! $content['footer_2']['value'] !!}</p>
                    <p>{!! $content['footer_3']['value'] !!}</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<div id="modal_form">
    <span id="modal_close">X</span>
    <div id="feedbackform">
        <h3>Начать сотрудничество</h3><br/>
        <form class="contact-form">
            <label for="name">Имя*</label>
            <input type="text" id="name" class="roundall" placeholder="Имя" required/>

            <label for="phone">Телефон*</label>
            <input type="text" id="phone" class="roundall" placeholder="+380992222222" maxlength="13" required/>

            <label for="message">Сообщение</label>
            <textarea id="message" rows="4" class="roundall" placeholder="Сообщение"></textarea>

            <input id="contactForm" type="submit" class="roundall" value="Отправить" />
        </form>
        <p style="text-align: left; font-size: 12px;">* - обязательные поля</p><br/>
        <div id="loader" class="container">
            <div class="column">
                <div class="loader loader-4"></div>
            </div>
        </div>
        <p id="successSubmit" style="display: none; text-align: center; color: green;">Успех! <br/> Скоро с Вами свяжется наш менеджер.</p>
        <p id="errorSubmit" style="display: none; text-align: center; color: red;">Ошибка! <br/> Проверьте введенные данные.</p>
    </div>
</div>
<div id="overlay"></div>
