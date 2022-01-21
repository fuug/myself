@extends('layouts.main')

@section('title', 'Главная')

@section('styles')
    <link rel="stylesheet" href="{{ asset('sass/index.css') }}">
@endsection

@section('content')

    <section class="banner">
        <img class="main-banner" alt="psychotherapist" src="img/mainImage.png">
        <div class="wrapper">
            <h4 class="title">Это пространство, где есть место Вам и чувствам</h4>
            <a class="btn" href="#">Записаться</a>
        </div>
    </section>
    <div class="content">
        А что, если можно жить иначе??
    </div>
    <hr width="662" size="6" color="#0292A3"/>
    <div class="container">
        <div class="columns">
            <div class="item">Быть счастливым в отношениях, в которых нет ссор, ревности и претензий</div>
            <div class="item">Не помнить обиду и боль, которые принесли люди из прошлого. Отпустить и жить счастливой
                жизнью
            </div>
            <div class="item">Быть уверенным в себе и идти к цели без страхов</div>
            <div class="item">Быть уверенным в себе и идти к цели без страхов</div>
            <div class="item">Быть многогранной, полноценной и целостной личностью</div>
            <div class="item">Каждый день просыпаться в предвкушении нового дня</div>
        </div>

    </div>
    <div class="welcome-text">
        <p>Так можно. Прямо сейчас. <br>
            Готовы ли Вы к своей трансформации...</p>
    </div>
    <div class="offer">
        <h1>Мы приготовили для Вас:</h1>
        <hr/>
    </div>
    <div class="prepared">
        <div class="columns1">
            <div class="text">
                <p>Различные методики в работе, что позволяет найти индивидуальный подход</p>
            </div>
            <div class="text">
                <p>Системный подход, который помогает рассмотреть ситуацию комплексно</p>
            </div>
            <div class="text">
                <p>Конфиденциальность каждной консультации</p>
            </div>
            <div class="text">
                <p>Не осуждаем за какой-то поступок, а помогаем его разобрать почему так получилось</p>
            </div>
        </div>
        <div class="content">Проблемы, которые останутся позади</div>
        <hr width="984" size="6" color="#0292A3"/>
        <div class="d-flex mt-3">
            <div class="description d-flex">
                <div class="desc-item">
                    <div class="text-description d-flex">
                        <h4>Сложности во взаимодействии с другими людьми</h4><img alt="arrow right" class="more"
                                                                                  src="img/arrow-right.svg">
                    </div>
                    <div class="more-text">
                        <p>Вы можете не только упорядочить свои чувства, но и также вернуть свои жизненные ориентиры и
                            смыслы
                            <br><a class="more_details" href="">Подробнее</a>
                        </p>
                    </div>
                </div>

                <div class="desc-item">
                    <div class="text-description d-flex">
                        <h4>Неуверенность, низкая самооценка</h4><img alt="arrow right" class="more"
                                                                      src="img/arrow-right.svg">
                    </div>
                    <div class="more-text">
                        <p>Вы можете не только упорядочить свои чувства, но и также вернуть свои жизненные ориентиры и
                            смыслы
                            <br><a class="more_details" href="">Подробнее</a>
                        </p>
                    </div>
                </div>

                <div class="desc-item">
                    <div class="text-description d-flex">
                        <h4>Работа со страхами и депрессией</h4><img alt="arrow right" class="more"
                                                                     src="img/arrow-right.svg">
                    </div>
                    <div class="more-text">
                        <p>Вы можете не только упорядочить свои чувства, но и также вернуть свои жизненные ориентиры и
                            смыслы
                            <br><a class="more_details" href="">Подробнее</a>
                        </p>
                    </div>
                </div>

                <div class="desc-item">
                    <div class="text-description d-flex">
                        <h4>Чувство одиночества</h4><img alt="arrow right" class="more" src="img/arrow-right.svg">
                    </div>
                    <div class="more-text">
                        <p>Вы можете не только упорядочить свои чувства, но и также вернуть свои жизненные ориентиры и
                            смыслы
                            <br><a class="more_details" href="">Подробнее</a>
                        </p>
                    </div>
                </div>

                <div class="desc-item">
                    <div class="text-description d-flex">
                        <h4>Панические атаки</h4><img alt="arrow right" class="more" src="img/arrow-right.svg">
                    </div>
                    <div class="more-text">
                        <p>Вы можете не только упорядочить свои чувства, но и также вернуть свои жизненные ориентиры и
                            смыслы
                            <br><a class="more_details" href="">Подробнее</a>
                        </p>
                    </div>
                </div>

                <div class="desc-item">
                    <div class="text-description d-flex">
                        <h4>Посттравматическое стрессовое расстройство</h4><img alt="arrow right" class="more"
                                                                                src="img/arrow-right.svg">
                    </div>
                    <div class="more-text">
                        <p>Вы можете не только упорядочить свои чувства, но и также вернуть свои жизненные ориентиры и
                            смыслы
                            <br><a class="more_details" href="">Подробнее</a>
                        </p>
                    </div>
                </div>

                <div class="desc-item">
                    <div class="text-description d-flex">
                        <h4>Упадок сил</h4><img alt="arrow right" class="more" src="img/arrow-right.svg">
                    </div>
                    <div class="more-text">
                        <p>Вы можете не только упорядочить свои чувства, но и также вернуть свои жизненные ориентиры и
                            смыслы
                            <br><a class="more_details" href="">Подробнее</a>
                        </p>
                    </div>
                </div>
            </div>

            <!--        <div class="photo-area">-->
            <!--            <img src="/img/border-rec.svg" class="firs-card" alt="">-->
            <!--            <img src="/img/usman.png" class="second-card" alt="">-->
            <!--            <img src="/img/kelly.png" class="third-card" alt="">-->
            <!--            <img src="/img/nik.png" class="fourth-card" alt="">-->
            <!--            <img src="/img/Rectangle.svg" class="fifth-card" alt="">-->
            <!--            <img src="/img/anthony.png" class="sixth-card" alt="">-->
            <!--        </div>-->
            <div class="photo-area">
                <img src="/img/test/Group%2021.png" alt="">
            </div>
        </div>
        <div class="clear"></div>

    </div>

    <div class="subscription">
        <div class="title-section">
            <h1>У нас есть абонементы для Вас!</h1>
            <hr/>
        </div>
        <div class="cards-list d-flex">
            <div class="col-3 scalable">
                <div class="border-outline">
                    <div class="title-card">
                        <h3>4 консультации</h3>
                    </div>
                    <div class="body-card">
                        <ul>
                            <li>Бесплатная диагностика</li>
                            <li>Подбор времени, которое удобно Вам</li>
                            <li>Консультации можно использовать в течении 1-го месяца</li>
                            <li>Подбор специалиста</li>
                            <li>Стоимость от 200$</li>
                        </ul>
                        <div class="full-width">
                            <a href="#" class="btn-primary">Купить</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 scalable focus">
                <div class="border-outline">
                    <div class="title-card">
                        <h3>8 консультаций</h3>
                    </div>
                    <div class="body-card">
                        <ul>
                            <li>Бесплатная диагностика</li>
                            <li>Подбор времени, которое удобно Вам</li>
                            <li>Консультации можно использовать в течении 2-х месяцев</li>
                            <li>Консультации 2 раза в неделю</li>
                            <li>Подбор специалиста</li>
                            <li>Стоимость от 450$</li>
                        </ul>
                        <div class="full-width">
                            <a href="#" class="btn-primary">Купить</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 scalable">
                <div class="border-outline">
                    <div class="title-card">
                        <h3>12 консультаций</h3>
                    </div>
                    <div class="body-card">
                        <ul>
                            <li>Бесплатная диагностика</li>
                            <li>Подбор времени, которое удобно Вам</li>
                            <li>Консультации можно использовать в течении 1-го месяца</li>
                            <li>Подбор специалиста</li>
                            <li>Стоимость от 1000$</li>
                        </ul>
                        <div class="full-width">
                            <a href="#" class="btn-primary">Купить</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>

    <div class="command-section">
        <div class="title-section">
            <h1>Команда высококвалифицированных специалистов </h1>
        </div>
        <div class="banner-command">
            <div class="banner-title">
                <h2>Работаем только с опытными специалистами</h2>
            </div>
            <div class="stairs d-flex">
                <div class="col-4">
                    <div class="step step-one">
                        <div class="step-title">
                            <div class="number">1</div>
                            <h3>Образование</h3>
                        </div>
                        <div class="step-description">
                            <p>Высшее психологическое, гуманитарное и дополнительное психотерапевтическое.</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="step step-two">
                        <div class="step-title">
                            <div class="number">2</div>
                            <h3>Опыт</h3>
                        </div>
                        <div class="step-description">
                            <p>От трех лет. За это время накапливается хороший практический опыт.</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="step step-three">
                        <div class="step-title">
                            <div class="number">3</div>
                            <h3>Собеседование</h3>
                        </div>
                        <div class="step-description">
                            <p>Проверяем самое важное: навыки и успешные кейсы из практики.</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="step step-four">
                        <div class="step-title">
                            <div class="number">4</div>
                            <h3>Обучение</h3>
                        </div>
                        <div class="step-description">
                            <p>И мастерам важно учиться. Развиваем через семинары и супервизии.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner-bottom">
                <a href="#" class="btn-primary">Подобрать своего специалиста</a>
            </div>
        </div>
        <div class="clear"></div>
    </div>

    <div class="reviews-section">
        <div class="title-section">
            <h1>Отзывы</h1>
            <hr>
        </div>

        <div class="carousel-review d-flex">
            <div class="arrow arrow-to-left"><img src="img/arrow-to-left.svg" alt=""></div>
            <div class="carousel-container">
                <ul class="d-flex carousel-ul">
                    <li>
                        <div class="carousel-card">
                            <div class="block">
                                <div class="carousel-card-content">
                                    <div class="d-flex">
                                        <div class="img-block"><img src="/img/review-img.png" alt="user photo"></div>
                                        <div class="review">
                                            <div class="reviewer-name">
                                                <h1>Александра Александрова</h1>
                                                <span class="date">05.08.2021</span>
                                            </div>
                                            <div class="review-description">
                                                <div class="review-title">Психолог помог!</div>
                                                <div class="review-article">
                                                    <p>
                                                        Я долго искала своего врача, потому что проблема у меня
                                                        достаточно
                                                        сложная. Я ипохондрик, причем со стажем. Постоянно намываю руки,
                                                        не
                                                        трогаю ручки дверей, избегаю людных мест, боюсь заразиться
                                                        чем-то от
                                                        других людей и все в этом духе. Была на приеме у 4 специалистов,
                                                        по
                                                        отзывам все отличные, но понять твой это врач или нет, можно
                                                        только
                                                        после личной беседы. Только тут мне смогли помочь. Теперь могу
                                                        находиться в общественных местах и не переживать.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border"></div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="carousel-card">
                            <div class="block">
                                <div class="carousel-card-content">
                                    <div class="d-flex">
                                        <div class="img-block"><img src="/img/review-img.png" alt="user photo"></div>
                                        <div class="review">
                                            <div class="reviewer-name">
                                                <h1>Александра Александрова</h1>
                                                <span class="date">05.08.2021</span>
                                            </div>
                                            <div class="review-description">
                                                <div class="review-title">Психолог помог!</div>
                                                <div class="review-article">
                                                    <p>
                                                        Я долго искала своего врача, потому что проблема у меня
                                                        достаточно
                                                        сложная. Я ипохондрик, причем со стажем. Постоянно намываю руки,
                                                        не
                                                        трогаю ручки дверей, избегаю людных мест, боюсь заразиться
                                                        чем-то от
                                                        других людей и все в этом духе. Была на приеме у 4 специалистов,
                                                        по
                                                        отзывам все отличные, но понять твой это врач или нет, можно
                                                        только
                                                        после личной беседы. Только тут мне смогли помочь. Теперь могу
                                                        находиться в общественных местах и не переживать.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border"></div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="carousel-card">
                            <div class="block">
                                <div class="carousel-card-content">
                                    <div class="d-flex">
                                        <div class="img-block"><img src="/img/review-img.png" alt="user photo"></div>
                                        <div class="review">
                                            <div class="reviewer-name">
                                                <h1>Александра Александрова</h1>
                                                <span class="date">05.08.2021</span>
                                            </div>
                                            <div class="review-description">
                                                <div class="review-title">Психолог помог!</div>
                                                <div class="review-article">
                                                    <p>
                                                        Я долго искала своего врача, потому что проблема у меня
                                                        достаточно
                                                        сложная. Я ипохондрик, причем со стажем. Постоянно намываю руки,
                                                        не
                                                        трогаю ручки дверей, избегаю людных мест, боюсь заразиться
                                                        чем-то от
                                                        других людей и все в этом духе. Была на приеме у 4 специалистов,
                                                        по
                                                        отзывам все отличные, но понять твой это врач или нет, можно
                                                        только
                                                        после личной беседы. Только тут мне смогли помочь. Теперь могу
                                                        находиться в общественных местах и не переживать.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border"></div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="carousel-card">
                            <div class="block">
                                <div class="carousel-card-content">
                                    <div class="d-flex">
                                        <div class="img-block"><img src="/img/review-img.png" alt="user photo"></div>
                                        <div class="review">
                                            <div class="reviewer-name">
                                                <h1>Александра Александрова</h1>
                                                <span class="date">05.08.2021</span>
                                            </div>
                                            <div class="review-description">
                                                <div class="review-title">Психолог помог!</div>
                                                <div class="review-article">
                                                    <p>
                                                        Я долго искала своего врача, потому что проблема у меня
                                                        достаточно
                                                        сложная. Я ипохондрик, причем со стажем. Постоянно намываю руки,
                                                        не
                                                        трогаю ручки дверей, избегаю людных мест, боюсь заразиться
                                                        чем-то от
                                                        других людей и все в этом духе. Была на приеме у 4 специалистов,
                                                        по
                                                        отзывам все отличные, но понять твой это врач или нет, можно
                                                        только
                                                        после личной беседы. Только тут мне смогли помочь. Теперь могу
                                                        находиться в общественных местах и не переживать.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border"></div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="carousel-card">
                            <div class="block">
                                <div class="carousel-card-content">
                                    <div class="d-flex">
                                        <div class="img-block"><img src="/img/review-img.png" alt="user photo"></div>
                                        <div class="review">
                                            <div class="reviewer-name">
                                                <h1>Александра Александрова</h1>
                                                <span class="date">05.08.2021</span>
                                            </div>
                                            <div class="review-description">
                                                <div class="review-title">Психолог помог!</div>
                                                <div class="review-article">
                                                    <p>
                                                        Я долго искала своего врача, потому что проблема у меня
                                                        достаточно
                                                        сложная. Я ипохондрик, причем со стажем. Постоянно намываю руки,
                                                        не
                                                        трогаю ручки дверей, избегаю людных мест, боюсь заразиться
                                                        чем-то от
                                                        других людей и все в этом духе. Была на приеме у 4 специалистов,
                                                        по
                                                        отзывам все отличные, но понять твой это врач или нет, можно
                                                        только
                                                        после личной беседы. Только тут мне смогли помочь. Теперь могу
                                                        находиться в общественных местах и не переживать.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border"></div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="carousel-card">
                            <div class="block">
                                <div class="carousel-card-content">
                                    <div class="d-flex">
                                        <div class="img-block"><img src="/img/review-img.png" alt="user photo"></div>
                                        <div class="review">
                                            <div class="reviewer-name">
                                                <h1>Александра Александрова</h1>
                                                <span class="date">05.08.2021</span>
                                            </div>
                                            <div class="review-description">
                                                <div class="review-title">Психолог помог!</div>
                                                <div class="review-article">
                                                    <p>
                                                        Я долго искала своего врача, потому что проблема у меня
                                                        достаточно
                                                        сложная. Я ипохондрик, причем со стажем. Постоянно намываю руки,
                                                        не
                                                        трогаю ручки дверей, избегаю людных мест, боюсь заразиться
                                                        чем-то от
                                                        других людей и все в этом духе. Была на приеме у 4 специалистов,
                                                        по
                                                        отзывам все отличные, но понять твой это врач или нет, можно
                                                        только
                                                        после личной беседы. Только тут мне смогли помочь. Теперь могу
                                                        находиться в общественных местах и не переживать.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border"></div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="carousel-card">
                            <div class="block">
                                <div class="carousel-card-content">
                                    <div class="d-flex">
                                        <div class="img-block"><img src="/img/review-img.png" alt="user photo"></div>
                                        <div class="review">
                                            <div class="reviewer-name">
                                                <h1>Александра Александрова</h1>
                                                <span class="date">05.08.2021</span>
                                            </div>
                                            <div class="review-description">
                                                <div class="review-title">Психолог помог!</div>
                                                <div class="review-article">
                                                    <p>
                                                        Я долго искала своего врача, потому что проблема у меня
                                                        достаточно
                                                        сложная. Я ипохондрик, причем со стажем. Постоянно намываю руки,
                                                        не
                                                        трогаю ручки дверей, избегаю людных мест, боюсь заразиться
                                                        чем-то от
                                                        других людей и все в этом духе. Была на приеме у 4 специалистов,
                                                        по
                                                        отзывам все отличные, но понять твой это врач или нет, можно
                                                        только
                                                        после личной беседы. Только тут мне смогли помочь. Теперь могу
                                                        находиться в общественных местах и не переживать.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border"></div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="carousel-card">
                            <div class="block">
                                <div class="carousel-card-content">
                                    <div class="d-flex">
                                        <div class="img-block"><img src="/img/review-img.png" alt="user photo"></div>
                                        <div class="review">
                                            <div class="reviewer-name">
                                                <h1>Александра Александрова</h1>
                                                <span class="date">05.08.2021</span>
                                            </div>
                                            <div class="review-description">
                                                <div class="review-title">Психолог помог!</div>
                                                <div class="review-article">
                                                    <p>
                                                        Я долго искала своего врача, потому что проблема у меня
                                                        достаточно
                                                        сложная. Я ипохондрик, причем со стажем. Постоянно намываю руки,
                                                        не
                                                        трогаю ручки дверей, избегаю людных мест, боюсь заразиться
                                                        чем-то от
                                                        других людей и все в этом духе. Была на приеме у 4 специалистов,
                                                        по
                                                        отзывам все отличные, но понять твой это врач или нет, можно
                                                        только
                                                        после личной беседы. Только тут мне смогли помочь. Теперь могу
                                                        находиться в общественных местах и не переживать.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border"></div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="page-ellipse">
                    <i class="ellipse"></i>
                </div>
            </div>
            <div class="arrow arrow-to-right"><img src="/img/arrow-to-right.svg" alt=""></div>

        </div>

        <div class="clear"></div>
    </div>

