<footer class="footer" id="footer">
    <div class="container">
        <div class="footer_cont">
            <div class="footer__left">
                <p>Связь с командой:</p>
                <a class="mob_tel" href="tel:+380993116906"><span>+380993116906</span></a>
                <a href="{{ $settings->getAttribute('general_settings')['manager'] }}" target="_blank"><span class="manager">Менеджер (по заказам и сотрудничеству)</span></a>
                <a href="{{ $settings->getAttribute('general_settings')['tg'] }}" target="_blank"><span class="telegra">Телеграм Канал</span></a>
            </div>
            <div class="footer__right">
                <img src="{{ asset('client/img/auch/png/logo.jpg') }}" alt="">
            </div>
        </div>
        <div class="footer__mob">
            <div class="footer__mob__title">Связь с командой</div>
            <div id="footer_phone" class="footer__mob__adress"><a href="tel:{{ $settings->getAttribute('general_settings')['phone'] }}"><span>{{ $settings->getAttribute('general_settings')['phone'] }}</span></a></div>
            <div class="footer__mob__items">
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
            <a href="/"><img class="footer-mob-logo" src="{{ asset('client/img/auch/png/logo.jpg') }}" alt=""></a>
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
