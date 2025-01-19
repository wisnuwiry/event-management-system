<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Bank Accounts') }}
        </h2>
    </x-slot>

    <x-dashboard-content>
        <div class="relative flex flex-col justify-center">
            <div class="flex flex-row w-full justify-between py-4">
                <x-primary-link :href="route('admin.settings.bank.create')">
                    {{ __('Create Bank Account') }}
                </x-primary-link>
                <x-search-bar value="{{ $search }}" />
            </div>


            <x-bank-table :banks="$banks" />

            <div class="mt-6 m-auto">
                <x-pagination :currentPage="$banks->currentPage()" :totalPages="$banks->lastPage()" />
            </div>
        </div>
    </x-dashboard-content>
</x-app-layout>