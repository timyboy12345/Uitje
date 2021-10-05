@extends('layouts.default')
@section('title', 'Bedankt voor je reservering!')

@section('content')
    <div class="bg-white rounded shadow-sm p-4">
        <h1 class="text-secondary font-bold text-lg">Bedankt voor je reservering!</h1>
        <h2 class="text-gray-600 text-sm">We hebben je reservering ontvangen.</h2>

        <p class="my-4">We zullen binnenkort contact met je opnemen om de reservering definitief te maken. Er is ook een
            mailtje gestuurd met alle details en de status van je reservering. Deze informatie is ook terug te vinden in
            je account.</p>

        <a href="{{ route('home', [\Illuminate\Support\Facades\Request::route('park')]) }}" class="text-secondary hover:text-secondary-600 transition duration-100 underline">
            Ga terug naar de homepagina
        </a>
    </div>
@endsection
