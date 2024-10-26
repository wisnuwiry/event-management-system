<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('News') }}
        </h2>
    </x-slot>

    <x-dashboard-content>
        <div class="relative flex flex-col justify-center">
            <div class="flex flex-row w-full justify-between py-4">
                <x-primary-link :href="route('admin.news.create')">
                    {{ __('Create News') }}
                </x-primary-link>
                <x-search-bar />
            </div>
            
            
            <x-news-table :news="$news" />

            <div class="mt-6 m-auto">
                <x-pagination :currentPage="$news->currentPage()" :totalPages="$news->lastPage()" />
            </div>
        </div>
    </x-dashboard-content>
</x-app-layout>
