@extends('layout.layout')

@section('registration')
    @vite(['resources/css/auth.css'])

    <div id="auth-content">
        <form id="auth-form" action="{{ route('auth.store') }}" method="POST" novalidate>
            @csrf
            <h1>Авторизация</h1>
            <input name="user_phone" type="text" placeholder="Телефон">
            <input name="user_password" type="password" placeholder="Пароль*">
            <input type="submit" value="Войти">
            <p>Нет аккаунта? <a href="{{ route('register.index') }}">Зарегистрироваться</a></p>
        </form>
    </div>
@endsection