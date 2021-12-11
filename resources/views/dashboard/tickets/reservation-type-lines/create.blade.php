@extends('layouts.dashboard')
@section('title', 'Regel aan Reserveringstype toevoegen')

@section('content')
    <div class="bg-white shadow-sm lg:col-span-2 rounded p-4">
        <h3 class="text-indigo-800 font-bold mb-2">{{ __('general.terms.general-information') }}</h3>

        <form method="post" action="{{ route('dashboard.tickets.reservation-type-lines.store') }}">
            @csrf

            <x-dashboard.form-input type="select" id="reservation_type_id" label="Reserveringstype" :options="$reservationTypes"
                                    :value="old('reservation_type_id', request()->get('reservation_type_id'))" :nullable="false"
                                    description="Dit is het reserveringstype waar deze vraag onderdeel van zal uitmaken"></x-dashboard.form-input>


            <x-dashboard.form-input type="select" id="type" label="Type" :options="$types"
                                    :value="old('type', request()->get('type'))" :nullable="false"
                                    description="Dit is het type vraag"></x-dashboard.form-input>

            <x-dashboard.form-input type="text" id="label" label="Label" :value="old('label')" />
            <x-dashboard.form-input type="text" id="description" label="Omschrijving" :value="old('description')" />
            <x-dashboard.form-input type="text" id="placeholder" label="Placeholder" :value="old('placeholder')" />
            <x-dashboard.form-input type="boolean" description="Selecteer om dit veld verplicht te stellen" id="is_required" label="Verplicht?" :value="old('is_required')" />

            <x-dashboard.form-submit />
        </form>
    </div>
@endsection
