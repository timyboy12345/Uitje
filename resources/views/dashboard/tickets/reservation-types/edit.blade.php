@extends('layouts.dashboard')
@section('title', 'Reserveringstype aanpassen')
@section('subtitle', $reservationType->title)
@section('backDestination', route('dashboard.tickets.reservation-types.show', $reservationType->id))

@section('content')
    <form method="post" enctype="multipart/form-data" class="grid gap-4 lg:col-span-2"
          action="{{ route('dashboard.tickets.reservation-types.update', $reservationType->id) }}">

        <x-dashboard.card title="Algemene Informatie">
            @method('PUT')
            @csrf

            <x-dashboard.form-input type="text" id="title" label="Titel"
                                    :value="old('title', $reservationType->title)"/>
            <x-dashboard.form-input type="textarea" id="description" label="Omschrijving"
                                    :value="old('description', $reservationType->description)"/>
            <x-dashboard.form-input type="text" id="slug" label="URL" :value="old('slug', $reservationType->slug)"/>
            <x-dashboard.form-input type="select" id="date_type" label="Datum"
                                    description="Selecteer het datumtype dat voor deze reservering nodig is."
                                    :value="old('date_type', $reservationType->date_type)" :options="$dateTypes"/>
            <x-dashboard.form-input type="file" id="image" accept="image/*" label="Afbeelding"/>
        </x-dashboard.card>

        <x-dashboard.card title="Deelnemersinformatie">
            <x-dashboard.form-input type="boolean" id="has_participants" label="Deelnemers"
                                    description="Selecteer om het mogelijk te maken een aantal deelnemers aan deze reservering toe te voegen."
                                    :value="old('has_participants', $reservationType->has_participants)"/>
            <x-dashboard.form-input type="boolean" id="has_accompanists" label="Begeleiders"
                                    description="Selecteer om het mogelijk te maken een aantal begeleiders aan deze reservering toe te voegen."
                                    :value="old('has_accompanists', $reservationType->has_accompanists)"/>

            <div class="grid grid-cols-2 gap-4">
                <x-dashboard.form-input type="number" id="min_participants" label="Minimaal aantal deelnemers"
                                        description="Het minimaal aantal deelnemers voor deze activiteit (indien van toepassing)"
                                        :value="old('min_participants', $reservationType->min_participants)"/>
                <x-dashboard.form-input type="number" id="max_participants" label="Maximaal aantal deelnemers"
                                        description="Het maximaal aantal deelnemers voor deze activiteit (indien van toepassing)"
                                        :value="old('max_participants', $reservationType->max_participants)"/>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <x-dashboard.form-input type="number" id="min_accompanists" label="Minimaal aantal begeleiders"
                                        description="Het minimaal aantal begeleiders voor deze activiteit (indien van toepassing)"
                                        :value="old('min_accompanists', $reservationType->min_accompanists)"/>
                <x-dashboard.form-input type="number" id="max_accompanists" label="Maximaal aantal begeleiders"
                                        description="Het maximaal aantal begeleiders voor deze activiteit (indien van toepassing)"
                                        :value="old('max_accompanists', $reservationType->max_accompanists)"/>
            </div>
        </x-dashboard.card>

        <x-dashboard.card title="Prijsinformatie">
            <x-dashboard.form-input type="number" id="price" label="Prijs"
                                    :value="old('price', $reservationType->price)"/>
        </x-dashboard.card>

        <div class="flex justify-end">
            <x-dashboard.form-submit/>
        </div>
    </form>
@endsection

