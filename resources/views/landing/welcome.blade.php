@extends('layouts.landing')

@section('content')
    <div class="flex flex-col text-center my-16">
        <h1 class="font-bold text-indigo-600 font-bold text-5xl italic">Rezer</h1>
        <h2 class="text-gray-600">Rezer is hét reserveringssyteem voor de leisure-industrie.</h2>
    </div>

    <div class="grid lg:grid-cols-2 gap-4">
        <div class="p-4 bg-white rounded shadow-sm">
            <h3 class="text-indigo-600 font-bold">Over Rezer</h3>
            <p class="text-gray-800 text-sm">Met rezer is het kinderlijk eenvoudig om reserveringen aan te namen voor een museum, pretpark, dierentuin of ander dagje uit. Laat families reserveren, of hele groepen.</p>
        </div>

        <div class="p-4 bg-white rounded shadow-sm">
            <h3 class="text-indigo-600 font-bold">Voor wie is Rezer?</h3>
            <p class="text-gray-800 text-sm">Het systeem is momenteel zeer geschikt in de leisure-branch. Denk hierbij aan (kleinschalige) musea, dierentuinen en pretparken.</p>
        </div>
    </div>
@endsection
