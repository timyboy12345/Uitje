@extends('layouts.default')

@section('content')
    <div class="grid gap-4 lg:grid-cols-2">
        <div class="bg-white rounded shadow-sm p-4">
            <h1 class="text-secondary font-bold text-lg">Algemene informatie</h1>
            <h2 class="text-sm text-gray-600 mb-2">Informatie over deze reservering</h2>

            <ul class="list-disc ml-8">
                <li class="">Aangemaakt op: {{ $order->created_at }}</li>
                <li class="">Datum: {{ $order->date }}</li>
            </ul>
        </div>

        <div class="bg-white rounded shadow-sm p-4">
            <h1 class="text-secondary font-bold text-lg">Onderdelen</h1>
            <h2 class="text-sm text-gray-600 mb-2">Dit zijn alle onderdelen van deze reservering</h2>

            <x-list-group :items="$order->orderLines" type="orderLines" />
        </div>
    </div>
@endsection
