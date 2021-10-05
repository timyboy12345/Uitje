<div class="flex flex-col my-3">
    <label for="{{ $id }}">{{ $label }}</label>

    @if (in_array($type, ['text', 'number', 'date', 'password', 'email']))
        <input name="{{ $id }}" id="{{ $id }}" type="{{ $type }}" step="any"
               class="transition duration-100 rounded py-1 px-2 focus:ring-secondary-800 border-gray-200"
               value="{{ $value ?? '' }}" placeholder="{{ $placeholder ?? '' }}">
    @elseif($type === 'textarea')
        <textarea class="transition duration-100 rounded py-1 px-2 focus:ring-secondary-800 border-gray-200"
                  name="{{ $id }}" id="{{ $id }}">{{ $value }}</textarea>
    @elseif($type === 'boolean')
        <div class="flex flex-row items-center">
            <input id="{{ $id }}" name="{{ $id }}" type="checkbox" value="1"
                   class="mr-2 rounded transition duration-100" {{ $value == true ? 'checked' : '' }}>
            <div class="text-gray-600">{{ $description }}</div>
        </div>
    @elseif($type === 'select')
        <select id="{{ $id }}" name="{{ $id }}"
                class="mr-2 rounded transition duration-100 py-1 px-2 focus:ring-secondary-800 border-gray-200">
            @if (($nullable ?? true) === true)
                <option value="">- Geen Waarde</option>
            @endif

            @foreach ($options as $option)
                <option
                    value="{{ $option['value'] }}" {{ $value === $option['value'] ? 'selected' : '' }}>{{ $option['title'] }}</option>
            @endforeach
        </select>
    @elseif($type === 'address')
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-2">
            <div class="flex flex-col lg:col-span-2">
                <label for="{{ $id }}postalcode"
                       class="mb-1">Postcode</label>
                <input type="text" placeholder="1234AB"
                       id="{{ $id }}postalcode"
                       name="{{ $id }}postalcode"
                       class="transition duration-100 focus:ring-secondary focus:border-secondary rounded border-gray-200 py-1 px-2"
                       value="{{ old("{$id}postalcode") }}"
                >

                @if ($errors->has("{$id}postalcode"))
                    @foreach ($errors->get("{$id}postalcode") as $message)
                        <div class="text-red-600">{{ $message }}</div>
                    @endforeach
                @endif
            </div>
            <div class="flex flex-col">
                <label for="{{ $id }}number"
                       class="mb-1">Huisnummer</label>
                <input type="text" placeholder="1 of 2b"
                       id="{{ $id }}number"
                       name="{{ $id }}number"
                       class="transition duration-100 focus:ring-secondary focus:border-secondary rounded border-gray-200 py-1 px-2"
                       value="{{ old("{$id}number") }}"
                >

                @if ($errors->has("{$id}number"))
                    @foreach ($errors->get("{$id}number") as $message)
                        <div class="text-red-600">{{ $message }}</div>
                    @endforeach
                @endif
            </div>

            <div class="flex flex-col">
                <label for="{{ $id }}streetname"
                       class="mb-1">Straatnaam</label>
                <input type="text" placeholder="Johannesstraat"
                       id="{{ $id }}streetname"
                       name="{{ $id }}streetname"
                       class="transition duration-100 focus:ring-secondary focus:border-secondary rounded border-gray-200 py-1 px-2"
                       value="{{ old("{$id}streetname") }}"
                >

                @if ($errors->has("{$id}streetname"))
                    @foreach ($errors->get("{$id}streetname") as $message)
                        <div class="text-red-600">{{ $message }}</div>
                    @endforeach
                @endif
            </div>
            <div class="flex flex-col lg:col-span-2">
                <label for="{{ $id }}city"
                       class="mb-1">Stad</label>
                <input type="text" placeholder="Eindhoven"
                       id="{{ $id }}city"
                       name="{{ $id }}city"
                       class="transition duration-100 focus:ring-secondary focus:border-secondary rounded border-gray-200 py-1 px-2"
                       value="{{ old("{$id}city") }}">

                @if ($errors->has("{$id}city"))
                    @foreach ($errors->get("{$id}city") as $message)
                        <div class="text-red-600">{{ $message }}</div>
                    @endforeach
                @endif
            </div>
        </div>
    @else
        <p class="py-2 px-4 text-red-800 bg-red-100 rounded">Input type not found</p>
    @endif

    @if(isset($description) && $type !== 'boolean')
        <p class="text-gray-600 text-sm mt-0.5">{{ $description }}</p>
    @endif

    @error($id)
    <div class="text-sm text-red-600 flex flex-row items-center mt-0.5">
        <i data-feather="alert-triangle" class="w-4 h-4 mr-1"></i>
        {{ $message }}
    </div>
    @enderror
</div>
