@extends('layouts.dashboard')
@section('title', 'Onderdeel van een Reservering')
@section('subtitle', $orderLine->reservationType->title)
@section('editDestination', route('dashboard.orderLines.edit', $orderLine->id))

@section('content')
    <div class="bg-white shadow-sm lg:col-span-2 rounded p-4">
        <h3 class="text-indigo-800 font-bold mb-2">Algemene Informatie</h3>

        <ul class="list-disc ml-8">
            @if ($orderLine->reservationType->has_participants)
                <li class="">Deelnemers: {{ $orderLine->participants }}</li>
            @endif

            @if ($orderLine->reservationType->has_accompanists)
                <li class="">Begeleiders: {{ $orderLine->accompanists }}</li>
            @endif
        </ul>
    </div>
@endsection
