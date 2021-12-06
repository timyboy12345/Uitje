@extends('layouts.dashboard')
@section('title', 'Veelgestelde Vraag toevoegen')

@section('content')
    <div class="bg-white shadow-sm lg:col-span-2 rounded p-4">
        <h3 class="text-indigo-800 font-bold mb-2">Algemene Informatie</h3>

        <form method="post" action="{{ route('dashboard.content.frequently-asked-questions.store') }}">
            @csrf

            <x-dashboard.form-input type="text" id="title" label="Titel" :value="old('title')" />
            <x-dashboard.form-input type="textarea" id="content" label="Omschrijving" :value="old('content')" />
            <x-dashboard.form-input type="select" id="subject" label="Onderwerp" :value="old('subject')" :options="$selectOptions"></x-dashboard.form-input>

            <x-dashboard.form-submit />
        </form>
    </div>
@endsection
