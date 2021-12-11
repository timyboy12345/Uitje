@extends('layouts.dashboard')
@section('title', 'Point of Interest toevoegen')

@section('content')
    <div class="bg-white shadow-sm lg:col-span-2 rounded p-4">
        <h3 class="text-indigo-800 font-bold mb-2">{{ __('general.terms.general-information') }}</h3>

        <form method="post" action="{{ route('dashboard.content.pois.store') }}">
            @csrf

            <x-dashboard.form-input type="text" id="name" label="Naam" description="De volledige naam van deze Point of Interest." :value="old('name')" />
            <x-dashboard.form-input type="text" id="shortname" label="Verkorte naam" description="Een kortere naam, als de volledige naam niet getoond kan worden." :value="old('shortname')" />
            <x-dashboard.form-input type="text" id="description" label="Omschrijving" description="Een korte omschrijving om snel een beeld te schetsen wat hier te vinden is." :value="old('description')" />
            <x-dashboard.form-input type="textarea" id="content" label="Content" description="De volledige omschrijving van deze POI, de meest uitgebreide uitleg kan in dit tekstvak." :value="old('content')" />

            <x-dashboard.form-submit />
        </form>
    </div>
@endsection
