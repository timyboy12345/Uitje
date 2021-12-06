@extends('layouts.dashboard')
@section('title', $order->name)

@section('content')
    <div class="bg-white shadow-sm rounded p-4">
        <h3 class="text-indigo-800 font-bold mb-2">Algemene Informatie</h3>
        <ul class="list-disc ml-8">
            <li>Aangemaakt Op: {{ $order->created_at }}</li>
        </ul>
    </div>

    <div class="lg:col-span-2">
        <x-dashboard.table :items="$order->orderLines" type="orderLines"></x-dashboard.table>
    </div>

    <div class="flex flex-row gap-4">
        <a class="py-2 px-4 text-white bg-indigo-700 hover:bg-indigo-800 transition duration-100 rounded"
           href="{{ route('dashboard.tickets.order-lines.create', ['order_id' => $order->id]) }}">Nieuw onderdeel toevoegen</a>
    </div>
@endsection
