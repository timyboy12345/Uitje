@extends('layouts.default')
@section('title', 'Home')

@section('content')
    <div class="p-4 rounded-sm shadow-sm bg-white">
        <h1 class="font-bold text-secondary text-lg">Uitje Reserveren</h1>
        <p class="text-gray-600 text-sm">Kies hieronder het type uitje waarvoor u een reservering wilt plaatsen.</p>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-5">
            @foreach ($reservationTypes as $reservationType)
                <a href="{{ route('reserve.index', [\Illuminate\Support\Facades\Request::route('park'), $reservationType->slug]) }}"
                   class="bg-secondary hover:bg-secondary-600 transition duration-100 text-white rounded shadow overflow-hidden">
                    @isset($reservationType->image)
                        <img src="{{ \Illuminate\Support\Facades\Storage::url($reservationType->image) }}"
                             class="max-h-32 object-cover w-full object-center"
                             alt="Afbeelding voor {{ $reservationType->title }}">
                    @endisset

                    <div class="p-4">
                        <h2 class="font-bold">{{ $reservationType->title }}</h2>

                        @isset($reservationType->min_participants)
                            <p class="text-sm opacity-80">Vanaf {{ $reservationType->min_participants }} deelnemers</p>
                        @endisset

                        @isset($reservationType->max_participants)
                            <p class="text-sm opacity-80">Tot {{ $reservationType->max_participants }} deelnemers</p>
                        @endisset
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    @if ($frequentlyAskedQuestions->count() > 0)
        <div class="p-4 bg-white rounded shadow-sm mt-4">
            @foreach($frequentlyAskedQuestions as $question)
                <div class="@if (!$loop->last) mb-4 @endif">
                    <h1 class="font-bold text-secondary text-lg">{{ $question->title }}</h1>
                    <p class="text-gray-600 text-sm">{!! $question->content !!}</p>
                </div>
            @endforeach
        </div>
    @endif
@endsection
