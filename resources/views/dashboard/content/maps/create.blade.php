@extends('layouts.dashboard')
@section('title', __('dashboard/content/maps.create.title'))

@section('content')
    <div class="bg-white shadow-sm lg:col-span-2 rounded p-4">
        <h3 class="text-indigo-800 font-bold mb-2">
            {{ __('general.terms.general-information') }}
        </h3>

        <form enctype="multipart/form-data" method="post" action="{{ route('dashboard.content.maps.store') }}">
            @csrf

            <x-dashboard.form-input id="name" type="text" id="name" :value="old('name')" />
            <x-dashboard.form-input id="file" type="file" accept="image/*" :label="trans_choice('general.terms.maps', 1)" />

            <x-dashboard.form-submit />
        </form>
    </div>
@endsection
