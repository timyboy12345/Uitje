@extends('layouts.dashboard')
@section('title', 'Points of Interest')
@section('subtitle', 'Beheer hier alle pois')
@section('enableSearch', true)
@section('createDestination', route('dashboard.content.pois.create'))

@section('content')
    <div class="lg:col-span-2">
        <x-dashboard.table :items="$pois" type="pois"></x-dashboard.table>
    </div>
@endsection
