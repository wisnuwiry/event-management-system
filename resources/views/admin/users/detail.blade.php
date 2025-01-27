<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail User') }}
        </h2>
    </x-slot>

    <x-dashboard-content>
        <div class="flex flex-col gap-8">
            @include('admin.users.partials.overview')
            @include('admin.users.partials.donations')
            @include('admin.users.partials.events')
        </div>
    </x-dashboard-content>
</x-app-layout>