@extends('layouts.dashboard')
@section('title', 'Veelgestelde Vragen')
@section('subtitle', 'Beheer hier alle veelgestelde vragen')
@section('enableSearch', true)
@section('createDestination', route('dashboard.content.frequently-asked-questions.create'))

@section('content')
    <div class="lg:col-span-2">
        <x-dashboard.table :items="$faqs" type="faqs"></x-dashboard.table>
    </div>
@endsection
