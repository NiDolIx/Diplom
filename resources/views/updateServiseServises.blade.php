@extends('layout.layout')

@section('updateServiseServises')
    <a id="link" href="{{ route('servise.index', Auth::user()->only('carservise_id')) }}">Вернуться назад</a>
    
    <div class="add-servises">
        <h1>Добавление услуг</h1>
        <form action="{{ route('servise.addServiseServises', Auth::user()->carservise_id) }}" method="POST">
            @csrf
            <select name="servise_name">
                @foreach($servises as $element)
                    <option value="{{ $element->servise_name }}">{{ $element->servise_name }}</option>
                @endforeach
            </select>
            <input type="submit" value="Добавить">
        </form>

        <table>
            <caption>Редактирование услуг</caption>
            <tr>
                <th>Тип работы</th>
                <th>Вид работы</th>
                <th>Цена</th>
                <th>Применить</th>
                <th>Удалить</th>
            </tr>
            @foreach($servises_add as $element)
                <tr>
                    <td>{{ $element->servise_type }}</td>
                    <td>{{ $element->servise_name }}</td>
                    <td><input type="text"></td>
                    <td>Применить</td>
                    <td>
                        <a href="{{ route('servise.deleteServiseServises', $element->servise_id) }}">Удалить</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    @vite(['resources/css/updateServiseServises.css'])
@endsection