<aside id="sidebar" class="hidden h-full w-80 shrink-0 overflow-y-auto border border-gray-200 bg-white p-3 shadow-sm dark:border-gray-700 dark:bg-gray-800 lg:block lg:rounded-lg">
    <button type="button" class="dark:hover-bg-gray-700 mb-3 flex w-full items-center justify-between rounded-lg bg-white p-2 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700" type="button">
        <span class="sr-only">Open user menu</span>
        <div class="flex w-full items-center justify-between">
            <div class="flex items-center">
                @php
                $avatar = Auth::user()->avatar;
                $defaultAvatar = 'avatars/default.png';
                @endphp
                <img src="{{ asset('storage/' . ($avatar != null ? $avatar : $defaultAvatar)) }}" class="mr-3 h-8 w-8 rounded-md" alt="Bonnie avatar" />
                <div class="text-left">
                    <div class="mb-0.5 font-semibold leading-none text-gray-900 dark:text-white">{{ Auth::user()->name }}</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400">{{ Auth::user()->email }}</div>
                </div>
            </div>
        </div>
    </button>

    <ul class="space-y-2">
        <li>
            <a href="{{ route('profile.events') }}" class="group flex items-center rounded-lg p-2 text-base font-medium text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                <svg class="h-6 w-6 text-gray-400 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h6l2 4m-8-4v8m0-8V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v9h2m8 0H9m4 0h2m4 0h2v-4m0 0h-5m3.5 5.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm-10 0a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />
                </svg>
                <span class="ml-3">{{ __('My Events') }}</span>
            </a>
        </li>

    </ul>
    <ul class="mt-5 space-y-2 border-t border-gray-100 pt-5 dark:border-gray-700">
        <li>
            <form action="{{ route('logout') }}" method="POST" class="group flex items-center rounded-lg p-2 text-base font-medium text-red-600 hover:bg-red-100 dark:text-red-500 dark:hover:bg-gray-700">
                @csrf
                <svg class="h-6 w-6 flex-shrink-0 text-red-600 transition duration-75 dark:text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2" />
                </svg>
                <button type="submit" class="ml-3 text-left flex-1 whitespace-nowrap">{{ __('Log out') }}</span>
            </form>
        </li>
    </ul>
</aside>