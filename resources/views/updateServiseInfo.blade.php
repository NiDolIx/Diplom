@extends('layout.layout')

@section('updateServiseInfo')
    <a href="{{ route('servise.index', Auth::user()->only('carservise_id')) }}">Вернуться назад</a>
    <form action="{{ route('servise.updateServiseInfoUpd', Auth::user()->only('carservise_id')) }}" method="POST" novalidate>
        @csrf
        <h1>Обновление информациии об автосервисе</h1>
        @foreach($data as $element)
            <input name="carservise_name" value="{{ $element->carservise_name }}" type="text" placeholder="Название автосервиса">
            <input name="carservise_address" value="{{ $element->carservise_address }}" type="text" placeholder="Адрес автосервиса">
            <input name="carservise_phone" value="{{ $element->carservise_phone }}" type="text" placeholder="Tелефон автосервиса">
            <input name="carservise_site" value="{{ $element->carservise_site }}" type="text" placeholder="Сайт автосервиса">
            <textarea id="carservise_schedule" name="carservise_schedule" placeholder="График работ">{{ $element->carservise_schedule }}</textarea>
            <textarea id="carservise_car" name="carservise_car" placeholder="Обслуживаемые автомобили">{{ $element->carservise_car }}</textarea>
            <textarea id="carservise_info" name="carservise_info" placeholder="Описание автосервиса">{{ $element->carservise_info }}</textarea>
        @endforeach
        <input type="submit" value="Применить">
    </form>

    @vite(['resources/css/updateServiseInfo.css'])
@endsection