@extends('layouts.dashboard')
@section('title', __('dashboard/content/pois.images.index.title'))
@section('subtitle', __('dashboard/content/pois.images.index.subtitle', ['name' => $poi->name]))
@section('createDestination', route('dashboard.content.pois.images.create', $poi->id))
@section('backDestination', route('dashboard.content.pois.show', $poi->id))
@section('backLabel', __('general.terms.back-to', ['name' => $poi->name]))

@section('content')
    <div class="lg:col-span-2 grid grid-cols-2 lg:grid-cols-4 gap-4">
        @if ($poi->hasMedia())
            @foreach ($poi->getMedia() as $media)
                <div class="rounded overflow-hidden bg-gray-300 w-full h-36 relative">
                    <div class="absolute left-2 top-2">
                        <form method="post"
                              action="{{ route('dashboard.content.pois.images.destroy', [$poi->id, $media->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button
                                class="z-50 p-2 bg-red-700 text-white rounded-full flex justify-center items-center">
                                <i class="w-4 h-4" data-feather="trash"></i>
                            </button>
                        </form>
                    </div>
                    <a href="{{ $media->getUrl() }}"
                       target="_blank">
                        <img
                            src="{{ $media->getUrl() }}"
                            class="w-full h-full object-cover object-center"
                            alt="{{ $media->name }}"
                            title="{{ $media->name }}"
                        >
                    </a>
                </div>
            @endforeach
        @else
            <x-dashboard.card :title="__('dashboard/content/pois.images.index.no-images-title')">
                {{ __('dashboard/content/pois.images.index.no-images') }}
            </x-dashboard.card>
        @endif

        <x-dashboard.card :title="__('dashboard/content/pois.images.index.add-file-title')">
            <a href="{{ route('dashboard.content.pois.images.create', $poi->id) }}"
               class="underline text-gray-800 hover:text-gray-900">
                {{ __('dashboard/content/pois.images.index.add-file') }}
            </a>
        </x-dashboard.card>
    </div>
@endsection
