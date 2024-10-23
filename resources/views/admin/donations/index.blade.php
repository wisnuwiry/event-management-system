@php
$users = [
    [
        'name' => 'Neil Sims',
        'email' => 'neil.sims@flowbite.com',
        'position' => 'React Developer',
        'status' => 'Online',
        'image' => '/docs/images/people/profile-picture-1.jpg',
    ],
    [
        'name' => 'Bonnie Green',
        'email' => 'bonnie@flowbite.com',
        'position' => 'Designer',
        'status' => 'Online',
        'image' => '/docs/images/people/profile-picture-3.jpg',
    ],
    [
        'name' => 'Jese Leos',
        'email' => 'jese@flowbite.com',
        'position' => 'Vue JS Developer',
        'status' => 'Online',
        'image' => '/docs/images/people/profile-picture-2.jpg',
    ],
    [
        'name' => 'Thomas Lean',
        'email' => 'thomes@flowbite.com',
        'position' => 'UI/UX Engineer',
        'status' => 'Online',
        'image' => '/docs/images/people/profile-picture-5.jpg',
    ],
    [
        'name' => 'Leslie Livingston',
        'email' => 'leslie@flowbite.com',
        'position' => 'SEO Specialist',
        'status' => 'Offline',
        'image' => '/docs/images/people/profile-picture-4.jpg',
    ],
];
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Donations') }}
        </h2>
    </x-slot>

    <x-dashboard-content>
        <div class="relative flex flex-col justify-center">
            <div class="flex flex-row w-full justify-between py-4">
                <div></div>
                <x-search-bar />
            </div>
            
            <x-user-table :users="$users" />

            <div class="mt-6 m-auto">
                <x-pagination :currentPage="2" :totalPages="5" />
            </div>
        </div>
    </x-dashboard-content>
</x-app-layout>
