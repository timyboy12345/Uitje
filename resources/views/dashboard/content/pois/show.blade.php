@extends('layouts.dashboard')
@section('title', trans_choice('general.terms.pois', 2))
@section('subtitle', $poi->name)
@section('editDestination', route('dashboard.content.pois.edit', $poi->id))
@section('destroyDestination', route('dashboard.content.pois.destroy', $poi->id))
@section('backDestination', route('dashboard.content.pois.index'))
@section('backLabel', __('dashboard/content/pois.show.backlabel'))

@section('content')
    <x-dashboard.card
        :title="__('general.terms.general-information')"
    >
        <h3 class="text-indigo-800">{{ __('general.forms.title') }}</h3>
        <div class="text-gray-600 text-sm">
            {!! $poi->name !!}
        </div>

        <h3 class="text-indigo-800 mt-2">{{ __('general.forms.description') }}</h3>
        <div class="text-gray-600 text-sm mb-2">
            {!! $poi->description !!}
        </div>

        <h3 class="text-indigo-800 mt-2">{{ __('general.forms.is-active') }}</h3>
        <x-dashboard.pill>
            {{ $poi->is_enabled ? __('general.terms.yes') : __('general.terms.no') }}
        </x-dashboard.pill>
    </x-dashboard.card>

    <x-dashboard.card :title="__('general.forms.content')">
        {!! $poi->content !!}
    </x-dashboard.card>

    <x-dashboard.card :title="trans_choice('general.terms.images', 2)">
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
                {{ __('dashboard/content/pois.show.no-images') }}
            </x-dashboard.alert>
        @endif

        <a class="rounded py-2 px-4 bg-indigo-700 hover:bg-indigo-800 text-white inline-block mt-2"
           href="{{route('dashboard.content.pois.images.index', $poi->id)}}">
            {{ __('dashboard/content/pois.show.manage-images') }}
        </a>
    </x-dashboard.card>
@endsection
