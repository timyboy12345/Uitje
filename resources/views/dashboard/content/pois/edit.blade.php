@extends('layouts.dashboard')
@section('title', 'Point of Interest aanpassen')
@section('subtitle', $poi->name)
@section('backDestination', route('dashboard.content.pois.show', $poi->id))

@section('content')
    <form method="post" action="{{ route('dashboard.content.pois.update', $poi->id) }}"
          class="grid gap-4 lg:col-span-2">
        <x-dashboard.card title="Algemene Informatie">
            @method('PUT')
            @csrf

            <x-dashboard.form-input type="text" id="name" label="Naam"
                                    description="De volledige naam van deze Point of Interest."
                                    :value="old('name', $poi->name)"/>
            <x-dashboard.form-input type="text" id="shortname" label="Verkorte naam"
                                    description="Een kortere naam, als de volledige naam niet getoond kan worden."
                                    :value="old('shortname', $poi->shortname)"/>
            <x-dashboard.form-input type="text" id="description" label="Omschrijving"
                                    description="Een korte omschrijving om snel een beeld te schetsen wat hier te vinden is."
                                    :value="old('description', $poi->description)"/>
            <x-dashboard.form-input type="textarea" id="content" label="Content"
                                    description="De volledige omschrijving van deze POI, de meest uitgebreide uitleg kan in dit tekstvak."
                                    :value="old('content', $poi->content)"/>

            <x-dashboard.form-input type="boolean" id="is_enabled" label="Geactiveerd" description="Of deze poi zichtbaar is of niet" :value="old('is_enabled', $poi->is_enabled)" />
        </x-dashboard.card>

        <x-dashboard.card title="Locatie">
            <div class="grid sm:grid-cols-2 gap-4">
                <x-dashboard.form-input type="number" id="lat" label="Latitude" :value="old('lat', $poi->lat)"/>
                <x-dashboard.form-input type="number" id="lng" label="Longtitude" :value="old('lng', $poi->lng)"/>
                <x-dashboard.form-input type="number" id="entrance_lat" label="Latitude van ingang" :value="old('entrance_lat', $poi->entrance_lat)"/>
                <x-dashboard.form-input type="number" id="entrance_lng" label="Longtitude van ingang" :value="old('lentrance_ng', $poi->entrance_lng)"/>
            </div>
        </x-dashboard.card>

        <div class="flex justify-end">
            <x-dashboard.form-submit/>
        </div>
    </form>
@endsection
