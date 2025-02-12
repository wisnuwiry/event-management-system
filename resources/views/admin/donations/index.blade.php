<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Donations') }}
        </h2>
    </x-slot>

    <x-dashboard-content>
        <div class="relative flex flex-col justify-center">
            <x-donation-table :donations="$donations" />

            <div class="mt-6 m-auto">
                <x-pagination :currentPage="$donations->currentPage()" :totalPages="$donations->lastPage()" />
            </div>
        </div>
    </x-dashboard-content>
</x-app-layout>
