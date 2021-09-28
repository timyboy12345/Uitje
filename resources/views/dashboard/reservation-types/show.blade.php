@extends('layouts.dashboard')
@section('title', 'Reserveringstype')
@section('subtitle', $reservationType->title)
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

    <div class="lg:col-span-2">
        <x-dashboard.table :items="$reservationType->orderLines" type="orderLines"
                           title="Orders met dit reserveringstype"></x-dashboard.table>
    </div>
@endsection
