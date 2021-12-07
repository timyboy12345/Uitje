@extends('layouts.dashboard')
@section('title', 'Kaart aanpassen')
@section('subtitle', "{$map->name} aanpassen")
@section('backDestination', route('dashboard.content.maps.show', $map->id))
@section('backLabel', "Terug naar {$map->name}")

@section('content')
    <div class="bg-white shadow-sm lg:col-span-2 rounded p-4">
        <h3 class="text-indigo-800 font-bold mb-2">Algemene Informatie</h3>

        <form enctype="multipart/form-data" method="post" action="{{ route('dashboard.content.maps.update', $map->id) }}">
            @csrf
            @method('PUT')

            <x-dashboard.form-input type="text" id="name" label="Naam" :value="old('name', $map->name)" />

            <x-dashboard.form-submit />
        </form>
    </div>
@endsection
