@extends('layouts.dashboard')
@section('title', 'Reserveringstype aanpassen')
@section('subtitle', $reservationType->title)
@section('backDestination', route('dashboard.reservation-types.show', $reservationType->id))

@section('content')
    <form method="post" enctype="multipart/form-data" class="lg:col-span-2"
          action="{{ route('dashboard.reservation-types.update', $reservationType->id) }}">

        <div class="bg-white shadow-sm rounded p-4">
            <h3 class="text-indigo-800 font-bold mb-2">Algemene Informatie</h3>

            @method('PUT')
            @csrf

            <x-dashboard.form-input type="text" id="title" label="Titel"
                                    :value="old('title', $reservationType->title)"/>
            <x-dashboard.form-input type="textarea" id="description" label="Omschrijving"
                                    :value="old('description', $reservationType->description)"/>
            <x-dashboard.form-input type="text" id="slug" label="URL" :value="old('slug', $reservationType->slug)"/>
            <x-dashboard.form-input type="boolean" id="has_participants" label="Deelnemers"
                                    description="Selecteer om het mogelijk te maken een aantal deelnemers aan deze reservering toe te voegen."
                                    :value="old('has_participants', $reservationType->has_participants)"/>
            <x-dashboard.form-input type="boolean" id="has_accompanists" label="Begeleiders"
                                    description="Selecteer om het mogelijk te maken een aantal begeleiders aan deze reservering toe te voegen."
                                    :value="old('has_accompanists', $reservationType->has_accompanists)"/>
            <x-dashboard.form-input type="select" id="date_type" label="Datum"
                                    description="Selecteer het datumtype dat voor deze reservering nodig is."
                                    :value="old('date_type', $reservationType->date_type)" :options="$dateTypes"/>
            <x-dashboard.form-input type="number" id="price" label="Prijs"
                                    :value="old('price', $reservationType->price)"/>
            <x-dashboard.form-input type="number" id="price" label="Prijs"
                                    :value="old('price', $reservationType->price)"/>
            <x-dashboard.form-input type="file" id="image" accept="image/*" label="Afbeelding"/>

            <x-dashboard.form-submit/>
        </div>

        <x-dashboard.card title="Deelnemersinformatie"></x-dashboard.card>
    </form>
@endsection