@endsection

@section('footer')

    <footer>
        <div class="title-section">
            <h1>Остались вопросы?</h1>
        </div>
        <div class="rec"></div>
        <div class="d-flex">
            <div class="col-3 social">
                <h4>Напишите нам</h4>
                <ul>
                    <li><a href="#" target="_blank"><i class="icon-instagram"></i>@maxb861</a></li>
                    <li><a href="#" target="_blank"><i class="icon-facebook"></i>Максим Бурцев</a></li>
                    <li><a href="#" target="_blank"><i class="icon-telegram"></i>@Maxb86</a></li>
                    <li><a href="#" target="_blank"><i class="icon-mail"></i>directorkorol@gmail.com</a></li>
                </ul>
            </div>
            <div class="col-2 contact-form">
                <h4>Мы с Вами свяжемся</h4>
                <form action="">
                    <div class="input-form">
                        <input type="text" placeholder="Имя">
                    </div>
                    <div class="input-form">
                        <input type="text" placeholder="Как с Вами связаться">
                    </div>
                    <div class="input-form">
                        <input type="text" placeholder="Ваш вопрос">
                    </div>

                    <button class="btn-primary" type="submit">Отправить</button>
                </form>
            </div>
        </div>

    </footer>
    <script src="js/index.js"></script>
    <script src="js/slider.js"></script>
@endsection

