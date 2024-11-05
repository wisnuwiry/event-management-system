<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <x-dashboard-content>
        <div class="relative flex flex-col justify-center">
            <div class="flex flex-row w-full justify-between py-4">
                <div></div>
                <x-search-bar value="{{ $search }}"/>
            </div>
            
            <x-user-table :users="$users" />

            <div class="mt-6 m-auto">
                <x-pagination :currentPage="$users->currentPage()" :totalPages="$users->lastPage()" />
            </div>
        </div>
    </x-dashboard-content>
</x-app-layout>
