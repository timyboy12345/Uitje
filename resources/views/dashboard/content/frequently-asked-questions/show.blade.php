@extends('layouts.dashboard')
@section('title', trans_choice('general.terms.frequently-asked-questions', 1))
@section('subtitle', $faq->title)
@section('editDestination', route('dashboard.content.frequently-asked-questions.edit', $faq->id))
@section('destroyDestination', route('dashboard.content.frequently-asked-questions.destroy', $faq->id))

@section('content')
    <x-dashboard.card
        :title="__('general.terms.general-information')"
    >
        <h3 class="text-indigo-800">{{ __('general.forms.title') }}</h3>
        <div class="text-gray-600 text-sm">
            {!! $faq->title !!}
        </div>

        <h3 class="text-indigo-800 mt-2">{{ __('general.forms.description') }}</h3>
        <div class="text-gray-600 text-sm mb-2">
            {!! $faq->content !!}
        </div>

        <x-dashboard.pill>{{ $faq->parsedSubject }}</x-dashboard.pill>
    </x-dashboard.card>

    <div class="lg:col-span-2">
        <x-dashboard.table :title="__('dashboard/content/frequently-asked-questions.show.table-title')"
                           :items="$faq->relatedQuestions()"
                           type="faqs"></x-dashboard.table>
    </div>
@endsection
