@extends('layouts.dashboard')
@section('title', 'Veelgestelde Vraag')
@section('subtitle', $faq->title)
@section('editDestination', route('dashboard.frequently-asked-questions.edit', $faq->id))

@section('content')
    <x-dashboard.card
        title="Algemene Informatie"
    >
        <h3 class="text-indigo-800">Titel</h3>
        <div class="text-gray-600 text-sm">
            {!! $faq->title !!}
        </div>

        <h3 class="text-indigo-800 mt-2">Omschrijving</h3>
        <div class="text-gray-600 text-sm mb-2">
            {!! $faq->content !!}
        </div>

        <x-dashboard.pill>{{ $faq->parsedSubject }}</x-dashboard.pill>
    </x-dashboard.card>

    <div class="lg:col-span-2">
        <x-dashboard.table title="Gerelateerde vragen" :items="$faq->relatedQuestions()"
                           type="faqs"></x-dashboard.table>
    </div>
@endsection
