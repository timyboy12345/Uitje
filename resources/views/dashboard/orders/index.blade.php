@extends('layouts.dashboard')
@section('title', 'Reserveringen')
@section('subtitle', 'Doorzoek hier alle reserveringen die zijn geplaatst')
@section('enableSearch', true)
@section('createDestination', route('dashboard.orders.create'))

@section('content')
    <div class="lg:col-span-2">
        <x-dashboard.table :items="$orders" type="orders"></x-dashboard.table>
    </div>
@endsection
