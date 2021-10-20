<div class="flex flex-col my-2 mb-4">
    <label for="{{ $id }}">{{ $label }}</label>

    @if (in_array($type, ['text', 'number', 'date']))
        <input name="{{ $id }}" id="{{ $id }}" type="{{ $type }}" step="any"
               class="transition duration-100 rounded py-1 px-2 focus:ring-indigo-800 border-gray-200"
               value="{{ $value }}">
    @elseif($type === 'textarea')
        <textarea class="transition duration-100 rounded py-1 px-2 focus:ring-indigo-800 border-gray-200"
                  name="{{ $id }}" id="{{ $id }}">{{ $value }}</textarea>
    @elseif($type === 'boolean')
        <div class="flex flex-row items-center">
            <input id="{{ $id }}" name="{{ $id }}" type="checkbox" value="1"
                   class="mr-2 rounded transition duration-100" {{ $value == true ? 'checked' : '' }}>
            <div class="text-gray-600">{{ $description }}</div>
        </div>
    @elseif($type === 'file')
        <div class="flex flex-row items-center">
            <input accept="{{ $accept ?? '*' }}" id="{{ $id }}" name="{{ $id }}" type="file"
                   class="rounded transition duration-100 py-1 px-2 focus:ring-indigo-800 border w-full border-gray-200">
        </div>
    @elseif($type === 'select')
        <select id="{{ $id }}" name="{{ $id }}"
                class="rounded transition duration-100 py-1 px-2 focus:ring-indigo-800 border-gray-200">
            @if (($nullable ?? true) === true)
                <option value="">- Geen Waarde</option>
            @endif

            @foreach ($options as $option)
                <option
                    value="{{ $option['value'] }}" {{ $value === $option['value'] ? 'selected' : '' }}>{{ $option['title'] }}</option>
            @endforeach
        </select>
    @else
        <p class="py-2 px-4 text-red-800 bg-red-100 rounded">Input type not found</p>
    @endif

    @if(isset($description) && $type !== 'boolean')
        <p class="text-gray-600 text-sm mt-0.5">{{ $description }}</p>
    @endif

    @error($id)
    <div class="text-sm text-red-600">{{ $message }}</div>
    @enderror
</div>
