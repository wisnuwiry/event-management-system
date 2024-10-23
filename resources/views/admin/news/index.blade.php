@php
$news = [
    [
        'title' => 'New Tech Innovations in 2024',
        'thumbnail' => 'tech-innovations.jpg',
        'published' => true,
    ],
    [
        'title' => 'Art Exhibition: A Journey Through Colors',
        'thumbnail' => 'art-exhibition.jpg',
        'published' => true,
    ],
    [
        'title' => 'Global Climate Conference 2024',
        'thumbnail' => 'climate-conference.jpg',
        'published' => false,
    ],
    [
        'title' => 'Startup Fundraising Trends in 2024',
        'thumbnail' => 'startup-fundraising.jpg',
        'published' => true,
    ],
    [
        'title' => 'Health & Wellness Fair 2024',
        'thumbnail' => 'wellness-fair.jpg',
        'published' => false,
    ],
    [
        'title' => 'Music Festival Lineup Announced',
        'thumbnail' => 'music-festival.jpg',
        'published' => true,
    ],
];
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('News') }}
        </h2>
    </x-slot>

    <x-dashboard-content>
        <div class="relative flex flex-col justify-center">
            <div class="flex flex-row w-full justify-between py-4">
                <x-primary-button>
                    {{ __('Create News') }}
                </x-primary-button>
                <x-search-bar />
            </div>
            
            
            <x-news-table :news="$news" />

            <div class="mt-6 m-auto">
                <x-pagination :currentPage="2" :totalPages="5" />
            </div>
        </div>
    </x-dashboard-content>
</x-app-layout>
