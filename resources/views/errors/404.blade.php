<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}" type="text/css">
</head>
<body class="bg-gray-100">
<div class="mx-8 lg:max-w-6xl lg:mx-auto">
    <div class="text-center my-16">
        <h1 class="text-4xl text-indigo-700 font-bold">{{ \Illuminate\Support\Facades\Session::get('verified_organization_name', config('app.name')) }}</h1>
        <h2 class="text-md text-gray-600">Pagina niet gevonden</h2>

        @if (empty(\Illuminate\Support\Facades\Request::route('park')))
            <a href="/" class="mt-8 block text-indigo-700 underline hover:text-indigo-800">
                Ga terug naar de homepagina
            </a>
        @else
            <a href="{{ route('home', \Illuminate\Support\Facades\Request::route('park')) }}" class="mt-8 block text-indigo-700 underline hover:text-indigo-800">
                Ga terug naar de startpagina
            </a>
        @endif
    </div>
</div>
</body>
</html>
