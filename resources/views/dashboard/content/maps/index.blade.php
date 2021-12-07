@extends('layouts.dashboard')
@section('title', 'Kaarten')
@section('subtitle', 'Beheer hier alle kaarten')
@section('enableSearch', true)
@section('createDestination', route('dashboard.content.maps.create'))

@section('content')
    <div class="lg:col-span-2">
        <x-dashboard.table :items="$maps" type="maps"></x-dashboard.table>
    </div>
@endsection
