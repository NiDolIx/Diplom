@extends('layout.layout')

@section('autentification')
    @vite([
        'resources/css/autentification.css',
    ])
    
    <div id="autentification-container">
        <div id="autentification-container-logo">
            <p>А</p>
        </div>
        <div id="autentification-container-btn">
            <a href="{{ route('auth.index') }}">
                <input class="btn" type="submit" value="Авторизация">
            </a>
            <a href="{{ route('register.index') }}">
                <input class="btn" type="submit" value="Регистрация">
            </a>
        </div>
    </div>
@endsection