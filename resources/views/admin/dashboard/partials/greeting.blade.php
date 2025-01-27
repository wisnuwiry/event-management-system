<div class="flex flex-row gap-4 w-full p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
    @php
    $avatar = $user->avatar;
    $defaultAvatar = 'avatars/default.png';
    @endphp
    <img class="rounded-full w-24 h-24" src="{{ asset('storage/' . ($avatar != null ? $avatar : $defaultAvatar)) }}">
    
    <div class="flex flex-col mt-2">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">👋 Welcome Back, {{ $user->name }}</h5>
        <p class="font-normal text-gray-700 dark:text-gray-400">Your events and donations are making a difference! Here’s what’s happening today</p>
    </div>
</div>