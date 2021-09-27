@extends('layouts.dashboard')
@section('title', 'Onderdeel van een Reservering Aanpassen')
@section('subtitle', $orderLine->reservationType->title)
@section('backDestination', route('dashboard.orderLines.show', $orderLine->id))

@section('content')
    <div class="bg-white shadow-sm lg:col-span-2 rounded p-4">
        <h3 class="text-indigo-800 font-bold mb-2">Algemene Informatie</h3>

        <form method="post" action="{{ route('dashboard.orderLines.update', $orderLine->id) }}">
            @method('PUT')
            @csrf

            <x-dashboard.form-input type="date" id="date" label="Datum" :value="$orderLine->date" description="Dit is de datum waarop de reservering valt" />
            <x-dashboard.form-input type="number" id="participants" label="Deelnemers" :value="$orderLine->participants" />
            <x-dashboard.form-input type="number" id="accompanists" label="Begeleiders" :value="$orderLine->accompanists" />

            <x-dashboard.form-submit />
        </form>
    </div>
@endsection
