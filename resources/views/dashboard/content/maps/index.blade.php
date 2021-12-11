@extends('layouts.dashboard')
@section('title', trans_choice('general.terms.maps', 1))
@section('subtitle', __('dashboard/content/maps.index.subtitle'))
@section('enableSearch', true)
@section('createDestination', route('dashboard.content.maps.create'))

@section('content')
    <div class="lg:col-span-2">
        <x-dashboard.table :items="$maps" type="maps"></x-dashboard.table>
    </div>
@endsection
