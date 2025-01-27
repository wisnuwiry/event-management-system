<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Event') }}
        </h2>
    </x-slot>

    <x-dashboard-content>
        @include('admin.events.partials.detail')
        @include('admin.events.partials.report')
    </x-dashboard-content>
</x-app-layout>