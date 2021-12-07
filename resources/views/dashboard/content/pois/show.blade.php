@extends('layouts.dashboard')
@section('title', 'Point of Interest')
@section('subtitle', $poi->name)
@section('editDestination', route('dashboard.content.pois.edit', $poi->id))
@section('destroyDestination', route('dashboard.content.pois.destroy', $poi->id))
@section('backDestination', route('dashboard.content.pois.index'))
@section('backLabel', 'Terug naar alle pois')

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

    <x-dashboard.card title="Afbeeldingen">
        @if($poi->hasMedia())
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach ($poi->getMedia() as $image)
                    <div class="rounded overflow-hidden bg-gray-100">
                        <img src="{{ $image->getUrl() }}" class="w-full h-full object-cover object-center" />
                    </div>
                @endforeach
            </div>
        @else
            <x-dashboard.alert>
                Er zijn geen afbeeldingen gevonden voor deze poi.
            </x-dashboard.alert>
        @endif

        <a class="rounded py-2 px-4 bg-indigo-700 hover:bg-indigo-800 text-white inline-block mt-2"
           href="{{route('dashboard.content.pois.images.index', $poi->id)}}">
            Afbeeldingen managen
        </a>
    </x-dashboard.card>
@endsection
