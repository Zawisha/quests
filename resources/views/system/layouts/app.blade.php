<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
{{--    <title>{{ config('app.name', 'Laravel') }}</title>--}}

    {{--    <link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
    {{--    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">--}}

    <link rel="stylesheet" href="{{ mix('/css/system/app.min.css') }}">
</head>
<body>
<div id="app">

    <header>
        <nav class="top-bar">
            <div class="top-bar-left">
                <ul class="menu">
                    <li class="menu-text">Админка сайта квестов</li>
                </ul>
            </div>
            <div class="top-bar-right">
                <ul class="menu">
                    <li><a href="{{ route('system.bookings.index') }}">Брони</a></li>
                    <li><a href="{{ route('system.quests.index') }}">Квесты</a></li>
{{--                    <li>--}}
{{--                        <a href="#"--}}
{{--                           onclick="event.preventDefault();--}}
{{--                                    document.getElementById('form-logout').submit();">Выход</a>--}}
{{--                        {!! Form::open(['route' => 'logout', 'style' => 'display: none;', 'id' => 'form-logout']) !!}--}}
{{--                        {!! Form::close() !!}--}}
{{--                    </li>--}}

                </ul>
            </div>
        </nav>
    </header>

    <section>
        <div class="grid-x">
            <div class="small-12 cell">
                @if (session('success'))
                    <div class="callout success" data-closable>
                        {{ session()->get('success') }}
                        <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="callout alert" data-closable>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </section>

    @yield('content')
</div>

<script type="application/javascript" src="{{ mix('/js/system/app.js') }}"></script>
</body>
</html>
