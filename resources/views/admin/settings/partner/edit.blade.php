<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Partner') }}
        </h2>
    </x-slot>

    <x-dashboard-content>
        <form method="POST" action="{{ route('admin.settings.partner.update', $partner->id) }}" class="mx-auto" enctype="multipart/form-data">
            @csrf
            @include('admin.settings.partner.partials.form')
        </form>
    </x-dashboard-content>
</x-app-layout>