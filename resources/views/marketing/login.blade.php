@extends('layouts.landing')
@section('title', 'Inloggen')

@section('content')
    <div class="grid gap-4">
        <div class="p-4 bg-white rounded shadow-sm">
            <h3 class="text-indigo-600 font-bold">Inloggen</h3>

            <form method="post">
                @csrf

                <x-form-input id="email" type="text" label="Email" :value="old('email')"></x-form-input>
                <x-form-input id="password" type="password" label="Wachtwoord"></x-form-input>

                <button type="submit" class="bg-indigo-700 hover:bg-indigo-800 transition duration-100 rounded py-2 px-4 text-white">
                    Inloggen
                </button>
            </form>
        </div>
    </div>
@endsection
