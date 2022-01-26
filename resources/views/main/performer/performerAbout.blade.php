@extends('layouts.main')

@section('title', $performer->name)

@section('styles')
    <link rel="stylesheet" href="{{ asset('sass/style.css') }}">
    <link rel="stylesheet" href="{{ asset('sass/performers_page.css') }}">
@endsection

@section('content')

    <div class="main">
        <div class="psych-info d-flex">
            <div class="psych-thumb">
                <div class="thumb">
                    <img src="{{ url( 'storage/' . $performer->thumbnail) }}" alt="User photo">
                </div>
            </div>

            <div class="about">
                <h1 class="psych-name">Иван Иванов</h1>
                <div class="d-flex">
                    <div class="col-2">
                        <h4 class="experience">Опыт работы: 15 лет</h4>
                        <h4 class="rank">Имеет высшую категорию</h4>
                        <p class="short-desc">Семейный терапевт, помогает решать сложности во взаимоотношениях в формате семейной и парной психотерапии.</p>
                        <ul class="treatment">
                            Подходы:
                            <li>Гештальт - терапия</li>
                            <li>Нейролингвистическое программирование (НЛП)</li>
                        </ul>
                    </div>
                    <div class="col-2">
                        <div class="directions">
                            <ul>
                                Основные направления деятельности:
                                <li>Нарушения привязанности</li>
                                <li>Травма брошенности, абъюза, потери</li>
                                <li>Абъюзивные и созависимые отношения</li>
                                <li>Психосоматические нарушения</li>
                                <li>Тревога и депрессия</li>
                                <li>Обсессивно-компульсивное расстройство</li>
                                <li>Кризисные состояния личности</li>
                                <li>Трудности в семейных отношениях</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="reviews-section">
            <div class="title-section">
                <h1>Отзывы</h1>
                <hr>
            </div>

            <div class="carousel-review d-flex">
                <div class="arrow arrow-to-left"><img src="{{ asset('img/arrow-to-left.svg') }}" alt=""></div>
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
                                                            Я долго искала своего врача, потому что проблема у меня достаточно
                                                            сложная. Я ипохондрик, причем со стажем. Постоянно намываю руки, не
                                                            трогаю ручки дверей, избегаю людных мест, боюсь заразиться чем-то от
                                                            других людей и все в этом духе. Была на приеме у 4 специалистов, по
                                                            отзывам все отличные, но понять твой это врач или нет, можно только
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
                                                            Я долго искала своего врача, потому что проблема у меня достаточно
                                                            сложная. Я ипохондрик, причем со стажем. Постоянно намываю руки, не
                                                            трогаю ручки дверей, избегаю людных мест, боюсь заразиться чем-то от
                                                            других людей и все в этом духе. Была на приеме у 4 специалистов, по
                                                            отзывам все отличные, но понять твой это врач или нет, можно только
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
                                                            Я долго искала своего врача, потому что проблема у меня достаточно
                                                            сложная. Я ипохондрик, причем со стажем. Постоянно намываю руки, не
                                                            трогаю ручки дверей, избегаю людных мест, боюсь заразиться чем-то от
                                                            других людей и все в этом духе. Была на приеме у 4 специалистов, по
                                                            отзывам все отличные, но понять твой это врач или нет, можно только
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
                                                            Я долго искала своего врача, потому что проблема у меня достаточно
                                                            сложная. Я ипохондрик, причем со стажем. Постоянно намываю руки, не
                                                            трогаю ручки дверей, избегаю людных мест, боюсь заразиться чем-то от
                                                            других людей и все в этом духе. Была на приеме у 4 специалистов, по
                                                            отзывам все отличные, но понять твой это врач или нет, можно только
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
                                                            Я долго искала своего врача, потому что проблема у меня достаточно
                                                            сложная. Я ипохондрик, причем со стажем. Постоянно намываю руки, не
                                                            трогаю ручки дверей, избегаю людных мест, боюсь заразиться чем-то от
                                                            других людей и все в этом духе. Была на приеме у 4 специалистов, по
                                                            отзывам все отличные, но понять твой это врач или нет, можно только
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
                                                            Я долго искала своего врача, потому что проблема у меня достаточно
                                                            сложная. Я ипохондрик, причем со стажем. Постоянно намываю руки, не
                                                            трогаю ручки дверей, избегаю людных мест, боюсь заразиться чем-то от
                                                            других людей и все в этом духе. Была на приеме у 4 специалистов, по
                                                            отзывам все отличные, но понять твой это врач или нет, можно только
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
                                                            Я долго искала своего врача, потому что проблема у меня достаточно
                                                            сложная. Я ипохондрик, причем со стажем. Постоянно намываю руки, не
                                                            трогаю ручки дверей, избегаю людных мест, боюсь заразиться чем-то от
                                                            других людей и все в этом духе. Была на приеме у 4 специалистов, по
                                                            отзывам все отличные, но понять твой это врач или нет, можно только
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
                                                            Я долго искала своего врача, потому что проблема у меня достаточно
                                                            сложная. Я ипохондрик, причем со стажем. Постоянно намываю руки, не
                                                            трогаю ручки дверей, избегаю людных мест, боюсь заразиться чем-то от
                                                            других людей и все в этом духе. Была на приеме у 4 специалистов, по
                                                            отзывам все отличные, но понять твой это врач или нет, можно только
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
                <div class="arrow arrow-to-right"><img src="{{ asset('img/arrow-to-right.svg') }}" alt=""></div>

            </div>

            <div class="clear"></div>
        </div>

    </div>

@endsection

@section('footer')
    <div class="feedback-section d-flex">
        <div class="col-2 review-container">
            <div class="title-section">
                <h2>Вы можете оставить отзыв</h2>
                <hr>
            </div>
            <form action="">
                <h4>Все поля обязательны для заполнения</h4>
                <input type="text" name="name" placeholder="Имя">
                <textarea name="review-text" id="review-text" cols="30" rows="10" placeholder="Ваш отзыв"></textarea>
                <div class="checkbox-control">
                    <input type="checkbox" class="checkbox" name="incognito" id="incognito"><label for="incognito">Оставить анонимный отзыв</label>
                </div>
                <button class="btn-primary" type="submit">Отправить</button>
            </form>
        </div>
        <div class="col-2">
            <img src="{{ asset('img/group2.png') }}" alt="">
        </div>
    </div>
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
    <script src="{{ asset('js/index.js') }}"></script>
    <script src="{{ asset('js/slider.js') }}"></script>
@endsection

