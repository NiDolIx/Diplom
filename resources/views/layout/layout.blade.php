<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://api-maps.yandex.ru/2.1/?apikey=10519822-a580-4a30-8bb6-a3e7dc48b230&lang=ru_RU" type="text/javascript"></script>
    @vite(['resources/css/normalize.css'])
</head>
<body>
    <div class="main">
        @yield('autentification')
        @yield('registration')
        @yield('servise')
        @yield('updateServiseInfo')
        @yield('updateServiseServises')
        @yield('addServiseServises')
        @yield('lkUpdate')
        @yield('preview')
        @yield('dispatcher')
        @yield('admin')
        @yield('addServise')
        @yield('header')
    </div>
</body>
</html>