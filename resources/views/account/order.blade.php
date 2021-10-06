@extends('layouts.default')
@section('title', 'Reservering Bekijken')

@section('content')
    <div class="grid gap-4 lg:grid-cols-2">
        <div class="bg-white rounded shadow-sm p-4">
            <h1 class="text-secondary font-bold text-lg">Jouw Reservering</h1>
            <h2 class="text-sm text-gray-600 mb-2">Op deze pagina zie je alle details van jouw reservering. Wil je je
                reservering wijzigen of annuleren? Neem dan contact met ons op.</h2>
        </div>

        <div class="bg-white rounded shadow-sm p-4">
            <h1 class="text-secondary font-bold text-lg">Algemene informatie</h1>
            <h2 class="text-sm text-gray-600  mb-2">Informatie over deze reservering</h2>

            <ul class="list-disc ml-8">
                <li>Aangemaakt op: {{ $order->created_at }}</li>

                @isset($order->date)
                    <li>Datum: {{ $order->date }}</li>
                @endisset
            </ul>
        </div>
    </div>

    <h1 class="lg:col-span-2 mt-4 text-secondary font-bold text-xl">Alle onderdelen van deze reservering</h1>
    <div class="grid gap-4 lg:grid-cols-2 mt-2">
        @foreach ($order->orderLines as $orderLine)
            <div class="bg-white p-4 rounded shadow-sm">
                <h2 class="text-secondary font-bold">{{ $orderLine->reservationType->title }}</h2>
                <h3 class="text-gray-600 text-sm">
                    {{ $orderLine->reservationType->type === 'reservation' ? 'Deze reservering' : 'Onderdeel van deze reservering' }}
                </h3>

                @if (isset($orderLine->participants) || isset($orderLine->accompanists))
                    <p class="my-2">
                        @isset($orderLine->participants)
                            Dit onderdeel van de reservering heeft {{ $orderLine->participants }} deelnemers.
                        @endisset

                        @isset($orderLine->accompanists)
                            Dit onderdeel van de reservering heeft {{ $orderLine->accompanists }} begeleiders.
                        @endisset
                    </p>
                @endif
            </div>
        @endforeach
        {{--        <a aria-disabled="true" class="rounded text-center mr-auto opacity-70 bg-secondary hover:bg-secondary-700 text-white py-2 px-4">--}}
        {{--            Extra toevoegen--}}
        {{--        </a>--}}
    </div>

    @isset($order->mainReservation)
        <h1 class="mt-4 text-secondary font-bold text-xl">Extra's toevoegen</h1>
        <h2 class="text-gray-600 text-sm">Voeg extra's toe aan deze reservering om de dag helemaal compleet te
            maken.</h2>
        <div class="grid gap-4 lg:grid-cols-2 mt-2">
            @foreach ($order->mainReservation->reservationType->associated as $extra)
                <div class="bg-white p-4 rounded shadow-sm">
                    <h2 class="text-secondary font-bold">{{ $extra->title }}</h2>
                    <p class="mb-4">Deze extra is toe te voegen aan deze reservering. Druk daarvoor op onderstaande knop
                        en beantwoord de gestelde vragen.</p>

                    <a class="py-2 px-4 text-white rounded bg-secondary hover:bg-secondary-600 transition duration-100"
                       href="{{ route('addExtra.index', [\Illuminate\Support\Facades\Request::route('park'), $order->id, $extra->id]) }}">
                        Voeg toe aan reservering
                    </a>
                </div>
            @endforeach
        </div>
    @endisset
@endsection
