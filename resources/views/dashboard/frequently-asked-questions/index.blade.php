@extends('layouts.dashboard')
@section('title', 'Veelgestelde Vragen')
@section('subtitle', 'Beheer hier alle veelgesteelde vragen')
@section('enableSearch', true)

@section('content')
    <div class="lg:col-span-2">
        <x-dashboard.table :items="$faqs" type="faqs"></x-dashboard.table>
    </div>
@endsection
