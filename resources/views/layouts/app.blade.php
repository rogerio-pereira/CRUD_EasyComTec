<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Easy Communication & Technology - CRUD</title>

    {{--Styles--}}
    {!! Html::style('/css/app.css') !!}
    {!! Html::style('/css/style.min.css') !!}
    @yield('css')
</head>
<body>
    <div id="app">
        @include('layouts._header')

        <div class='container'>
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Scripts -->
    {!! Html::script('/js/app.js') !!}
    {!! Html::script('/js/template.min.js') !!}
    @yield('scripts')
</body>
</html>
