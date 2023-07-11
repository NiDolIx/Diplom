@extends('layout.layout')

@section('addServise')
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

        <input id="add-servise-btn" type="submit" value="Добавить автосервис">

        <form id="add-servise" class="hidden" action="{{ route('admin.serviseAdd') }}" method="POST" novalidate>
            @csrf
            <h1>Добавление автосервиса</h1>
            <input name="carservise_address" type="text" placeholder="Адрес автосервиса">
            <input name="carservise_name" type="text" placeholder="Название автосервиса">
            <input type="submit" value="Создать">
        </form>
        <div id="servise-list">
            <table>
                <caption>Список автосервисов</caption>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Адрес</th>
                    <th>Удаление</th>
                </tr>
                @foreach($data as $element)
                    <tr>
                        <td>{{ $element->carservise_id }}</td>
                        <td>{{ $element->carservise_name }}</td>
                        <td>{{ $element->carservise_address }}</td>
                        <td>
                            <a href="{{ route('admin.serviseDelete', $element->carservise_id) }}" id="delete-servise">&#215;</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    @vite(['resources/css/addServise.css', 'resources/js/addServise.js'])
@endsection