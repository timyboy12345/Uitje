@extends('layouts.dashboard')
@section('title', __('dashboard/content/pois.images.create.title'))
@section('subtitle', __('dashboard/content/pois.images.create.subtitle', ['name' => $poi->name]))
@section('backDestination', route('dashboard.content.pois.images.index', $poi->id))
@section('backLabel', __('dashboard/content/pois.images.create.backlabel', ['name' => $poi->name]))


@section('content')
    <div class="bg-white shadow-sm lg:col-span-2 rounded p-4">
        <h3 class="text-indigo-800 font-bold mb-2">{{ __('general.terms.general-information') }}</h3>

        <form method="post" enctype="multipart/form-data" action="{{ route('dashboard.content.pois.images.store', $poi->id) }}">
            @csrf

            <x-dashboard.form-input type="file" accept="image/*" id="file" />

            <x-dashboard.form-submit />
        </form>
    </div>
@endsection
