<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @hasSection('title')
        <title>@yield('title') / {{ \Illuminate\Support\Facades\Session::get('verified_organization_name', config('app.name')) }}</title>
    @else
        <title>{{ \Illuminate\Support\Facades\Session::get('verified_organization_name', config('app.name')) }}</title>
    @endif

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-brown-50 text-gray-900 font-opensans mb-4">

<div class="w-full mb-1 lg:my-3 bg-transparent text-white py-4 px-4">
    <div class="lg:max-w-5xl lg:mx-auto">
        <div class="flex flex-row gap-x-4 text-sm">
            <div class="font-bold text-secondary text-lg">
                {{ \Illuminate\Support\Facades\Session::get('verified_organization_name') }}
            </div>

            <a href="{{ route('home', [\Illuminate\Support\Facades\Request::route('park')]) }}"
               class="opacity-70 text-secondary hover:opacity-100 flex flex-row items-center">
                <i data-feather="home" class="w-5 mr-2 -my-2"></i>
                Home
            </a>

            @auth()
                <a href="{{ route('account', [\Illuminate\Support\Facades\Request::route('park')]) }}"
                   class="ml-auto opacity-70 text-secondary hover:opacity-100 flex flex-row items-center">
                    <i data-feather="users" class="hidden md:block w-5 mr-2 -my-2"></i>
                    Account
                </a>
            @else
                <a href="{{ route('login', [\Illuminate\Support\Facades\Request::route('park')]) }}"
                   class="ml-auto opacity-70 text-secondary hover:opacity-100 flex flex-row items-center">
                    <i data-feather="user" class="hidden md:block w-5 mr-2 -my-2"></i>
                    Inloggen
                </a>
            @endauth
        </div>
    </div>
</div>

<div class="mx-4 lg:max-w-5xl lg:mx-auto">
    @yield('content')
</div>
</body>

<script src="{{ mix('js/app.js') }}"></script>
</html>
