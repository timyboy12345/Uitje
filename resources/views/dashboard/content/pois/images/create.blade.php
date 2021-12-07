@extends('layouts.dashboard')
@section('title', 'Afbeelding Toevoegen')
@section('subtitle', 'Voeg een nieuwe afbeelding toe aan ' . $poi->name)
@section('backDestination', route('dashboard.content.pois.images.index', $poi->id))
@section('backLabel', "Terug naar alle afbeeldingen van {$poi->name}")


@section('content')
    <div class="bg-white shadow-sm lg:col-span-2 rounded p-4">
        <h3 class="text-indigo-800 font-bold mb-2">Algemene Informatie</h3>

        <form method="post" enctype="multipart/form-data" action="{{ route('dashboard.content.pois.images.store', $poi->id) }}">
            @csrf

            <x-dashboard.form-input type="file" accept="image/*" id="file" label="Bestand" />

            <x-dashboard.form-submit />
        </form>
    </div>
@endsection
