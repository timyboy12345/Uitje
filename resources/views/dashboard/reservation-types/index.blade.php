@extends('layouts.dashboard')
@section('title', 'Reserveringtypes')
@section('subtitle', 'Doorzoek hier alle reserveringstypes die in het systeem staan')
@section('enableSearch', true)
@section('createDestination', route('dashboard.reservation-types.create'))

@section('content')
    <div class="lg:col-span-2">
        <x-dashboard.table :items="$reservationTypes" type="reservationTypes"></x-dashboard.table>
    </div>
@endsection
