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
                <h1 class="psych-name">{{ $performer->name }}</h1>
                <div class="d-flex">
                    <div class="col-2">
                        <h4 class="experience">Опыт работы: {{ $experience_str }}</h4>
                        <h4 class="rank">{{ $performer->performerDescription->hasHighestCategory ? 'Имеет высшую категорию' : ''}}</h4>
                        <p class="short-desc">{{ $performer->performerDescription->about }}</p>
                        <ul class="treatment">
                            Подходы:
                            @foreach($performer->categories as $category)
                                <li> {{ $category->title }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-2">
                        <div class="directions">
                            <ul>
                                Основные направления деятельности:
                                @foreach($directionsArr as $direction)
                                    <li>{{ $direction }}</li>
                                @endforeach
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

            @if(count($reviews) !== 0)
                <div class="carousel-review d-flex">
                    <div class="arrow arrow-to-left"><img src="{{ asset('img/arrow-to-left.svg') }}" alt=""></div>
                    <div class="carousel-container">
                        <ul class="d-flex carousel-ul">
                            @foreach($reviews as $review)
                                <li>
                                    <div class="carousel-card">
                                        <div class="block">
                                            <div class="carousel-card-content">
                                                <div class="d-flex">
                                                    <div class="img-block"><img
                                                            src="{{ $review->incognito ? '/img/guest.png' : url( 'storage/' . $review->getReviewer->thumbnail) }}"
                                                            alt="user photo"></div>
                                                    <div class="review">
                                                        <div class="reviewer-name">
                                                            <h1>{{ $review->incognito ? 'Анонимный отзыв' : $review->getReviewer->name }}</h1>
                                                            <span class="date">{{ \Carbon\Carbon::create($review->created_at)->format('Y.m.d') }}</span>
                                                        </div>
                                                        <div class="review-description">
                                                            <div class="review-title">{{ $review->title }}</div>
                                                            <div class="review-article">
                                                                <p>{{ $review->content }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="border"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="page-ellipse">
                            <i class="ellipse"></i>
                        </div>
                    </div>
                    <div class="arrow arrow-to-right"><img src="{{ asset('img/arrow-to-right.svg') }}" alt=""></div>
                </div>
            @else
                <div class="title-section">
                    <h1 class="text-center">Нет отзывов</h1>
                </div>
            @endif

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
            <form action="{{ route('review.store', $performer->id) }}" method="POST">
                @csrf
                <input type="hidden" name="reviewer_id" value="{{ auth()->user()->id }}">
                <h4>Все поля обязательны для заполнения</h4>
                <input type="text" name="title" placeholder="Заголовок">
                <textarea name="content" id="review-text" cols="30" rows="10" placeholder="Ваш отзыв"></textarea>
                <div class="checkbox-control">
                    <input type="checkbox" class="checkbox" name="incognito" id="incognito">
                    <label for="incognito" id="incognito_label">Оставить анонимный отзыв</label>
                </div>
                <button class="btn btn-primary" type="submit">Отправить</button>
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

                    <button class="btn btn-primary" type="submit">Отправить</button>
                </form>
            </div>
        </div>
    </footer>
    <script src="{{ asset('js/index.js') }}"></script>
    <script src="{{ asset('js/slider.js') }}"></script>
@endsection

