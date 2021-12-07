@extends('layouts.dashboard')
@section('title', 'Kaart')
@section('subtitle', $map->name)
@section('editDestination', route('dashboard.content.maps.edit', $map->id))
@section('destroyDestination', route('dashboard.content.maps.destroy', $map->id))
@section('backDestination', route('dashboard.content.maps.index'))
@section('backLabel', "Terug naar alle kaarten")

@section('content')
    <x-dashboard.card
        title="Algemene Informatie"
    >
        <h3 class="text-indigo-800">Titel</h3>
        <div class="text-gray-600 text-sm">
            {!! $map->name !!}
        </div>
    </x-dashboard.card>

    <img src="{{ \Illuminate\Support\Facades\Storage::url($map->image) }}" class="rounded overflow-hidden shadow-sm" />
@endsection
