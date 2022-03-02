@extends('layouts.main')

@section('title', 'Наши психологи')

@section('styles')
    <link rel="stylesheet" href="{{ asset('sass/performers_list.css') }}">
@endsection

@section('content')
    <div class="main">
        <div class="section-title">
            <h1>Наши психологи</h1>
            <hr>
        </div>

        <form method="POST" action="{{ route('performers.list.filters') }}">
            @csrf
            <div class="filters d-flex">
                <span>Фильтр:</span>
                <div class="select-control">
                    <select name="category" id="category">
                        <option
                            {{ isset($old_category) && $old_category == 'default' ? 'selected' : '' }} value="default">
                            Направления
                        </option>
                        @foreach($categories as $category)
                            <option
                                {{ isset($old_category) && $category->id == $old_category ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
                <select name="price" id="price">
                    <option {{ isset($price) && $price == 'default' ? 'selected' : '' }} value="default">Стоимость
                    </option>
                    <option {{ isset($price) && $price == ',50' ? 'selected' : '' }} value=",50">до 50$</option>
                    <option {{ isset($price) && $price == '50,100' ? 'selected' : '' }} value="50,100">от 50$ до 100$
                    </option>
                    <option {{ isset($price) && $price == '100,150' ? 'selected' : '' }} value="100,150">от 100$ до
                        150$
                    </option>
                    <option {{ isset($price) && $price == '150,200' ? 'selected' : '' }} value="150,200">от 150$ до
                        200$
                    </option>
                    <option {{ isset($price) && $price == '200,' ? 'selected' : '' }} value="200,">от 200$</option>
                </select>
                <select name="gender" id="gender">
                    <option {{ isset($gender) && $gender == 'default' ? 'selected' : '' }} value="default">Пол
                        психолога
                    </option>
                    <option {{ isset($gender) && $gender == 'female' ? 'selected' : '' }} value="female">Женщина
                    </option>
                    <option {{ isset($gender) && $gender == 'male' ? 'selected' : '' }} value="male">Мужчина</option>
                </select>
                <button id="filterSubmit" class="btn btn-primary" type="submit">Применить</button>
            </div>
        </form>

        <div class="items-list">
            @foreach($performers as $performer)
                <div class="item col-3">
                    <div class="item-thumbnail">
                        <img src="{{ url( 'storage/' . $performer->thumbnail) }}" alt="People photo">
                    </div>
                    <div class="item-short-desc">
                        <h3>{{ $performer->name }}</h3>
                        <h4>
                            @foreach($performer->categories as $category)
                                <span>{{ $category->title }}</span>
                            @endforeach
                        </h4>
                    </div>
                    <div class="item-description">
                        <p>{{ $performer->description }}</p>
                        <a href="{{ route('performer.about',$performer->id) }}">
                            <div class="more-description">
                                Подробнее
                                <div class="gradient-primary"><i class="arrow"></i></div>
                            </div>
                        </a>
                    </div>
                    <div class="item-price">
                        <div class="d-flex">
                            <span>1 консультация</span>
                            <span>{{ $performer->performerDescription->pricePerOnceSession }}$
                                    @if(auth()->user() !== null)
                                        {{ auth()->user()->role->title !== 'customer' && auth()->user()->role->title !== 'performer' ? '(' . $performer->performerDescription->pricePerOnceSession / 2 . '$)' : ''}}</span>
                                    @endif
                        </div>
                        <div class="d-flex">
                            @if($performer->hasSubscription())
                                <span>Абонемент</span>
                                <span>от {{ $performer->getMinimumPrice() }}$
                                    @if(auth()->user() !== null)
                                        {{ auth()->user()->role->title !== 'customer' && auth()->user()->role->title !== 'performer' ? '(' . $performer->getMinimumPrice() / 2 . '$)' : ''}}</span>
                                    @endif
                            @else
                                <span>Нет свободных абонементов</span>
                            @endif
                        </div>
                    </div>
                    <a href="{{ route('performer.checkout', $performer->id) }}" class="btn btn-primary">Записаться</a>
                </div>
            @endforeach
        </div>
        <div class="pagination-container">
            {{ $performers->links() }}
        </div>

    </div>
@endsection

@section('footer')
    <footer>
        <div class="title-section">
            <h1>Остались вопросы?</h1>
        </div>
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
@endsection

