@extends('layouts.default')
@section('title', 'Reservering Plaatsen')

@section('content')
    <a href="{{ route('home') }}" class="block text-gray-400 text-sm mb-4">< Terug naar de homepagina</a>

    <form method="post" class="grid gap-4">
        @csrf

        <div class="p-4 rounded-sm shadow-sm bg-white">
            <h1 class="font-bold text-secondary text-lg">{{ $reservationType->title }}</h1>
            <p class="text-gray-600 text-sm">{{ $reservationType->description }}</p>
        </div>

        <div class="p-4 rounded-sm shadow-sm bg-white">
            <h2 class="font-bold text-secondary">Nieuwe reservering maken</h2>
            <p class="text-gray-600 text-sm mb-4">Voer hieronder alle gegevens in om dit uitje vast te leggen.</p>

            @foreach ($reservationType->reservationTypeLines as $reservationTypeLine)
                <x-form-input :type="$reservationTypeLine->type" :id="$reservationTypeLine->id"
                              :label="$reservationTypeLine->label" :value="old($reservationTypeLine->id)"
                              :description="$reservationTypeLine->description"
                              :placeholder="$reservationTypeLine->placeholder"></x-form-input>
            @endforeach

            @if ($reservationType->has_participants)
                <x-form-input type="number" id="participants"
                              label="Deelnemers" placeholder="Voer het aantal deelnemers in"
                              :value="old('participants')"></x-form-input>
            @endif

            @if ($reservationType->has_accompanists)
                <x-form-input type="number" id="accompanists"
                              label="Begeleiders" placeholder="Voer het aantal begeleiders in"
                              :value="old('accompanists')"></x-form-input>
            @endif

            @if ($reservationType->date_type === 'date')
                <x-form-input type="date" id="date"
                              label="Datum" placeholder="Voer het datum van jullie bezoek in"
                              :value="old('date')"></x-form-input>
            @endif
        </div>

        @auth
            <div class="p-4 bg-white rounded shadow-sm">
                <h2 class="font-bold text-secondary text-lg">Accountgegevens</h2>
                <h3 class="text-gray-600 text-sm">Je bent momenteel ingelogd. De reservering zal aan onderstaand account
                    worden gekoppeld.</h3>

                <ul class="ml-8 list-disc mt-4">
                    <li>Naam: {{ \Illuminate\Support\Facades\Auth::user()->name }}</li>
                    <li>Email: {{ \Illuminate\Support\Facades\Auth::user()->email }}</li>
                </ul>
            </div>
        @else
            <div class="p-4 bg-white rounded shadow-sm">
                <h2 class="font-bold text-secondary text-lg">Accountgegevens</h2>
                <h3 class="text-gray-600 text-sm">Je bent momenteel niet ingelogd. Je hebt een account nodig om een
                    reservering te plaatsen.</h3>

                <p class="mt-4">Voer hieronder je email-adres in en een eventueel wachtwoord om een nieuw account aan te
                    maken. Met dit account kan je al je reserveringen bijhouden en eventuele extra's bijboeken.</p>

                <x-form-input type="text" id="name" label="Naam"
                              placeholder="Voer je voor- en achternaam in" :value="old('name')"></x-form-input>

                <x-form-input type="email" id="email" label="Email Adres"
                              placeholder="Voer het email adres in waarmee je wilt inloggen"
                              :value="old('email')"></x-form-input>

                <x-form-input type="password" id="password" label="Wachtwoord"
                              placeholder="Voer een uniek wachtwoord in waarmee je wilt inloggen"></x-form-input>
            </div>
        @endauth

        <div class="p-4 bg-white rounded shadow-sm">
            <p class="text-sm text-gray-600">Door een reservering te maken ga je akkoord met de <a
                    class="text-secondary underline" href="{{ route('home') }}">algemene voorwaarden</a>
                van {{ config('app.name') }}.</p>

            <button type="submit"
                    class="mt-1 block bg-secondary-700 hover:bg-secondary-800 transition duration-100 text-gray-50 py-1 px-2 rounded shadow-sm">
                Reservering maken
            </button>
        </div>
    </form>
@endsection
