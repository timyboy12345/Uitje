<div class="flex flex-col my-2">
    <label for="{{ $id }}">{{ $label }}</label>

    @if (in_array($type, ['text', 'number', 'date']))
    <input name="{{ $id }}" id="{{ $id }}" type="{{ $type }}"
           class="transition duration-100 rounded py-1 px-2 focus:ring-indigo-800 border-gray-200" value="{{ $value }}">
    @else
        <p class="py-2 px-4 text-red-800 bg-red-100 rounded">Input type not found</p>
    @endif

    @isset($description)
        <p class="text-gray-600 text-sm mt-0.5">{{ $description }}</p>
    @endisset
</div>
