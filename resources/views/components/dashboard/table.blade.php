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
                        {{ __('general.forms.name') }}
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ __('general.forms.email') }}
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ __('general.terms.member-since') }}
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ __('general.forms.role') }}
                    </th>
                    <th scope="col"
                        class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ __('general.terms.amount-of-orders') }}
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">{{ __('general.terms.view') }}</span>
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">{{ __('general.terms.edit') }}</span>
                    </th>
                @endif

                @if ($type === 'orders')
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ __('general.forms.name') }}
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ __('general.forms.date') }}
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ __('general.terms.amount-of-items') }}
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">{{ __('general.terms.view') }}</span>
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">{{ __('general.terms.edit') }}</span>
                    </th>
                @endif

                @if ($type === 'orderLines')
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ __('general.forms.reservation-type') }}
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ __('general.forms.date') }}
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ __('general.terms.type') }}
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ __('general.terms.participants') }}
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ __('general.terms.accompanists') }}
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">{{ __('general.terms.view') }}</span>
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">{{ __('general.terms.edit') }}</span>
                    </th>
                @endif

                @if ($type === 'reservationTypes')
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ __('general.forms.name') }}
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ __('general.terms.type') }}
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ __('general.terms.participants') }}
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ __('general.terms.accompanists') }}
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ __('general.terms.price') }}
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">{{ __('general.terms.view') }}</span>
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">{{ __('general.terms.edit') }}</span>
                    </th>
                @endif

                @if ($type === 'faqs')
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ __('general.forms.question') }}
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ __('general.forms.role') }}
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">{{ __('general.terms.view') }}</span>
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">{{ __('general.terms.edit') }}</span>
                    </th>
                @endif

                @if ($type === 'reservationTypeLines')
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Vraag
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Type
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ __('general.forms.is-manditory') }}
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">{{ __('general.terms.view') }}</span>
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">{{ __('general.terms.edit') }}</span>
                    </th>
                @endif

                @if ($type === 'pois')
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ __('general.forms.name') }}
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ __('general.forms.is-active') }}
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">{{ __('general.terms.view') }}</span>
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">{{ __('general.terms.images') }}</span>
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">{{ __('general.terms.edit') }}</span>
                    </th>
                @endif

                @if ($type === 'maps')
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ __('general.forms.name') }}
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ __('general.forms.is-active') }}
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">{{ __('general.terms.view') }}</span>
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">{{ __('general.terms.edit') }}</span>
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
                            {{ \Carbon\Carbon::make($item->created_at)->toDateString() }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <x-dashboard.pill>{{ $item->role }}</x-dashboard.pill>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <x-dashboard.pill>{{ $item->orders->count() }}</x-dashboard.pill>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('dashboard.crm.customers.show', $item->id) }}"
                               class="flex flex-row items-center text-indigo-700 hover:text-indigo-900">
                                {{--                            <i class="w-4 mr-2" data-feather="eye"></i>--}}
                                {{ __('general.terms.view') }}
                            </a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('dashboard.crm.customers.edit', $item->id) }}"
                               class="text-indigo-700 hover:text-indigo-900">{{ __('general.terms.edit') }}</a>
                        </td>
                    @endif

                    @if ($type === 'orders')
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-800">
                            {{ $item->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-800">
                            @isset($item->date)
                                {{ \Carbon\Carbon::make($item->date)->calendar() ?? '-' }}
                            @endisset
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            {{ trans_choice('general.terms.parts', $item->orderLines->count()) }}
                        </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('dashboard.tickets.orders.show', $item->id) }}"
                               class="flex flex-row items-center text-indigo-700 hover:text-indigo-900">
                                {{ __('general.terms.view') }}
                            </a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('dashboard.tickets.orders.edit', $item->id) }}"
                               class="text-indigo-700 hover:text-indigo-900">{{ __('general.terms.edit') }}</a>
                        </td>
                    @endif

                    @if ($type === 'orderLines')
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-800">
                            {{ $item->reservationType->title }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-800">
                            @isset($item->date)
                                {{ \Carbon\Carbon::make($item->date)->calendar() }}
                            @endisset
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-normal">
                            <x-dashboard.pill>{{ $item->reservationType->type }}</x-dashboard.pill>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            @if ($item->reservationType->has_participants)
                                <x-dashboard.pill textcolor="text-green-800" bgcolor="bg-green-100">
                                    {{ $item->participants ?? 'x' }}
                                </x-dashboard.pill>
                            @else
                                <x-dashboard.pill textcolor="text-gray-600" bgcolor="bg-gray-100">-</x-dashboard.pill>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            @if ($item->reservationType->has_accompanists)
                                <x-dashboard.pill textcolor="text-green-800" bgcolor="bg-green-100">
                                    {{ $item->accompanists }}
                                </x-dashboard.pill>
                            @else
                                <x-dashboard.pill textcolor="text-gray-600" bgcolor="bg-gray-100">-</x-dashboard.pill>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('dashboard.tickets.order-lines.show', $item->id) }}"
                               class="flex flex-row items-center text-indigo-700 hover:text-indigo-900">
                                {{ __('general.terms.view') }}
                            </a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('dashboard.tickets.order-lines.edit', $item->id) }}"
                               class="text-indigo-700 hover:text-indigo-900">{{ __('general.terms.edit') }}</a>
                        </td>
                    @endif

                    @if ($type === 'reservationTypes')
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-800">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    @isset($item->image)
                                        <img class="h-10 w-10 rounded-full object-center object-cover"
                                             src="{{ \Illuminate\Support\Facades\Storage::url($item->image) }}"
                                             alt="">
                                    @else
                                        <div class="h-10 w-10 rounded-full bg-gray-200"></div>
                                    @endisset
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium">
                                        {{ $item->title }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-800">
                            <x-dashboard.pill>{{ $item->type }}</x-dashboard.pill>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $item->has_participants ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $item->has_participants ? __('general.terms.yes') : __('general.terms.no') }}
                                </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $item->has_accompanists ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $item->has_accompanists ? __('general.terms.yes') : __('general.terms.no') }}
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
                            <a href="{{ route('dashboard.tickets.reservation-types.show', $item->id) }}"
                               class="flex flex-row items-center text-indigo-700 hover:text-indigo-900">
                                {{ __('general.terms.view') }}
                            </a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('dashboard.tickets.reservation-types.edit', $item->id) }}"
                               class="text-indigo-700 hover:text-indigo-900">{{ __('general.terms.edit') }}</a>
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
                            <a href="{{ route('dashboard.content.frequently-asked-questions.show', $item->id) }}"
                               class="flex flex-row items-center text-indigo-700 hover:text-indigo-900">
                                {{ __('general.terms.view') }}
                            </a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('dashboard.content.frequently-asked-questions.edit', $item->id) }}"
                               class="text-indigo-700 hover:text-indigo-900">{{ __('general.terms.edit') }}</a>
                        </td>
                    @endif

                    @if ($type === 'reservationTypeLines')
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-800">
                            {{ $item->label }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <x-dashboard.pill>
                                {{ $item->type }}
                            </x-dashboard.pill>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <x-dashboard.pill>
                                {{ $item->is_required ? __('general.terms.yes') : __('general.terms.no') }}
                            </x-dashboard.pill>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('dashboard.tickets.reservation-type-lines.show', $item->id) }}"
                               class="flex flex-row items-center text-indigo-700 hover:text-indigo-900">
                                {{ __('general.terms.view') }}
                            </a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('dashboard.tickets.reservation-type-lines.edit', $item->id) }}"
                               class="text-indigo-700 hover:text-indigo-900">{{ __('general.terms.edit') }}</a>
                        </td>
                    @endif

                    @if ($type === 'pois')
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-800">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    @if($item->hasMedia())
                                        <img class="h-10 w-10 rounded-full object-center object-cover"
                                             src="{{ $item->getFirstMedia()->getUrl() }}"
                                             alt="">
                                    @else
                                        <div class="h-10 w-10 rounded-full bg-gray-200"></div>
                                    @endif
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium">
                                        {{ $item->name }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <x-dashboard.pill :textcolor="$item->is_enabled ? 'text-green-800' : 'text-red-800'"
                                              :bgcolor="$item->is_enabled ? 'bg-green-100' : 'bg-red-100'">
                                {{ $item->is_enabled ? __('general.terms.yes') : __('general.terms.no') }}
                            </x-dashboard.pill>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('dashboard.content.pois.show', $item->id) }}"
                               class="flex flex-row items-center text-indigo-700 hover:text-indigo-900">
                                {{ __('general.terms.view') }}
                            </a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('dashboard.content.pois.images.index', $item->id) }}"
                               class="flex flex-row items-center text-indigo-700 hover:text-indigo-900">
                                {{ __('general.terms.view-images') }}
                            </a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('dashboard.content.pois.edit', $item->id) }}"
                               class="text-indigo-700 hover:text-indigo-900">{{ __('general.terms.edit') }}</a>
                        </td>
                    @endif

                    @if ($type === 'maps')
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-800">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full object-center object-cover"
                                         src="{{ \Illuminate\Support\Facades\Storage::url($item->image) }}"
                                         alt="">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium">
                                        {{ $item->name }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('dashboard.content.maps.show', $item->id) }}"
                               class="flex flex-row items-center text-indigo-700 hover:text-indigo-900">
                                {{ __('general.terms.view') }}
                            </a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('dashboard.content.maps.edit', $item->id) }}"
                               class="text-indigo-700 hover:text-indigo-900">{{ __('general.terms.edit') }}</a>
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
