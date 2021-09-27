@extends('layouts.dashboard')
@section('title', 'Klanten')
@section('subtitle', 'Doorzoek hier alle klanten die in het systeem staan')
@section('enableSearch', true)

@section('content')
    <div class="bg-white shadow-sm rounded lg:col-span-2 overflow-x-auto">
        <table class="font-sans min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
            <tr>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Naam
                </th>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Email
                </th>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Aangemaakt Op
                </th>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Rol
                </th>
                <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Bekijken</span>
                </th>
                <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Aanpassen</span>
                </th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($customers as $customer)
                <tr>
                    <td class="px-6 py-3 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                <img class="h-10 w-10 rounded-full"
                                     src="https://www.gravatar.com/avatar/{{ $customer->hashedEmail }}?d=mp"
                                     alt="">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium">
                                    {{ $customer->name }}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-800">
                        {{ $customer->email }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-800">
                        {{ $customer->created_at }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                          Gebruiker
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="{{ route('dashboard.customers.show', $customer->id) }}" class="flex flex-row items-center text-indigo-700 hover:text-indigo-900">
{{--                            <i class="w-4 mr-2" data-feather="eye"></i>--}}
                            Bekijken
                        </a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="{{ route('dashboard.customers.edit', $customer->id) }}" class="text-indigo-700 hover:text-indigo-900">Aanpassen</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="lg:col-span-2">
        {!! $customers->links() !!}
    </div>
@endsection
