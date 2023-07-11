@extends('layout.layout')

@section('preview')
    <div id="preview">
        <h1>Отчет о заявке</h1>
        @foreach($data as $element)
            <p>ID заявки: {{ $element->bid_id }} </p>
            <p>ФИО клиента: {{ $element->user_name }} {{ $element->user_surname }} {{ $element->user_patronymic }}</p>
            <p>Номер телефона клиента: {{ $element->user_phone }}</p>
            <p>Почта клиента: {{ $element->user_mail }}</p>
            <p>Автомобиль клиента: {{ $element->car_mark }} {{ $element->car_model }}</p>
            <p>Номерной знак автомобиля: {{ $element->car_number }}</p>
            <p>Автосервис: {{ $element->carservise_name }}</p>
            <p>Адрес автосервиса: {{ $element->carservise_address }}</p>
            <p>Дата оформления: {{ $element->bid_date_add }}</p> 
            <p>Дата завершения: {{ $element->bid_date_end }}</p>
            <p>Описание неисправности: {{ $element->bid_comment }}</p>
            <p>Предоставленные услуги: Замена воздушного фильтра</p>
            <p>Стоимость: 200 руб.</p>
        @endforeach
        <a href="{{ route('pdf.generate') }}">Сгенерировать PDF</a>
    </div>

    @vite(['resources/css/preview.css'])
@endsection

<style>
    body {
        font-family: DejaVu Sans, sans-serif;
    }
</style>