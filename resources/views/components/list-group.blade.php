<div>
    <div class="flex flex-col divide-y divide-gray-200 -mx-4">
        @foreach ($items as $item)
            @switch($type ?? 'orders')
                @case('orders')
                <a href="{{ route('orders.show', $item->id) }}"
                   class="hover:bg-gray-100 transition duration-100 py-2 px-4">
                    {{ $item->name }}
                </a>
                @break
                @case('orderLines')
                <a href="{{ route('orders.show', $item->id) }}"
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
