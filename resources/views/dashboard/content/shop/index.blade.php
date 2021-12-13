@extends('layouts.dashboard')
@section('title', __('general.terms.shop'))
@section('subtitle', __('dashboard/content/shop.index.subtitle'))

@section('content')
    <div class="lg:col-span-2">
        <x-dashboard.card :title="__('dashboard/content/shop.index.card-title')">
            <h3 class="text-indigo-800">{{ __('general.terms.url') }}</h3>
            <div class="text-gray-600 text-sm">
                <a href="{{ $organization->subdomain }}.{{ str_replace('http://', '', config('app.url')) }}" target="_blank">
                    {{ __('dashboard/content/shop.index.show-site-link', ['url' => "{$organization->subdomain}"]) }}
                </a>
            </div>
        </x-dashboard.card>
    </div>
@endsection
