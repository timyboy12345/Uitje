@extends('layouts.dashboard')
@section('title', 'Kaart toevoegen')

@section('content')
    <div class="bg-white shadow-sm lg:col-span-2 rounded p-4">
        <h3 class="text-indigo-800 font-bold mb-2">Algemene Informatie</h3>

        <form enctype="multipart/form-data" method="post" action="{{ route('dashboard.content.maps.store') }}">
            @csrf

            <x-dashboard.form-input type="text" id="name" label="Naam" :value="old('name')" />
            <x-dashboard.form-input type="file" accept="image/*" id="file" label="Kaart" />

            <x-dashboard.form-submit />
        </form>
    </div>
@endsection
