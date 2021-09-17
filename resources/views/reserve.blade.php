@extends('layouts.default')

@section('content')
    <a href="{{ route('home') }}" class="block text-gray-400 text-sm mb-4">< Terug</a>

    <div class="grid gap-4">
        <div class="p-4 rounded-sm shadow-sm bg-white">
            <h1 class="font-bold text-secondary text-lg">{{ $reservationType->title }}</h1>
            <p class="text-gray-600 text-sm">{{ $reservationType->description }}</p>
        </div>

        <div class="p-4 rounded-sm shadow-sm bg-white">
            <h2 class="font-bold text-secondary">Nieuwe aanvraag indienen</h2>
            <p class="text-gray-600 text-sm mb-4">Voer hieronder alle gegevens in om dit uitje vast te leggen.</p>

            <form method="post">
                @csrf

                @foreach ($reservationType->reservationTypeLines as $reservationTypeLine)
                    <div class="flex flex-col @if(!$loop->last) mb-8 @endif">
                        @switch($reservationTypeLine->type)
                            @case('string')
                                <label for="{{ $reservationTypeLine->id }}"
                                       class="mb-1">{{ $reservationTypeLine->label }}</label>
                                <input type="text"
                                       id="{{ $reservationTypeLine->id }}"
                                       class="transition duration-100 focus:ring-secondary focus:border-secondary rounded border-gray-200 py-1 px-2">
                                <p class="text-xs text-gray-400 mt-1">{{ $reservationTypeLine->description }}</p>
                                @break
                            @case('text')
                                <label for="{{ $reservationTypeLine->id }}"
                                       class="mb-1">{{ $reservationTypeLine->label }}</label>
                                <textarea id="{{ $reservationTypeLine->id }}"
                                          class="transition duration-100 focus:ring-secondary focus:border-secondary rounded border-gray-200 py-1 px-2"></textarea>
                                <p class="text-xs text-gray-400 mt-1">{{ $reservationTypeLine->description }}</p>
                                @break
                            @case('number')
                                <label for="{{ $reservationTypeLine->id }}"
                                       class="mb-1">{{ $reservationTypeLine->label }}</label>
                                <input type="number"
                                       id="{{ $reservationTypeLine->id }}"
                                       class="transition duration-100 focus:ring-secondary focus:border-secondary rounded border-gray-200 py-1 px-2">
                                <p class="text-xs text-gray-400 mt-1">{{ $reservationTypeLine->description }}</p>
                                @break
                            @case('address')
                                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-2">
                                    <div class="flex flex-col lg:col-span-2">
                                        <label for="{{ $reservationTypeLine->id }}postalcode"
                                               class="mb-1">Postcode</label>
                                        <input type="text"
                                               id="{{ $reservationTypeLine->id }}postalcode"
                                               class="transition duration-100 focus:ring-secondary focus:border-secondary rounded border-gray-200 py-1 px-2">
                                        <p class="text-xs text-gray-400 mt-1">{{ $reservationTypeLine->description }}</p>

                                        @if ($errors->has("{$reservationTypeLine->id}postalcode"))
                                            @foreach ($errors->get("{$reservationTypeLine->id}postalcode") as $message)
                                                <div class="text-red-600">{{ $message }}</div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="{{ $reservationTypeLine->id }}number"
                                               class="mb-1">Huisnummer</label>
                                        <input type="text"
                                               id="{{ $reservationTypeLine->id }}number"
                                               class="transition duration-100 focus:ring-secondary focus:border-secondary rounded border-gray-200 py-1 px-2">
                                        <p class="text-xs text-gray-400 mt-1">{{ $reservationTypeLine->description }}</p>

                                        @if ($errors->has("{$reservationTypeLine->id}number"))
                                            @foreach ($errors->get("{$reservationTypeLine->id}number") as $message)
                                                <div class="text-red-600">{{ $message }}</div>
                                            @endforeach
                                        @endif
                                    </div>

                                    <div class="flex flex-col">
                                        <label for="{{ $reservationTypeLine->id }}streetname"
                                               class="mb-1">Straatnaam</label>
                                        <input type="text"
                                               id="{{ $reservationTypeLine->id }}streetname"
                                               class="transition duration-100 focus:ring-secondary focus:border-secondary rounded border-gray-200 py-1 px-2">
                                        <p class="text-xs text-gray-400 mt-1">{{ $reservationTypeLine->description }}</p>

                                        @if ($errors->has("{$reservationTypeLine->id}streetname"))
                                            @foreach ($errors->get("{$reservationTypeLine->id}streetname") as $message)
                                                <div class="text-red-600">{{ $message }}</div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="flex flex-col lg:col-span-2">
                                        <label for="{{ $reservationTypeLine->id }}city"
                                               class="mb-1">Stad</label>
                                        <input type="text"
                                               id="{{ $reservationTypeLine->id }}city"
                                               class="transition duration-100 focus:ring-secondary focus:border-secondary rounded border-gray-200 py-1 px-2">
                                        <p class="text-xs text-gray-400 mt-1">{{ $reservationTypeLine->description }}</p>

                                        @if ($errors->has("{$reservationTypeLine->id}city"))
                                            @foreach ($errors->get("{$reservationTypeLine->id}city") as $message)
                                                <div class="text-red-600">{{ $message }}</div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                @break
                            @default
                                <p>{{ $reservationTypeLine->type }} is not supported</p>
                                @break
                        @endswitch

                        @if ($errors->has($reservationTypeLine->id))
                            @foreach ($errors->get($reservationTypeLine->id) as $message)
                                <div class="text-red-600">{{ $message }}</div>
                            @endforeach
                        @endif
                    </div>
                @endforeach

                <button type="submit"
                        class="text-sm mt-4 bg-secondary-700 hover:bg-secondary-800 transition duration-100 text-gray-50 py-1 px-2 rounded shadow-sm">
                    Aanvraag indienen
                </button>
            </form>
        </div>
    </div>
@endsection
