<header class="header">
    <div class="container">
        <div class="header_line">
            <div class="header_line__menu">
                <a href="/"><p style="font-family: Blushes; color: #fff; font-size: 50px">КРОССЫ.UA</p></a>
                <ul>
                    <li>
                        <a href="/#o-nas">О нас</a>
                        <a href="/#nachat">Начать сотрудничество</a>
                        <a href="{{ URL::route('prom') }}">Прайс для prom.ua</a>
                        <a href="{{ URL::route('terms') }}">Условия сотрудничесвта</a>
                        <a href="/#footer">Контакты</a>
                    </li>
                </ul>
            </div>
            <div class="header_line__button"></div>
        </div>
        <div class="header_mob">
            <a href="/"><p style="font-family: Blushes; color: #fff; font-size: 25px">КРОССЫ.UA</p></a>
            <ul>
                <li>
                    <a href="{{ URL::route('prom') }}">Прайс для prom.ua</a>
                    <a href="{{ URL::route('terms') }}">Условия сотрудничесвта</a>
                    <a href="/#footer">Наши контакты</a>
                    <a href="/#o-nas">О нас</a>
                </li>
            </ul>
        </div>
    </div>
</header>
