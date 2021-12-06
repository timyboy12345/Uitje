@extends('layouts.dashboard')
@section('title', 'Reserveringstype toevoegen')
@section('backDestination', route('dashboard.tickets.reservation-types.index'))

@section('content')
    <div class="bg-white shadow-sm lg:col-span-2 rounded p-4">
        <h3 class="text-indigo-800 font-bold mb-2">Algemene Informatie</h3>

        <form method="post" action="{{ route('dashboard.tickets.reservation-types.store') }}">
            @csrf

            <x-dashboard.form-input type="text" id="title" label="Titel" :value="old('title')" />
            <x-dashboard.form-input type="textarea" id="description" label="Omschrijving" :value="old('description')" />
            <x-dashboard.form-input type="text" id="slug" label="URL" :value="old('slug')" />
            <x-dashboard.form-input type="boolean" id="has_participants" label="Deelnemers" description="Selecteer om het mogelijk te maken een aantal deelnemers aan deze reservering toe te voegen." :value="old('has_participants')" />
            <x-dashboard.form-input type="boolean" id="has_accompanists" label="Begeleiders" description="Selecteer om het mogelijk te maken een aantal begeleiders aan deze reservering toe te voegen." :value="old('has_accompanists')" />
            <x-dashboard.form-input type="number" id="price"  label="Prijs" :value="old('price')" />

            <x-dashboard.form-submit />
        </form>
    </div>
@endsection
