@extends('header.header')

@section('lk')
    <div id="lk-container">
        <div class="lk-container-info">
            <h1>{{ $user->user_surname }} {{ $user->user_name }} {{ $user->user_patronymic }}</h1>
            <hr>
            <p>Телефон: {{ $user->user_phone }}</p>
            <p>Почта: {{ $user->user_mail }}</p> 
        </div>
        <a href="{{ route('client.lkUpdateView') }}"><input value="Редактировать личную информацию" type="submit"></a>

        <h2>Личные автомобили</h2>

        <hr>

        @if(!empty($car))
            @foreach($car as $element)
                <div class="lk-container-info">
                    <h1>{{$element->car_mark}} {{$element->car_model}}</h1>
                    <a href="{{ route('client.delete', $element->car_sts) }}" id="close-btn">&#215;</a>
                    <hr>
                    <p>Гос. номер: {{$element->car_number}}</p>
                    <p>Год выпуска: {{$element->car_year}}</p>
                    <p>Кузов: {{$element->car_body}}</p>
                    <p>Объём двигателя: {{$element->car_engine}}</p>
                </div>
            @endforeach
        @else
            <p>Личных автомобилей нет</p>
        @endif

        <input id="add-car" type="submit" value="Добавить автомобиль">

        <form id="add-car-container" class="hidden" method="POST" action="{{ route('client.store') }}" novalidate>
            @csrf
            <input name="car_mark" type="text" placeholder="Марка автомобиля">
            <input name="car_model" type="text" placeholder="Модель автомобиля">
            <input name="car_year" type="text" placeholder="Год выпуска">
            <input name="car_engine" type="text" placeholder="Объем двигателя">
            <input name="car_sts" type="text" placeholder="№СТС">
            <input name="car_number" type="text" placeholder="Номерной знак">
            <select name="car_body">
                <option value="Седан">Седан</option>
                <option value="Хэтчбэк">Хэтчбэк</option>
                <option value="Универсал">Универсал</option>
                <option value="Внедорожник">Внедорожник</option>
                <option value="Купэ">Купэ</option>
                <option value="Лимузин">Лимузин</option>
                <option value="Пикап">Пикап</option>
                <option value="Минивэн">Минивэн</option>
                <option value="Кабриолет">Кабриолет</option>
            </select>
            <input type="submit" value="Добавить">
        </form>
    </div>

    @vite(['resources/css/lk.css', 'resources/js/lk.js'])
@endsection