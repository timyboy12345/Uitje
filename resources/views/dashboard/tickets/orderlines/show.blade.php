@extends('layouts.dashboard')
@section('title', 'Onderdeel van een Reservering')
@section('subtitle', $orderLine->reservationType->title)
@section('editDestination', route('dashboard.tickets.order-lines.edit', $orderLine->id))
@section('backDestination', route('dashboard.tickets.orders.show', $orderLine->order->id))
@section('backLabel', 'Terug naar de reservering')

@section('content')
    <div class="bg-white shadow-sm lg:col-span-2 rounded p-4">
        <h3 class="text-indigo-800 font-bold mb-2">Algemene Informatie</h3>

        <ul class="list-disc ml-8">
            @if ($orderLine->reservationType->has_participants)
                <li class="">Deelnemers: {{ $orderLine->participants ?? '-' }}</li>
            @endif

            @if ($orderLine->reservationType->has_accompanists)
                <li class="">Begeleiders: {{ $orderLine->accompanists ?? '-' }}</li>
            @endif
        </ul>
    </div>

    <x-dashboard.card
        title="Vragen"
        subtitle="Dit zijn de antwoorden die zijn gegeven op de vragen die zijn gesteld tijdens het maken van de reservering."
    >
        @if ($orderLine->orderLineLines()->count() === 0)
            <x-dashboard.alert>Er zijn geen vragen beantwoord, of deze konden niet worden gevonden.</x-dashboard.alert>
        @endif

        <div class="divide-y divide-gray-200 -mx-4">
            @foreach ($orderLine->orderLineLines as $line)
                <div class="px-4 py-2">
                    <h4 class="text-indigo-800">{{ $line->reservationTypeLine->label }}</h4>

                    @if ($line->reservationTypeLine->type === 'address')
                        <p class="text-gray-600 text-sm">{{ $line->data->streetname }} {{ $line->data->housenumber }}</p>
                    @else
                        <p class="text-gray-600 text-sm">{{ $line->value }}</p>
                    @endif
                </div>
            @endforeach
        </div>
    </x-dashboard.card>
@endsection
