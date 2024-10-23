@php
$events = [
    [
        'title' => 'Tech Conference 2024',
        'thumbnail' => 'tech-conference.jpg',
        'date' => '2024-11-10 09:00:00',
        'location' => 'Online',
        'description' => 'Join us for a full day of talks and workshops with leading tech professionals.',
        'tags' => 'technology, conference, innovation'
    ],
    [
        'title' => 'Art Expo 2024',
        'thumbnail' => 'art-expo.jpg',
        'date' => '2024-12-05 11:00:00',
        'location' => 'Gallery of Modern Arts, New York',
        'description' => 'Explore the latest trends in contemporary art from around the world.',
        'tags' => 'art, exhibition, modern'
    ],
    [
        'title' => 'Startup Pitch Night',
        'thumbnail' => 'startup-pitch.jpg',
        'date' => '2024-11-20 18:00:00',
        'location' => 'Tech Hub, San Francisco',
        'description' => 'Pitch your startup to investors and get feedback from industry leaders.',
        'tags' => 'startup, pitch, investors'
    ],
    [
        'title' => 'Health & Wellness Webinar',
        'thumbnail' => 'wellness-webinar.jpg',
        'date' => '2024-10-30 14:00:00',
        'location' => 'Online',
        'description' => 'Learn about the latest research and tips on maintaining a healthy lifestyle.',
        'tags' => 'health, wellness, webinar'
    ],
    [
        'title' => 'Music Festival 2024',
        'thumbnail' => 'music-festival.jpg',
        'date' => '2024-11-15 15:00:00',
        'location' => 'Central Park, New York',
        'description' => 'A day full of live music, food, and fun activities for all ages.',
        'tags' => 'music, festival, outdoor'
    ],
    [
        'title' => 'Coding Bootcamp',
        'thumbnail' => 'coding-bootcamp.jpg',
        'date' => '2024-12-01 09:00:00',
        'location' => 'Online',
        'description' => 'Intensive coding bootcamp covering full-stack web development.',
        'tags' => 'coding, bootcamp, programming'
    ]
];

@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Events') }}
        </h2>
    </x-slot>

    <x-dashboard-content>
        <div class="relative flex flex-col justify-center">
            <div class="flex flex-row w-full justify-between py-4">
                <x-primary-button>
                    {{ __('Create Event') }}
                </x-primary-button>
                <x-search-bar />
            </div>
            
            <x-event-table :events="$events" />

            <div class="mt-6 m-auto">
                <x-pagination :currentPage="2" :totalPages="5" />
            </div>
        </div>
    </x-dashboard-content>
</x-app-layout>
