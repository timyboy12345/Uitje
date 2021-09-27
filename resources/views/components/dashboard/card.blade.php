<div class="bg-white rounded shadow-sm p-4">
    @isset($title)
        <h2 class="text-indigo-800 font-bold">{{ $title }}</h2>
    @endisset

    @isset($subtitle)
        <h3 class="text-gray-600 text-sm">{{ $subtitle }}</h3>
    @endisset

    <div class="text-md {{ !empty($__env->yieldContent('title')) || !empty($__env->yieldContent('subtitle')) ? 'mt-2' : '' }}">
        {!! $slot !!}
    </div>
</div>
