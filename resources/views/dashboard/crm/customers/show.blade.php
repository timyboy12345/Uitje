@extends('layouts.dashboard')
@section('title', $customer->name)
@section('subtitle', $customer->email)

@section('content')
    <div class="bg-white shadow-sm rounded p-4">
        <h3 class="text-indigo-800 font-bold mb-2">Algemene Informatie</h3>
        <ul class="list-disc ml-8">
            <li>Email: {{ $customer->email }}</li>
            <li>Aangemaakt Op: {{ $customer->created_at }}</li>
        </ul>
    </div>

    <div class="lg:col-span-2">
        <x-dashboard.table title="Reserveringen van deze gebruiker" :items="$customer->orders" type="orders"></x-dashboard.table>
    </div>
@endsection
