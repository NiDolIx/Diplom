@extends('layout.layout')

@section('admin')
    <header>
        <h1>Панель Администратора</h1> 
        <form action="{{ route('auth.delete') }}" method="POST">
                @csrf
                <a href="{{ route('auth.delete') }}" onclick="event.preventDefault(); this.closest('form').submit();">Выход</a>
        </form>
    </header>
    <div id="admin">
        <div id="menu">
            <a href="{{ route('admin.userView') }}">Пользователи</a>
            <a href="{{ route('admin.serviseView') }}">Автосервисы</a>
        </div>

        <input id="add-dispatcher-btn" type="submit" value="Добавить диспетчера">

        <form id="add-dispatcher" class="hidden" action="{{ route('admin.userAdd') }}" method="POST" novalidate>
            @csrf
            <h1>Добавление диспетчера</h1>
            <input name="user_name" type="text" placeholder="Имя">
            <input name="user_surname" type="text" placeholder="Фамилия">
            <input name="user_patronymic" type="text" placeholder="Отчество">
            <input name="user_phone" type="text" placeholder="Номер диспетчера">
            <input name="user_password" type="text" placeholder="Пароль">
            <input name="carservise_id" type="text" placeholder="ID автосервиса">
            <input type="submit" value="Создать">
        </form>
        <div id="user-list">
            <table>
                <caption>Список пользователей</caption>
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Отчество</th>
                    <th>Телефон</th>
                    <th>ID автосервиса</th>
                    <th>Роль</th>
                    <th>Удаление</th>
                </tr>
                @foreach($data as $element)
                    <tr>
                        <td>{{ $element->user_id }}</td>
                        <td>{{ $element->user_name }}</td>
                        <td>{{ $element->user_surname }}</td>
                        <td>{{ $element->user_patronymic }}</td>
                        <td>{{ $element->user_phone }}</td>
                        <td>{{ $element->carservise_id }}</td>
                        @if($element->user_role == 1)
                            <td>Клиент</td>
                        @else
                            <td>Диспетчер</td>
                        @endif
                        <td>
                            <a href="{{ route('admin.userDelete', $element->user_id) }}" id="delete-user">&#215;</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    @vite(['resources/css/admin.css', 'resources/js/addUser.js'])
@endsection