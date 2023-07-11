@extends('layout.layout')

@section('servise')
    @can('access-client', Auth::user())
        <div id="client-menu">
            <a href="{{ route('search.index') }}">Вернуться назад</a>
        </div>
    @endcan

    @can('access-dispatcher', Auth::user())
        <header>
            <h1>Панель Диспетчера</h1> 
            <form action="{{ route('auth.delete') }}" method="POST">
                    @csrf
                    <a href="{{ route('auth.delete') }}" onclick="event.preventDefault(); this.closest('form').submit();">Выход</a>
            </form>
        </header>
    
        <div id="menu">
            <a href="{{ route('dispatcher.index') }}">Список заявок</a>
            <a href="{{ route('servise.index', Auth::user()->only('carservise_id')) }}">Автосервис</a>
        </div>
    @endcan

    <div id="servise">
        @foreach($data as $element)
            <h1>{{ $element->carservise_name }}</h1>

            <div id="photo"></div>

            @can('access-client', Auth::user())
                <input class="btn" id="add-bid" type="submit" value="Оформить запись">

                <div id="add-bid-container" class="hidden">
                    <form action="{{ route('servise.addBid', $element->carservise_id) }}" method="POST" >
                        @csrf
                        <select name="car_sts">    
                            <option selected disable hidden>Выберите свой автомобиль</option>
                                @foreach($cars as $car)
                                    <option value="{{ $car->car_sts }}">{{ $car->car_model }} {{$car->car_mark}}</option>
                                @endforeach
                        </select>
                        <textarea name="bid_comment" placeholder="Опишите возникшую проблему с автмобилем"></textarea>
                        <input type="submit" value="Оформить">
                    </form>
                </div>
            @endcan

            @can('access-dispatcher', Auth::user())
                <a href="{{ route('servise.updateServiseInfo', Auth::user()->only('carservise_id')) }}"><input class="btn" type="submit" value="Редактировать"></a>
            @endcan

            <div id="info-servise">
                <h2>Информация об автосервисе</h2>
                <p>Адрес: {{ $element->carservise_address }}</p>
                <p>Сайт: {{ $element->carservise_site }}</p>
                <p>Телефон: {{ $element->carservise_phone }}</p>
                <h2>График работ</h2>
                @if($element->carservise_schedule != null)
                    <p>{{ $element->carservise_schedule}} </p>
                @else
                    <p id="schedule"> Информации о графике нет!</p>
                @endif
                <h2>Описание автосервиса</h2>
                @if($element->carservise_info != null)
                    <p>{{ $element->carservise_info }}</p>
                @else
                    <p id="info"> Информации о графике нет!</p>
                @endif
                <h2>Обслуживаемые марки</h2>
                @if($element->carservise_car != null)
                    <p>{{ $element->carservise_car }}</p>
                @else
                    <p id="car"> Информации о графике нет!</p>
                @endif
            </div>

            <table>
                <caption>Список услуг</caption>
                <tr>
                    <th>Тип работы</th>
                    <th>Название работы</th>
                </tr>
                @foreach($servises as $el)
                    <tr>
                        <td>{{ $el->servise_type }}</td>
                        <td>{{ $el->servise_name }}</td>
                    </tr>
                @endforeach
            </table>

            @can('access-dispatcher', Auth::user())
                <a href="{{ route('servise.updateServiseServises', Auth::user()->only('carservise_id')) }}"><input class="btn-servise" type="submit" value="Редактировать услуги"></a>
            @endcan

            <h3>Комментарии</h3>

            @can('access-client', Auth::user())
                <form class="add-comment" method="POST" action="{{ route('servise.addComment', $element->carservise_id) }}">
                    @csrf
                    <textarea name="comment_text" placeholder="Оставьте свой отзыв об автосервисе"></textarea>
                    <p>Поставьте оценку автосервису: <input name="comment_rating" type="number" value="5" step="1" min="1" max="10"></p>
                    <input type="submit" value="Оценить">
                </form>
            @endcan

            <hr>

            @foreach($comments as $element)
                <div class="comments">
                    <p>{{ $element->user_name }} {{ $element->user_surname }}</p>
                    <p>Оценка автосервису: {{ $element->comment_rating }}</p>
                    <p>{{ $element->comment_date }}</p>
                    <hr>
                    <p>{{ $element->comment_text }}</p>
                </div>
            @endforeach
        @endforeach
    </div>

    @vite(['resources/css/servise.css', 'resources/js/addBid.js'])
@endsection