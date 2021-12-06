@extends('layouts.dashboard')
@section('title', 'Point of Interest')
@section('subtitle', $poi->name)
@section('editDestination', route('dashboard.content.pois.edit', $poi->id))
@section('destroyDestination', route('dashboard.content.pois.destroy', $poi->id))

@section('content')
    <x-dashboard.card
        title="Algemene Informatie"
    >
        <h3 class="text-indigo-800">Titel</h3>
        <div class="text-gray-600 text-sm">
            {!! $poi->name !!}
        </div>

        <h3 class="text-indigo-800 mt-2">Omschrijving</h3>
        <div class="text-gray-600 text-sm mb-2">
            {!! $poi->description !!}
        </div>

        <h3 class="text-indigo-800 mt-2">Geactiveerd</h3>
        <x-dashboard.pill>
            {{ $poi->is_enabled ? 'Ja' : 'Nee' }}
        </x-dashboard.pill>
    </x-dashboard.card>

    <x-dashboard.card title="Content">
        {!! $poi->content !!}
    </x-dashboard.card>
@endsection
