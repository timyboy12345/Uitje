@extends('layouts.default')
@section('title', 'Inloggen')

@section('content')
    <div class="bg-white rounded p-4 shadow-sm">
        <h1 class="text-lg font-bold text-secondary">Inloggen</h1>

        <form method="post">
            @csrf

            <div class="flex flex-col mb-2">
                <label for="email" class="mb-1">Email</label>
                <input
                    class="transition duration-100 focus:ring-secondary focus:border-secondary rounded border-gray-200 py-1 px-2"
                    id="email" name="email"
                    type="text" value="{{ old('email') }}">

                @if ($errors->has("email"))
                    <div class="text-red-600">{{ $errors->first('email') }}</div>
                @endif
            </div>

            <div class="flex flex-col mb-2">
                <label for="password" class="mb-1">Wachtwoord</label>
                <input
                    class="transition duration-100 focus:ring-secondary focus:border-secondary rounded border-gray-200 py-1 px-2"
                    id="password" name="password" type="password">

                @if ($errors->has("password"))
                    <div class="text-red-600">{{ $errors->first('password') }}</div>
                @endif
            </div>

            <button type="submit" class="py-1 px-2 rounded hover:bg-secondary-800 transition duration-100 bg-secondary-700 text-white">Inloggen</button>
        </form>
    </div>
@endsection
