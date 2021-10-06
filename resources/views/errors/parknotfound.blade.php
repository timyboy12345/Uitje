<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}" type="text/css">
</head>
<body class="bg-gray-100">
<div class="mx-8 lg:max-w-6xl lg:mx-auto ">
    <div class="text-center my-16">
        <h1 class="text-4xl text-indigo-700 font-bold">{{ config('app.name') }}</h1>
        <h2 class="text-md text-gray-600">Dit park kon niet worden gevonden.</h2>
    </div>

    <div class="grid lg:grid-cols-2 gap-4">
        <div class="bg-white rounded shadow-sm p-4">
            <h3 class="text-md text-indigo-700 font-bold">Domein claimen</h3>
            Wil jij tickets verkopen op dit subdomein? Dat kan! Neem dan contact met ons op.
        </div>
        <div class="bg-white rounded shadow-sm p-4">
            <h3 class="text-md text-indigo-700 font-bold">Wat is {{ config('app.name') }}?</h3>
            Wij bieden je een reserveringssyteem voor je dierentuin, pretpark, museum of andere vrijetijdsattractie. Wil
            je meer weten? Kijk dan eens op onze <a class="underline text-indigo-700 hover:text-indigo-800"
                                                    href="{{ config('app.url') }}">homepage</a>.
        </div>
    </div>
</div>
</body>
</html>
