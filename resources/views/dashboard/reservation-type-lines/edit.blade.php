@extends('layouts.dashboard')
@section('title', 'Regel van Reserveringstype aanpassen')
@section('subtitle', $reservationTypeLine->title)
@section('backDestination', route('dashboard.reservation-type-lines.show', $reservationTypeLine->id))

@section('content')
    <div class="bg-white shadow-sm lg:col-span-2 rounded p-4">
        <h3 class="text-indigo-800 font-bold mb-2">Algemene Informatie</h3>

        <form method="post" action="{{ route('dashboard.reservation-type-lines.update', $reservationTypeLine->id) }}">
            @method('PUT')
            @csrf

            <x-dashboard.form-input type="text" id="label" label="Label" :value="old('label', $reservationTypeLine->label)" />
            <x-dashboard.form-input type="text" id="description" label="Omschrijving" :value="old('description', $reservationTypeLine->description)" />
            <x-dashboard.form-input type="text" id="placeholder" label="Placeholder" :value="old('placeholder', $reservationTypeLine->placeholder)" />
            <x-dashboard.form-input type="boolean" description="Selecteer om dit veld verplicht te stellen" id="is_required" label="Verplicht?" :value="old('is_required', $reservationTypeLine->is_required)" />

            <x-dashboard.form-submit />
        </form>
    </div>
@endsection
