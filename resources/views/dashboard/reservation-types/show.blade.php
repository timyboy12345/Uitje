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
                    @if ($reservationType->min_participants || $reservationType->max_participants)
                        (@if ($reservationType->min_participants)min {{ $reservationType->min_participants }}@endif()@if ($reservationType->min_participants && $reservationType->max_participants)
                            , @endif()@if ($reservationType->max_participants)
                            max {{ $reservationType->max_participants }}@endif())
                    @endif
                </span>
            @endif

            @if ($reservationType->has_accompanists)
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                    Heeft begeleiders
                    @if ($reservationType->min_accompanists || $reservationType->max_accompanists)
                        (@if ($reservationType->min_accompanists)min {{ $reservationType->min_accompanists }}@endif()@if ($reservationType->min_accompanists && $reservationType->max_accompanists)
                            , @endif()@if ($reservationType->max_accompanists)
                            max {{ $reservationType->max_accompanists }}@endif())
                    @endif
                </span>
            @endif
        </div>
    </x-dashboard.card>

    @isset($reservationType->image)
        <div class="rounded shadow-sm overflow-hidden max-h-64">
            <img class="object-cover object-center" alt="Afbeelding van dit reserveringstype"
                 src="{{ \Illuminate\Support\Facades\Storage::url($reservationType->image) }}">
        </div>
    @else
        <x-dashboard.card title="Afbeelding" subtitle="Er is geen afbeelding ingesteld."></x-dashboard.card>
    @endisset

    <div class="lg:col-span-2">
        <x-dashboard.table :items="$reservationType->reservationTypeLines" type="reservationTypeLines"
                           title="Vragen die bij dit reserveringstype horen"></x-dashboard.table>

        <a href="{{ route('dashboard.reservation-type-lines.create', ['reservation_type_id' => $reservationType->id]) }}"
           class="rounded bg-indigo-700 hover:bg-indigo-800 transition duration-100 py-2 px-4 text-white mt-2 text-sm inline-block">
            Nieuwe vraag toevoegen
        </a>
    </div>
@endsection
