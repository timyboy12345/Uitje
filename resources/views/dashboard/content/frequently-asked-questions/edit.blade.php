@extends('layouts.dashboard')
@section('title', __('dashboard/content/frequently-asked-questions.edit.title'))
@section('subtitle', $faq->title)
@section('backDestination', route('dashboard.content.frequently-asked-questions.show', $faq->id))

@section('content')
    <div class="bg-white shadow-sm lg:col-span-2 rounded p-4">
        <h3 class="text-indigo-800 font-bold mb-2">{{ __('general.terms.general-information') }}</h3>

        <form method="post" action="{{ route('dashboard.content.frequently-asked-questions.update', $faq->id) }}">
            @method('PUT')
            @csrf

            <x-dashboard.form-input type="text" id="title" :label="__('general.forms.title')" :value="old('title', $faq->title)" />
            <x-dashboard.form-input type="textarea" id="content" :label="__('general.forms.content')" :value="old('content', $faq->content)" />
            <x-dashboard.form-input type="select" id="subject" :label="__('general.forms.subject')" :value="old('subject', $faq->subject)" :options="$selectOptions"></x-dashboard.form-input>

            <x-dashboard.form-submit />
        </form>
    </div>
@endsection
