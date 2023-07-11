@extends('layout.layout')

@section('dispatcher')
    <header>
        <h1>Панель Диспетчера</h1> 
        <form action="{{ route('auth.delete') }}" method="POST">
                @csrf
                <a href="{{ route('auth.delete') }}" onclick="event.preventDefault(); this.closest('form').submit();">Выход</a>
        </form>
    </header>
    
    <div id="dispatcher">
        <div id="menu">
            <a href="{{ route('dispatcher.index') }}">Список заявок</a>
            <a href="{{ route('servise.index', Auth::user()->only('carservise_id')) }}">Автосервис</a>
        </div>

        <div id="bid">
            <div class="bid-container">
                <h2>Активные заяки</h2>
                @foreach($statusOne as $element)
                    <div class="bid-active">
                        <hr>
                        <form action="{{ route('dispatcher.updateStatusOne', $element->bid_id) }}" method="POST">
                            @csrf
                            <p>ID заявки: {{ $element->bid_id }} </p>
                            <p>ФИО клиента: {{ $element->user_name }} {{ $element->user_surname }} {{ $element->user_patronymic }}</p>
                            <p>Номер телефона клиента: {{ $element->user_phone }}</p>
                            <p>Почта клиента: {{ $element->user_mail }}</p>
                            <p>Автомобиль клиента: {{ $element->car_mark }} {{ $element->car_model }}</p>
                            <p>Дата оформления: {{ $element->bid_date_add }}</p> 
                            <p>Описание неисправности: {{ $element->bid_comment }}</p>
                            <input type="submit" value="Продолжить">
                        </form>
                        <a href="{{ route('dispatcher.deleteBid', $element->bid_id) }}"><input type="submit" value="Отменить"></a>
                        <hr>
                    </div>
               @endforeach
            </div>
            <div class="bid-container">
                <h2>Ожидание автомобиля</h2>
                @foreach($statusTwo as $element)
                    <div class="bid-active">
                        <hr>
                        <form action="{{ route('dispatcher.updateStatusTwo', $element->bid_id) }}" method="POST">
                            @csrf
                            <p>ID заявки: {{ $element->bid_id }} </p>
                            <p>ФИО клиента: {{ $element->user_name }} {{ $element->user_surname }} {{ $element->user_patronymic }}</p>
                            <p>Номер телефона клиента: {{ $element->user_phone }}</p>
                            <p>Почта клиента: {{ $element->user_mail }}</p>
                            <p>Автомобиль клиента: {{ $element->car_mark }} {{ $element->car_model }}</p>
                            <p>Дата оформления: {{ $element->bid_date_add }}</p> 
                            <p>Описание неисправности: {{ $element->bid_comment }}</p>
                            <input type="submit" value="Продолжить">
                        </form>
                        <a href="{{ route('dispatcher.deleteBid', $element->bid_id) }}"><input type="submit" value="Отменить"></a>
                        <hr>
                    </div>
               @endforeach
            </div>
            <div class="bid-container">
                <h2>В работе</h2>
                @foreach($statusThree as $element)
                    <div class="bid-active">
                        <hr>
                        <form action="{{ route('dispatcher.updateStatusThree', $element->bid_id) }}" method="POST">
                            @csrf
                            <p>ID заявки: {{ $element->bid_id }} </p>
                            <p>ФИО клиента: {{ $element->user_name }} {{ $element->user_surname }} {{ $element->user_patronymic }}</p>
                            <p>Номер телефона клиента: {{ $element->user_phone }}</p>
                            <p>Почта клиента: {{ $element->user_mail }}</p>
                            <p>Автомобиль клиента: {{ $element->car_mark }} {{ $element->car_model }}</p>
                            <p>Дата оформления: {{ $element->bid_date_add }}</p> 
                            <p>Описание неисправности: {{ $element->bid_comment }}</p>
                            <input type="submit" value="Продолжить">
                        </form>
                        <a href="{{ route('dispatcher.deleteBid', $element->bid_id) }}"><input type="submit" value="Отменить"></a>
                        <hr>
                    </div>
               @endforeach
            </div>
            <div class="bid-container">
                <h2>Завершено</h2>
                @foreach($statusFor as $element)
                    <div class="bid-active">
                        <hr>
                        <p>ID заявки: {{ $element->bid_id }} </p>
                        <p>ФИО клиента: {{ $element->user_name }} {{ $element->user_surname }} {{ $element->user_patronymic }}</p>
                        <p>Номер телефона клиента: {{ $element->user_phone }}</p>
                        <p>Почта клиента: {{ $element->user_mail }}</p>
                        <p>Автомобиль клиента: {{ $element->car_mark }} {{ $element->car_model }}</p>
                        <p>Дата оформления: {{ $element->bid_date_add }}</p> 
                        <p>Дата завершения: {{ $element->bid_date_end }}</p>
                        <p>Описание неисправности: {{ $element->bid_comment }}</p>
                        <hr>
                    </div>
               @endforeach
            </div>
        </div>
    </div>

    @vite(['resources/css/dispatcher.css'])
@endsection