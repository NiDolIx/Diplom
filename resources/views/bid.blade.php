@extends('header.header')

@section('search')
    <div id="bid">
        <div class="bid-container">
            <h2>Активные заяки</h2>
            @foreach($bidsActive as $bid)
                <div class="bid-active">
                    <hr>
                    <p>ID заявки: {{ $bid->bid_id }}</p>
                    <p>Дата оформления: {{ $bid->bid_date_add }}</p> 
                    @if($bid->bid_status == 1)
                        <p>Статус: Обрабатывается</p>
                    @elseif($bid->bid_status == 2)
                        <p>Статус: Ожидание автомобиля</p>
                    @elseif($bid->bid_status == 3)
                        <p>Статус: В работе</p>
                    @endif
                    <p>Описание неисправности: {{ $bid->bid_comment }}</p>
                    <hr>
                </div>
            @endforeach
        </div>
        <div class="bid-container">
            <h2>История заявок</h2>
            @foreach($bidsEnd as $bid)
                <div class="bid-active">
                    <hr>
                    <p>ID заявки: {{ $bid->bid_id }}</p>
                    <p>Дата оформления: {{ $bid->bid_date_add }}</p> 
                    <p>Статус: Завершено</p>
                    <p>Описание неисправности: {{ $bid->bid_comment }}</p>
                    <a href="{{ route('pdf.preview') }}"><input type="submit" value="Подробный отчет"></a>
                    <hr>
                </div>
            @endforeach
        </div>

        @vite(['resources/css/bid.css'])
    </div>
@endsection