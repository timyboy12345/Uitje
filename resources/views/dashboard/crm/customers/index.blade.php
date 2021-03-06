@extends('layouts.dashboard')
@section('title', trans_choice('general.terms.customers', 2))
@section('subtitle', 'Doorzoek hier alle klanten die in het systeem staan')
@section('enableSearch', true)

@section('content')
    <div class="lg:col-span-2">
        <x-dashboard.table :items="$customers" type="customers"></x-dashboard.table>
    </div>
@endsection
