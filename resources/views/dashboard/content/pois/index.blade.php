@extends('layouts.dashboard')
@section('title', trans_choice('general.terms.pois', 2))
@section('subtitle', __('dashboard/content/pois.index.subtitle'))
@section('enableSearch', true)
@section('createDestination', route('dashboard.content.pois.create'))

@section('content')
    <div class="lg:col-span-2">
        <x-dashboard.table :items="$pois" type="pois"></x-dashboard.table>
    </div>
@endsection
