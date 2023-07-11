@extends('header.header')

@section('search')
    <div id="search">
        <aside>
            @foreach($carservises as $element)
                <div class="servise-container">
                    <h2>{{ $element->carservise_name }}</h2>
                    <div class="photo">

                    </div>
                    <p>Адрес: {{ $element->carservise_address }}</p>
                    <p>Телефон: {{ $element->carservise_phone }}</p>
                    <p>Сайт: {{ $element->carservise_site }}</p>
                    <a href="{{ route('servise.index', $element->carservise_id) }}"><input type="submit" value="Подробнее"></a>
                </div>
            @endforeach
        </aside>
        <div id="search-container">
            <div id="search-content">
                <form id="search-content-input">
                    <input type="submit" value="Найти">
                    <input type="text">
                </form>
                <div id="search-container-filter">
                    <p>Фильтры</p>
                    <select name="comment_rating">
                        <option disable selected hidden>Минимальный рейтинг</option>
                        <option value="9">Отличный 9+</option>
                        <option value="7">Хороший 7+</option>
                        <option vakue="5">Нормальный 5+</option>
                    </select>
                    <select name="servise_type" placeholder="Тип услуги">
                        <option disable>Вид работ</option>
                        @foreach($type as $element)
                            <option value="{{ $element->servise_type }}">{{ $element->servise_type }}</option>
                        @endforeach
                    </select>
                    <p><input type="checkbox">Низкие цены</p>
                    <p><input type="checkbox">Ближайшие</p>
                </div>
                <input type="text" placeholder="Где вы находитесь? (Введите адрес)">
            </div>

            <div id="map-container">

            </div>
        </div>
    </div>

    @vite(['resources/css/search.css', 'resources/js/map.js'])
@endsection