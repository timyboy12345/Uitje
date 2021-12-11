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
                <div class="flex flew-row justify-between">
                    <a href="/" class="font-bold text-white text-xl">
                        Uitje
                    </a>

                    <div class="flex flex-row gap-x-2">
                        @foreach(LaravelLocalization::getSupportedLocales() as $locale)
                            <a href="{{ LaravelLocalization::getLocalizedURL($locale['key']) }}" class="w-6 h-6 rounded-full bg-white overflow-hidden">
                                <img alt="Switch to {{ $locale['name'] }}" title="Switch to {{ $locale['name'] }}"
                                     class="w-full h-full object-cover"
                                     src="https://flagcdn.com/{{ $locale['flag'] }}.svg">
                            </a>
                        @endforeach
                    </div>
                </div>

                <div class="mt-8 flex flex-col">
                    @foreach (\App\Http\Controllers\Controller::getDashboardMenuItems() as $menuItem)
                        <div
                            class="{{ isset($menuItem['routeName']) && (request()->segment(3) === $menuItem['routeName'] || (request()->segment(2) === $menuItem['routeName'] && request()->segment(3) === null)) ? 'bg-indigo-800' : '' }} rounded">
                            <a href="{{ $menuItem['route'] }}"
                               class="p-2 flex flex-row items-center opacity-70">
                                @isset($menuItem['icon'])
                                    <i class="mr-2 w-5 h-5" data-feather="{{ $menuItem['icon'] }}"></i>
                                @endisset

                                {{ $menuItem['title'] }}
                            </a>

                            @isset($menuItem['subMenus'])
                                <div class="mb-2 ml-9 text-sm flex flex-col">
                                    @foreach ($menuItem['subMenus'] as $subMenuItem)
                                        <a href="{{ $subMenuItem['route'] }}"
                                           class="{{ isset($subMenuItem['routeName']) && request()->segment(4) === $subMenuItem['routeName'] ? 'opacity-100 pl-2 hover:pl-3' : 'opacity-70 hover:pl-1' }} rounded transition-all duration-100 my-1 flex flex-row items-center"
                                        >{{ $subMenuItem['title'] }}</a>
                                    @endforeach
                                </div>
                            @endisset
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </nav>

    <div class="w-full sm:w-2/3 md:w-3/4 xl:w-4/5 sm:ml-auto">
        <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center w-full p-4">
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

            <div class="flex mt-2 lg:mt-0 flex-row items-center gap-x-2">
                @hasSection('enableSearch')
                    <form method="get">
                        <input type="text" value="{{ \Illuminate\Support\Facades\Request::input('search') }}"
                               name="search" id="search"
                               class="flex-grow lg:flex-grow-0 py-1.5 px-3 border-0 rounded shadow placeholder-gray-400 focus:ring-indigo-800 focus:ring-2 transition duration-100"
                               placeholder="{{ __('general.terms.search') }}">
                    </form>
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

                @hasSection('cannotDestroyMessage')
                    <div title="@yield('cannotDestroyMessage')"
                         class="flex items-center content-center bg-gray-600 hover:bg-gray-700 opacity-70 transition duration-100 text-white rounded-full py-1 px-2 text-sm">
                        <i data-feather="trash" class="w-4"></i>
                    </div>
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
                    <a href="@yield('backDestination')" class="text-gray-600 text-sm flex flex-row items-center">
                        <span data-feather="arrow-left" class="h-4"></span>
                        @yield('backLabel', __('general.terms.back'))
                    </a>
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
