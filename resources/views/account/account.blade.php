@extends('layouts.default')
@section('title', 'Jouw Account')

@section('content')
    <div class="grid gap-4">
        <div class="bg-white shadow-sm rounded p-4">
            <h1 class="text-secondary font-bold text-lg">Jouw Account</h1>
            <h2 class="text-sm text-gray-600 mb-2">Bekijk hier algemene informatie over jouw account.</h2>

            <ul class="list-disc ml-8">
                <li class="">Email: {{ \Illuminate\Support\Facades\Auth::user()->email }}</li>
            </ul>

            <form method="post" class="mt-4" action="{{ route('logout', [\Illuminate\Support\Facades\Request::route('park')]) }}">
                @csrf

                <button type="submit" class="text-secondary hover:text-secondary-600 underline transition duration-100">
                    Klik hier om uit te loggen
                </button>
            </form>
        </div>

        <div class="bg-white shadow-sm rounded p-4">
            <h1 class="text-secondary font-bold text-lg">Jouw Bestellingen</h1>
            <h2 class="text-sm text-gray-600 mb-2">Dit zijn de recentste bestellingen in jouw account.</h2>

            <x-list-group :items="$orders" type="orders"></x-list-group>
        </div>
    </div>
@endsection
