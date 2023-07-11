@extends('layout.layout')

@section('registration')
    @vite(['resources/css/registration.css'])
    
    <div id="registration-content">
        <form action="{{ route('register.store') }}" method="POST" novalidate id="registration-form">
            @csrf
            <h1>Регистрация</h1>
            @if($errors->any())
                <ul>
                    @foreach($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            @endif
            <input name="client_name" type="text" placeholder="Имя*">
            <input name="client_surname" type="text" placeholder="Фамилия*">
            <input name="client_patronymic" type="text" placeholder="Отчество">
            <input name="client_phone" type="phone" placeholder="Телефон*">
            <input name="client_mail" type="e-mail" placeholder="e-mail">
            <input name="client_password" type="password" placeholder="Пароль*">
            <input name="client_password_repeat" type="password" placeholder="Повторите пароль*">
            <input type="submit" value="Зарегистрироваться">
            <p>Уже есть аккаунт? <a href="{{ route('auth.index') }}">Авторизоваться</a></p>
        </form>
    </div>
@endsection