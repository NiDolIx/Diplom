@extends('layout.layout')

@section('lkUpdate')
    <a href="{{ route('client.index') }}">Вернуться назад</a>
    <form action="{{ route('client.lkUpdateUpd') }}" method="POST" novalidate>
        @csrf
        <h1>Обновление личной информации</h1>
        <input name="user_name" value="{{ $data->user_name }}" type="text" placeholder="Имя">
        <input name="user_surname" value="{{ $data->user_surname }}" type="text" placeholder="Фамилия">
        <input name="user_patronymic" value="{{ $data->user_patronymic }}" type="text" placeholder="Отчество">
        <input name="user_phone" value="{{ $data->user_phone }}" type="text" placeholder="Номер телефона">
        <input name="user_mail" value="{{ $data->user_mail }}" type="text" placeholder="Электронная почта">
        <input type="submit" value="Применить">
    </form>

    @vite(['resources/css/updateServiseInfo.css'])
@endsection