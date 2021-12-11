@extends('layouts.dashboard')
@section('title', $customer->name)
@section('subtitle', $customer->email)
@section('backDestination', route('dashboard.crm.customers.show', $customer->id))

@section('content')
    <div class="lg:col-span-2">
        <x-dashboard.card>
            <form method="post" action="{{ route('dashboard.crm.customers.update', $customer->id) }}">
                @csrf
                @method('PUT')
                <x-dashboard.form-input type="text" id="name" :value="old('name', $customer->name)"/>
                <x-dashboard.form-input type="text" id="email" :value="old('email', $customer->email)"/>

                <x-dashboard.form-submit/>
            </form>
        </x-dashboard.card>
    </div>
@endsection
