@extends('layouts.dashboard')
@section('title', 'Nieuwe Reservering Toevoegen')

@section('content')
    <div class="lg:col-span-2">
        <x-dashboard.card>
            <form method="post" action="{{ route('dashboard.orders.store') }}">
                @csrf

                <x-dashboard.form-input type="select" id="user_id" label="Gebruiker" :options="$users"
                                        :value="old('user_id')"
                                        description="Dit is de gebruiker aan wie deze reservering is gekoppeld"></x-dashboard.form-input>

                <x-dashboard.form-submit></x-dashboard.form-submit>
            </form>
        </x-dashboard.card>
    </div>
@endsection
