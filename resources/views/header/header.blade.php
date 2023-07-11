@extends('layout.layout')

@section('header')
    <header>
        <div id="header-container">
            <form action="{{ route('auth.delete') }}" method="POST">
                @csrf
                <a href="{{ route('auth.delete') }}" onclick="event.preventDefault(); this.closest('form').submit();">Выход</a>
            </form>
            <ul>
                <a href="{{ route('client.index') }}"><li>Личный кабинет</li></a>
                <a href="{{ route('search.index') }}"><li>Поиск автосервиса</li></a>
                <a href="{{ route('bid.index') }}"><li>История заявок</li></a>
            </ul>
        </div>
    </header>
    @yield('lk')
    @yield('search')

    @vite(['resources/css/header.css'])
@endsection