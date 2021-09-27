@extends('layouts.dashboard')
@section('title', 'Veelgestelde Vraag aanpassen')
@section('subtitle', $faq->title)
@section('backDestination', route('dashboard.reservation-types.show', $faq->id))

@section('content')
    <div class="bg-white shadow-sm lg:col-span-2 rounded p-4">
        <h3 class="text-indigo-800 font-bold mb-2">Algemene Informatie</h3>

        <form method="post" action="{{ route('dashboard.frequently-asked-questions.update', $faq->id) }}">
            @method('PUT')
            @csrf

            <x-dashboard.form-input type="text" id="title" label="Titel" :value="old('title', $faq->title)" />
            <x-dashboard.form-input type="textarea" id="content" label="Omschrijving" :value="old('content', $faq->content)" />
            <x-dashboard.form-input type="select" id="subject" label="Onderwerp" :value="old('subject', $faq->subject)" :options="$selectOptions"></x-dashboard.form-input>

            <x-dashboard.form-submit />
        </form>
    </div>
@endsection
