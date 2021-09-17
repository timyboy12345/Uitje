<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Uitje</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-brown-50 text-gray-900 font-opensans mb-4">
@isset($menuItems)
    <div class="w-full mb-5 bg-brown-900 text-white py-4 px-4">
        <div class="lg:max-w-5xl lg:mx-auto">
            <div class="flex flex-row gap-x-4 text-sm">
                @foreach ($menuItems as $item)
                    <a href="{{ $item['route'] }}"
                       class="opacity-70 text-brown-50 hover:opacity-100 flex flex-row items-center {{ $item['class'] ?? '' }}">
                        @isset ($item['icon'])
                            <i data-feather="{{ $item['icon'] }}" class="w-5 mr-2 -my-2"></i>
                        @endisset

                        {{ $item['title'] }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endisset

<div class="mx-4 lg:max-w-5xl lg:mx-auto mt-5">
    @yield('content')
</div>
</body>

<script src="{{ asset('js/app.js') }}"></script>
</html>
