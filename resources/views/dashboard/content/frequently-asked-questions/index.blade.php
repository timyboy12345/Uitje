@extends('layouts.dashboard')
@section('title', trans_choice('general.terms.frequently-asked-questions', 2))
@section('subtitle', __('dashboard/content/frequently-asked-questions.index.title'))
@section('enableSearch', true)
@section('createDestination', route('dashboard.content.frequently-asked-questions.create'))

@section('content')
    <div class="lg:col-span-2">
        <x-dashboard.table :items="$faqs" type="faqs"></x-dashboard.table>
    </div>
@endsection
