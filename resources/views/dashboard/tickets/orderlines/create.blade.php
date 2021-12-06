@extends('layouts.dashboard')
@section('title', 'Nieuwe Reservering Toevoegen')

@section('content')
    <div class="lg:col-span-2">
        <x-dashboard.card>
            <form method="post" action="{{ route('dashboard.orderLines.store') }}">
                @csrf

                <x-dashboard.form-input type="select" id="reservation_type_id" label="Reserveringstype" :options="$reservationTypes"
                                        :value="old('reservation_type_id')" :nullable="false"
                                        description="Dit is het type van de reservering"></x-dashboard.form-input>

                <x-dashboard.form-input type="select" id="order_id" label="Order" :options="$orders"
                                        :value="old('order_id', request()->get('order_id'))" :nullable="false"
                                        description="Dit is de reservering waar dit onderdeel aan vast komt te hangen"></x-dashboard.form-input>

                <x-dashboard.form-submit></x-dashboard.form-submit>
            </form>
        </x-dashboard.card>
    </div>
@endsection
