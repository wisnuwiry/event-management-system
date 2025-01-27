<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-8">
            @include('admin.dashboard.partials.greeting')
            @include('admin.dashboard.partials.overview')
            @include('admin.dashboard.partials.event-donation')
        </div>
    </div>
</x-app-layout>