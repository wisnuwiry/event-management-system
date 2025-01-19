<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Settings') }}
        </h2>
    </x-slot>

    <x-dashboard-content>
        <div class="relative flex flex-col justify-center">
            <h2 class="pb-4 text-3xl tracking-tight font-bold text-gray-900 dark:text-white border-b border-b-gray-200 dark:border-b-gray-700">{{ __('Settings') }}</h2>
        </div>
        @include('admin.settings.partials.profile')
        @include('admin.settings.partials.menu')
    </x-dashboard-content>
</x-app-layout>