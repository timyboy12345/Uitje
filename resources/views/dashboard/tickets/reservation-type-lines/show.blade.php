@extends('layouts.dashboard')
@section('title', 'Regel van Reserveringstype')
@section('subtitle', $reservationTypeLine->title)
@section('backLabel', "Terug naar {$reservationTypeLine->reservationType->title}")
@section('backDestination', route('dashboard.tickets.reservation-types.show', $reservationTypeLine->reservationType->id))
@section('editDestination', route('dashboard.tickets.reservation-type-lines.edit', $reservationTypeLine->id))

@if($reservationTypeLine->reservationType->orderLines->count() === 0)
    @section('destroyDestination', route('dashboard.tickets.reservation-type-lines.destroy', $reservationTypeLine->id))
@else
    @section('cannotDestroyMessage', 'Er zijn bestellingen geplaatst op dit reserveringstype, daarom kan deze niet verwijderd worden.')
@endif

@section('content')
    <x-dashboard.card
        title="Algemene informatie"
        subtitle="Een deel van deze informatie verschijnt ook op de reserveringspagina"
    >
        <h5 class="text-indigo-800">Beschrijving</h5>
        {!! $reservationTypeLine->description !!}

        <h5 class="text-indigo-800 mt-2">Type</h5>
        {{ $reservationTypeLine->type }}

        <h5 class="text-indigo-800 mt-2">Verplicht</h5>
        {{ $reservationTypeLine->is_required ? 'Ja' : 'Nee' }}
    </x-dashboard.card>
@endsection
