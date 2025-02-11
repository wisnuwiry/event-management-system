<p class="text-gray-900 mb-4 text-2xl font-bold dark:text-white">Profile</p>
<div class="flex flex-row items-start gap-8">
    @php
    $avatar = $user->avatar;
    $defaultAvatar = 'avatars/default.png';
    @endphp
    <div class="flex flex-col gap-4">
        <img class="rounded-xl w-48 h-48 object-cover" src="{{ asset('storage/' . ($avatar != null ? $avatar : $defaultAvatar)) }}">
        <a href="{{ route('admin.users.edit', $user->id) }}" class="text-center py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Edit</a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 gap-x-8">
        <div class="flex flex-col gap">
            <p class="text-md text-gray-500 dark:text-gray-400">Name</p>
            <p class="text-xl font-semibold text-gray-900 dark:text-white">{{ $user->name }}</p>
        </div>

        <div class="flex flex-col gap">
            <p class="text-md text-gray-500 dark:text-gray-400">Phone</p>
            <p class="text-xl font-semibold text-gray-900 dark:text-white">{{ $user->phone }}</p>
        </div>

        <div class="flex flex-col gap">
            <p class="text-md text-gray-500 dark:text-gray-400">Email</p>
            <p class="text-xl font-semibold text-gray-900 dark:text-white">{{ $user->email }}</p>
        </div>
        <div class="flex flex-col gap">
            <p class="text-md text-gray-500 dark:text-gray-400">NIK</p>
            <p class="text-xl font-semibold text-gray-900 dark:text-white">{{ $user->nik }}</p>
        </div>

        <div class="flex flex-col gap">
            <p class="text-md text-gray-500 dark:text-gray-400">Role</p>
            <p class="text-xl font-semibold text-gray-900 dark:text-white">{{ $user->role }}</p>
        </div>
    </div>
</div>