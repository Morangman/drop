<header class="header">
    <div class="container">
        <div class="header_line">
            <div class="header_line__logo">
                <img src="{{ asset('client/img/auch/png/logo.png') }}" alt="">
            </div>
            <div class="header_line__menu">
                <ul>
                    <li>
                        <a class="hash" href="#o-nas">О нас</a>
                        <a class="hash" href="#nachat">Начать сотрудничество</a>
                        <a href="{{ $settings->getAttribute('general_settings')['prom'] }}">Прайс для prom.ua</a>
                        <a class="hash" href="#nachat">Контакты</a>
                        <a class="hash" href="#reviews">Отзывы</a>
                    </li>
                </ul>
            </div>
            <div class="header_line__button"></div>
        </div>
        <div class="header_mob">
            <ul>
                <li>
                    <a class="hash" href="#o-nas">О нас</a>
                    <a href="#"><img src="{{ asset('client/img/auch/png/logo.png') }}" alt=""></a>
                    <a class="hash" href="#reviews">Отзывы</a>
                </li>
                <li>
                    <a class="hash" href="#nachat">Начать сотрудничество</a>
                    <a href="{{ $settings->getAttribute('general_settings')['prom'] }}">Прайс для prom.ua</a>
                    <a class="hash" href="#nachat">Наши контакты</a>
                </li>
            </ul>
        </div>
    </div>
</header>
