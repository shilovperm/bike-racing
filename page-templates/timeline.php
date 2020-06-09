<?php
/*
* Template Name: timeline
*/

get_header(); ?>

<div class="container">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h4>Дорожная карта</h4>
                <ul class="timeline">
                    <li class="resolved">
                        <a href="#" class="resolved">Страница гонки </a>
                        <a href="#" class="float-right resolved"> 10 Февраля, 2019</a>
                        <p class="text-dark">Страница гонки будет содержать основную информацию о планируемом событии. Например: дата события, место старта, категории участников и т.д. У завершенных событий должен появиться протокол.</p>
                    </li>
                    <li class="resolved">
                        <a href="#" class="resolved">Страница участника</a>
                        <a href="#" class="float-right resolved">19 Февраля, 2019</a>
                        <p class="text-dark">Страница участника будет содержать общую информацию об участнике с результатами всех гонок участника и текущий рейтинг в его категориях</p>
                    </li>
                    <li class="resolved">
                        <a href="#"class="resolved">Открыть онлайн-регистрацию пользователей</a>
                        <a href="#" class="float-right resolved">22 Февраля, 2019</a>
                        <p class="text-dark">Открыть форму регистрации пользователей на портале с учетом законодательства по обработке ПД</p>
                    </li>
                    <li class="resolved">
                        <a href="#"class="resolved">Изменения за март</a>
                        <a href="#" class="float-right resolved">Март, 2019</a>
                        <p class="text-dark">Добавлен рейтинг "Стартовый протокол"<br>
                        - Опубликованы правила по категориям<br>
                        - Добавлена возможность привязки видео к событию<br>
                        - Оптимизирован рейтинг для мобильных устройств<br>
                        - Добавлены ссылки между объектами сайта (события, участники, рейтинги)<br>
                        - Добавлено разделение результатов по категориям и возрастам<br>
                        - Добавлена возможность верификации участников<br>
                        - Добавлен вывод аватарки в профиле участника с сервиса <a target="_blank" href="https://ru.gravatar.com/">gravatar.com</a><br>
                        - Добавлены всплывающие подсказки<br>
                        - Добавлена возможность отображать сегмент из STRAVA в событии</p>
                    </li>
                    <li class="resolved">
                        <a href="#"class="resolved">Изменения за март</a>
                        <a href="#" class="float-right resolved">Март, 2020</a>
                        <p class="text-dark">- Добавлен рейтинг "Абсолютный рейтинг 2019-2020"<br>
                        - Добавлена страница Календарь в меню<br>
                        </p>
                    </li>
                    <li class="resolved">
                        <a href="#" class="resolved">Онлайн-регистрация на гонки</a>
                        <a href="#" class="float-right resolved">Март, 2020</a>
                        <p class="text-dark">Добавить возможность онлайн-регистрации участника на гонку</p>
                    </li>
                    <li>
                        <a href="#">Админка организаторов</a>
                        <a href="#" class="float-right">Май, 2020</a>
                        <p>Добавить возможность заведения событий организаторами</p>
                    </li>
                    <li>
                        <a href="#">Заведение основных событий со всего Урала </a>
                        <a href="#" class="float-right">Июнь, 2020</a>
                        <p>За 2019 и 2020 годы с протоколами</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
