@extends('layouts.dashboard')
@section('title', 'Reserveringstype')
@section('subtitle', $reservationType->title)
@section('createDestination', route('dashboard.reservation-type-lines.create', ['reservation_type_id' => $reservationType->id]))
@section('editDestination', route('dashboard.reservation-types.edit', $reservationType->id))
@section('destroyDestination', route('dashboard.reservation-types.destroy', $reservationType->id))

@section('content')
    <x-dashboard.card
        title="Algemene informatie"
        subtitle="Een deel van deze informatie verschijnt ook op de reserveringspagina"
    >
        <h5 class="text-indigo-800">Beschrijving</h5>
        {!! $reservationType->description !!}

        @isset ($reservationType->price)
            <h5 class="text-indigo-800 mt-4">Prijs</h5>
            <p>{{ $reservationType->price }}</p>
        @endisset

        <div class="flex flex-row mt-4 gap-2">
            @if ($reservationType->has_participants)
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                    Heeft deelnemers
                </span>
            @endif

            @if ($reservationType->has_accompanists)
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                    Heeft begeleiders
                </span>
            @endif
        </div>
    </x-dashboard.card>

    <x-dashboard.card title="Media" subtitle="Dit is alle media die aan dit reserveringstype is gekoppeld.">
        <div class="grid @if($reservationType->hasMedia()) grid-cols-2 @endif gap-4">
            @if (!$reservationType->hasMedia())
                <div class="text-gray-600">Er is nog geen media toegevoegd.</div>
            @endif

            @foreach ($reservationType->getMedia() as $media)
                @json($media)
            @endforeach
        </div>

        <form enctype="multipart/form-data" method="post"
              action="{{ route('dashboard.reservation-types.upload', [$reservationType->id]) }}">
            @csrf
            <x-dashboard.form-input id="file" label="Bestand" type="file"></x-dashboard.form-input>

            <button type="submit"
                    class="py-2 px-4 bg-indigo-700 hover:bg-indigo-800 transition duration-100 text-white rounded">
                Upload afbeelding
            </button>
        </form>
    </x-dashboard.card>

    <div class="lg:col-span-2">
        <x-dashboard.table :items="$reservationType->reservationTypeLines" type="reservationTypeLines"
                           title="Vragen die bij dit reserveringstype horen"></x-dashboard.table>

        <a href="{{ route('dashboard.reservation-type-lines.create', ['reservation_type_id' => $reservationType->id]) }}"
           class="rounded bg-indigo-700 hover:bg-indigo-800 transition duration-100 py-2 px-4 text-white mt-2 text-sm inline-block">
            Nieuwe vraag toevoegen
        </a>
    </div>
@endsection
