@extends('layouts.default')

@section('content')
    <div class="p-4 rounded-sm shadow-sm bg-white">
        <h1 class="font-bold text-secondary text-lg">Uitje Reserveren</h1>
        <p class="text-gray-600 text-sm">Kies hieronder het type reisje wat u wil reserveren.</p>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-5">
            @foreach ($reservationTypes as $reservationType)
                <a href="{{ route('reserve.index', [$reservationType->slug]) }}"
                   class="bg-secondary hover:bg-secondary-600 transition duration-100 text-white rounded shadow overflow-hidden">
                    <img
                        src="https://images.unsplash.com/photo-1531956531700-dc0ee0f1f9a5?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1400&q=80"
                        class="max-h-32 object-cover w-full object-center">

                    <div class="p-4">
                        <h2 class="font-bold">{{ $reservationType->title }}</h2>
                        <p class="text-sm opacity-80">Vanaf 6 kinderen</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <div class="p-4 bg-white rounded shadow-sm mt-4">
        @foreach(\App\Models\FrequentlyAskedQuestion::all()->where('subject', 'general') as $question)
            <div class="@if (!$loop->last) mb-4 @endif">
                <h1 class="font-bold text-secondary text-lg">{{ $question->title }}</h1>
                <p class="text-gray-600 text-sm">{!! $question->content !!}</p>
            </div>
        @endforeach
    </div>
@endsection
