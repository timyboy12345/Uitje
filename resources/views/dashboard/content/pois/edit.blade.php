@extends('layouts.dashboard')
@section('title', __('dashboard/content/pois.edit.title'))
@section('subtitle', __('dashboard/content/pois.edit.title', ['name' => $poi->name]))
@section('backDestination', route('dashboard.content.pois.show', $poi->id))

@section('content')
    <form method="post" action="{{ route('dashboard.content.pois.update', $poi->id) }}"
          class="grid gap-4 lg:col-span-2">
        <x-dashboard.card :title="__('general.terms.general-information')">
            @method('PUT')
            @csrf

            <x-dashboard.form-input type="text" id="name"
                                    description="De volledige naam van deze Point of Interest."
                                    :value="old('name', $poi->name)"/>
            <x-dashboard.form-input type="text" id="shortname"
                                    description="Een kortere naam, als de volledige naam niet getoond kan worden."
                                    :value="old('shortname', $poi->shortname)"/>
            <x-dashboard.form-input type="text" id="description"
                                    description="Een korte omschrijving om snel een beeld te schetsen wat hier te vinden is."
                                    :value="old('description', $poi->description)"/>
            <x-dashboard.form-input type="textarea" id="content"
                                    description="De volledige omschrijving van deze POI, de meest uitgebreide uitleg kan in dit tekstvak."
                                    :value="old('content', $poi->content)"/>

            <x-dashboard.form-input type="boolean" id="is_enabled" :label="__('general.forms.is-enabled')" description="Of deze poi zichtbaar is of niet" :value="old('is_enabled', $poi->is_enabled)" />
        </x-dashboard.card>

        <x-dashboard.card :title="__('general.terms.location')">
            <div class="grid sm:grid-cols-2 gap-4">
                <x-dashboard.form-input type="number" id="lat" :value="old('lat', $poi->lat)"/>
                <x-dashboard.form-input type="number" id="lng" :value="old('lng', $poi->lng)"/>
                <x-dashboard.form-input type="number" id="entrance_lat" :label="__('general.forms.entrance-lat')" :value="old('entrance_lat', $poi->entrance_lat)"/>
                <x-dashboard.form-input type="number" id="entrance_lng" :label="__('general.forms.entrance-lng')" :value="old('lentrance_ng', $poi->entrance_lng)"/>
            </div>
        </x-dashboard.card>

        <div class="flex justify-end">
            <x-dashboard.form-submit/>
        </div>
    </form>
@endsection
