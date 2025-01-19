<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Journal') }}
        </h2>
    </x-slot>

    <x-dashboard-content>
        <form method="POST" action="{{ route('admin.settings.journal.update', $journal->id) }}" class="mx-auto" enctype="multipart/form-data">
            @csrf
            @include('admin.settings.journal.partials.form')
        </form>
    </x-dashboard-content>
</x-app-layout>