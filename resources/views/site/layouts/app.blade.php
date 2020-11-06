<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
{{--    <title>{{ config('app.name', 'Laravel') }}</title>--}}

    <link rel="stylesheet" href="{{ mix('/css/site/app.min.css') }}">
</head>
<body>
<div id="app">
    <header>
        <nav class="top-bar">
            <div class="top-bar-left">
                <ul class="menu">
                    <li class="menu-text">
                        <a href="{{ route('site.index') }}">
                            <h1>Сайт квестов</h1>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="top-bar-right">
                <ul class="menu">
                    <li><a href="{{ route('site.quests.index') }}">Квесты</a></li>
{{--                    <li><a href="#">Контакты</a></li>--}}
{{--                    <li><a href="#">О нас</a></li>--}}
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

<script type="application/javascript" src="{{ mix('/js/site/app.js') }}"></script>
</body>
</html>
