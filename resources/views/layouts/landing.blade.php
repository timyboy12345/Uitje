<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @hasSection('title')
        <title>@yield('title') / {{ config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-900 font-opensans mb-4">
<div class="w-full text-right text-gray-800 flex flex-row py-2 px-4 justify-end">
    @auth
        <a href="{{ route('dashboard.home') }}"
           class="opacity-70 hover:opacity-100 transition duration-100">Dashboard</a>
    @else
        <a href="{{ route('loginBasic') }}"
           class="opacity-70 hover:opacity-100 transition duration-100">Inloggen</a>
    @endauth
</div>

<div class="mx-4 lg:max-w-5xl lg:mx-auto mt-8">
    @yield('content')
</div>
</body>

<script src="{{ mix('js/app.js') }}"></script>
</html>
