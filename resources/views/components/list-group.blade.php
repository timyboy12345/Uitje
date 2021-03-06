<div>
    <div class="flex flex-col divide-y divide-gray-200 -mx-4">
        @foreach ($items as $item)
            @switch($type ?? 'orders')
                @case('orders')
                <a href="{{ route('orders.show', [\Illuminate\Support\Facades\Request::route('park'), $item->id]) }}"
                   class="hover:bg-gray-100 transition duration-100 py-2 px-4 flex flex-row">
                    <div class="">{{ $item->name }}</div>

                    @isset($item->date)
                        <div class="text-gray-600 ml-2">{{ \Carbon\Carbon::make($item->date)->calendar() }}</div>
                    @endisset
                </a>
                @break
                @case('orderLines')
                <a href="{{ route('orders.show', [\Illuminate\Support\Facades\Request::route('park'), $item->id]) }}"
                   class="hover:bg-gray-100 transition duration-100 py-2 px-4">
                    {{ $item->reservationType->title }}

                    @isset($item->date)
                        {{ $item->date }}
                    @endisset

                    @if(isset($item->participants) || isset($item->accompanists))
                        <div class="flex flex-row gap-1 text-sm text-gray-600">
                            @isset ($item->participants)
                                <span>{{ $item->participants }} deelnemers</span>
                            @endisset

                            @isset ($item->accompanists)
                                <span>{{ $item->accompanists }} begeleiders</span>
                            @endisset
                        </div>
                    @endif
                </a>
                @break
            @endswitch
        @endforeach
    </div>
</div>
