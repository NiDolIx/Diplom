@extends('layout.layout')

@section('addServiseServises')
    <a href="{{ route('servise.index', Auth::user()->carservise_id) }}">Вернуться назад</a>
    <form action="">
        <select name="servise_name" id="">
            @foreach($data as element)
                <option value="{{ $element->servise_name }}">{{ $element->servise_name }}</option>
                <input type="submit">
        </select>
    </form>

    @vite(['resources/css/addServiseServises.css'])
@endsection