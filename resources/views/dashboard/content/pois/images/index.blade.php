@extends('layouts.dashboard')
@section('title', 'Afbeeldingen Beheren')
@section('subtitle', 'Beheer hier alle afbeeldingen van ' . $poi->name)
@section('createDestination', route('dashboard.content.pois.images.create', $poi->id))
@section('backDestination', route('dashboard.content.pois.show', $poi->id))
@section('backLabel', "Terug naar {$poi->name}")

@section('content')
    <div class="lg:col-span-2 grid grid-cols-2 lg:grid-cols-4 gap-4">
        @if ($poi->hasMedia())
            @foreach ($poi->getMedia() as $media)
                <a href="{{ $media->getUrl() }}"
                   target="_blank"
                   class="rounded overflow-hidden bg-gray-300 w-full h-36">
                    <img
                        src="{{ $media->getUrl() }}"
                        class="w-full h-full object-cover object-center"
                        alt="{{ $media->name }}"
                        title="{{ $media->name }}"
                    >
                </a>
            @endforeach
        @else
            <x-dashboard.card title="Geen media">
                Er zijn nog geen afbeeldingen toegevoegd aan deze POI.
            </x-dashboard.card>
        @endif

        <x-dashboard.card title="Media toevoegen">
            <a href="{{ route('dashboard.content.pois.images.create', $poi->id) }}"
               class="underline text-gray-800 hover:text-gray-900">
                Bestand toevoegen
            </a>
        </x-dashboard.card>
    </div>
@endsection
