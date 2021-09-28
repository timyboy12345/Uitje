<!doctype html>
<html lang="en" style="height: 100%">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @hasSection('title')
        <title>@yield('title') / {{ config('app.name') }} Dashboard</title>
    @else
        <title>{{ config('app.name') }} Dashboard</title>
    @endif

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<body class="bg-brown-50 text-gray-900 font-opensans">
<div class="flex flex-col sm:flex-row">
    <nav class="w-full sm:fixed sm:h-screen sm:w-1/3 md:w-1/4 xl:w-1/5 bg-indigo-700 text-white p-4 shadow">
        <div class="lg:max-w-5xl lg:mx-auto">
            <div class="flex flex-col">
                <a href="{{ route('home') }}" class="font-bold text-white text-xl">
                    Uitje
                </a>

                <div class="mt-8 flex flex-col">
                    @foreach (\App\Http\Controllers\Controller::getDashboardMenuItems() as $menuItem)
                        <a href="{{ $menuItem['route'] }}"
                           class="{{ isset($menuItem['routeName']) && $menuItem['routeName'] === \Illuminate\Support\Facades\Route::getCurrentRoute()->getName() ? 'bg-indigo-800' : '' }} rounded p-2 flex flex-row items-center opacity-70">
                            @isset($menuItem['icon'])
                                <i class="mr-2 w-5 h-5" data-feather="{{ $menuItem['icon'] }}"></i>
                            @endisset

                            {{ $menuItem['title'] }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </nav>

    <div class="w-full sm:w-2/3 md:w-3/4 xl:w-4/5 sm:ml-auto">
        <div class="flex flex-row justify-between items-center w-full p-4">
            <div class="flex flex-col">
                <h2 class="text-indigo-800 text-lg font-bold">
                    @yield('title', 'Dashboard')
                </h2>
                @hasSection('subtitle')
                    <h3 class="-mt-1 text-sm text-gray-600">
                        @yield('subtitle', 'Dit is een dashboard')
                    </h3>
                @endif
            </div>

            <div class="flex flex-row items-center gap-x-2">
                @hasSection('enableSearch')
                    <input type="text"
                           class="py-1.5 px-3 border-0 rounded shadow placeholder-gray-400 focus:ring-indigo-800 focus:ring-2 transition duration-100"
                           placeholder="Zoeken">
                @endif

                @hasSection('createDestination')
                    <a title="Toevoegen"
                       class="flex items-center content-center bg-indigo-700 hover:bg-indigo-800 transition duration-100 text-white rounded-full py-1 px-2 text-sm"
                       href="@yield('createDestination')">
                        <i data-feather="plus" class="w-4"></i>
                    </a>
                @endif

                @hasSection('destroyDestination')
                    <form method="post" action="@yield('destroyDestination')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" title="Verwijderen"
                                class="flex items-center content-center bg-red-600 hover:bg-red-700 transition duration-100 text-white rounded-full py-1 px-2 text-sm">
                            <i data-feather="trash" class="w-4"></i>
                        </button>
                    </form>
                @endif

                @hasSection('editDestination')
                    <a title="Aanpassen"
                       class="flex items-center content-center bg-indigo-700 hover:bg-indigo-800 transition duration-100 text-white rounded-full py-1 px-2 text-sm"
                       href="@yield('editDestination')">
                        <i data-feather="edit" class="w-4"></i>
                    </a>
                @endif
            </div>
        </div>

        <div class="mx-4 mb-4">
            @hasSection('backDestination')
                <div class="mb-2">
                    <a href="@yield('backDestination')" class="text-gray-600 text-sm">< @yield('backLabel', 'Terug')</a>
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                @yield('content')
            </div>
        </div>
    </div>
</div>
</body>

<script src="{{ mix('js/app.js') }}"></script>
</html>
