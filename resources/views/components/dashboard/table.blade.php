<div class="">
    @if($attributes->has('title'))
        <h3 class="text-gray-800 text-sm mb-1">{{ $attributes->get('title') }}</h3>
    @endif

    <div class="mb-2 bg-white shadow-sm rounded overflow-x-auto">
        <table class="font-sans min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
            <tr>
                @if ($type === 'customers')
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
                @endif

                @if ($type === 'orders')
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Naam
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Aangemaakt Op
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Datum
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Aantal items
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Bekijken</span>
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Aanpassen</span>
                    </th>
                @endif

                @if ($type === 'orderLines')
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Reserveringstype
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Datum
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Deelnemers
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Begeleiders
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Bekijken</span>
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Aanpassen</span>
                    </th>
                @endif

                @if ($type === 'reservationTypes')
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Naam
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Type
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Deelnemers
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Begeleiders
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Prijs
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Bekijken</span>
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Aanpassen</span>
                    </th>
                @endif

                @if ($type === 'faqs')
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Vraag
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Type
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Bekijken</span>
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Aanpassen</span>
                    </th>
                @endif
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($items as $item)
                <tr>
                    @if ($type === 'customers')
                        <td class="px-6 py-3 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full"
                                         src="https://www.gravatar.com/avatar/{{ $item->hashedEmail }}?d=mp"
                                         alt="">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium">
                                        {{ $item->name }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-800">
                            {{ $item->email }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-800">
                            {{ $item->created_at }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                          Gebruiker
                        </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('dashboard.customers.show', $item->id) }}"
                               class="flex flex-row items-center text-indigo-700 hover:text-indigo-900">
                                {{--                            <i class="w-4 mr-2" data-feather="eye"></i>--}}
                                Bekijken
                            </a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('dashboard.customers.edit', $item->id) }}"
                               class="text-indigo-700 hover:text-indigo-900">Aanpassen</a>
                        </td>
                    @endif

                    @if ($type === 'orders')
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-800">
                            {{ $item->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-800">
                            {{ $item->created_at }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-800">
                            {{ $item->date }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            {{ trans_choice(':count item|:count items', $item->orderLines->count(), [$item->orderLines->count()]) }}
                        </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('dashboard.orders.show', $item->id) }}"
                               class="flex flex-row items-center text-indigo-700 hover:text-indigo-900">
                                Bekijken
                            </a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('dashboard.orders.edit', $item->id) }}"
                               class="text-indigo-700 hover:text-indigo-900">Aanpassen</a>
                        </td>
                    @endif

                    @if ($type === 'orderLines')
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-800">
                            {{ $item->reservationType->title }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-800">
                            {{ $item->date }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            @if ($item->reservationType->has_participants)
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    {{ $item->participants ?? "-" }}
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            @if ($item->reservationType->has_accompanists)
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    {{ $item->accompanists ?? "-" }}
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('dashboard.orderLines.show', $item->id) }}"
                               class="flex flex-row items-center text-indigo-700 hover:text-indigo-900">
                                Bekijken
                            </a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('dashboard.orderLines.edit', $item->id) }}"
                               class="text-indigo-700 hover:text-indigo-900">Aanpassen</a>
                        </td>
                    @endif

                    @if ($type === 'reservationTypes')
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-800">
                            {{ $item->title }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-800">
                            {{ $item->type }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $item->has_participants ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $item->has_participants ? 'Ja' : 'Nee' }}
                                </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $item->has_accompanists ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $item->has_accompanists ? 'Ja' : 'Nee' }}
                                </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-800">
                            @isset($item->price)
                                <x-dashboard.pill>{{ $item->price }}</x-dashboard.pill>
                            @else
                                <x-dashboard.pill textcolor="text-gray-600" bgcolor="bg-gray-100">-</x-dashboard.pill>
                            @endisset
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('dashboard.reservation-types.show', $item->id) }}"
                               class="flex flex-row items-center text-indigo-700 hover:text-indigo-900">
                                Bekijken
                            </a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('dashboard.reservation-types.edit', $item->id) }}"
                               class="text-indigo-700 hover:text-indigo-900">Aanpassen</a>
                        </td>
                    @endif

                    @if ($type === 'faqs')
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-800">
                            {{ $item->title }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-indigo-100 text-indigo-800">
                                {{ $item->parsedSubject }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('dashboard.frequently-asked-questions.show', $item->id) }}"
                               class="flex flex-row items-center text-indigo-700 hover:text-indigo-900">
                                Bekijken
                            </a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('dashboard.frequently-asked-questions.edit', $item->id) }}"
                               class="text-indigo-700 hover:text-indigo-900">Aanpassen</a>
                        </td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    @if($items instanceof \Illuminate\Pagination\LengthAwarePaginator)
        {!! $items->links() !!}
    @endif
</div>
