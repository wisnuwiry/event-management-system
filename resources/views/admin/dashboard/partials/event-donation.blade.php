<div class="flex flex-col lg:flex-row gap-4">
    <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
        <div class="flex flex-row justify-between w-full">
            <p class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">🌟 Top Performing Event</p>
            <a href="{{ route('admin.events') }}" class="inline-flex items-center font-medium text-blue-600 dark:text-blue-500 hover:underline">
                View All
                <svg class="w-4 h-4 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
        </div>

        <!-- Table -->
        <div class="w-full overflow-x-scroll align-middle rounded-lg mt-8">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 rounded-lg">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">{{ __('Event') }}</th>
                        <th scope="col" class="px-6 py-3">{{ __('Total Donations') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($topDonatedEvents as $event)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                            <img class="w-6 h-6 rounded-md object-cover" src="{{ asset('storage/' . $event->thumbnail) }}" alt="{{ $event['title'] }} image">
                            <div class="ps-1">
                                <a class="text-sm font-medium hover:text-blue-500 hover:underline" href="{{ route('admin.events.detail', $event->id) }}">{{ $event['title'] }}</a>
                            </div>
                        </th>
                        <td class="px-6 py-4">{{ Illuminate\Support\Number::currency($event->total_donations ?? '0', 'IDR', 'id') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
        <div class="flex flex-row justify-between w-full">
            <p class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">🎉 Latest Donations</p>
            <a href="{{ route('admin.donations') }}" class="inline-flex items-center font-medium text-blue-600 dark:text-blue-500 hover:underline">
                View All
                <svg class="w-4 h-4 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
        </div>

        <!-- Table -->
        <div class="w-full overflow-x-scroll align-middle rounded-lg mt-4">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 rounded-lg">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">{{ __('User') }}</th>
                        <th scope="col" class="px-6 py-3">{{ __('Status') }}</th>
                        <th scope="col" class="px-6 py-3">{{ __('Amount') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($latestDonations as $donation)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            <a href="{{ route('admin.donations.detail', $donation->id) }}">{{ $donation->user->name }}</a>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="h-2.5 w-2.5 rounded-full {{ $donation['status'] == 'pending' ? 'bg-yellow-500' : ($donation['status'] == 'complete' ? 'bg-green-500' : 'bg-red-500') }} me-2"></div>
                                {{ $donation['status'] }}
                            </div>
                        </td>
                        <td class="px-6 py-4">{{ Illuminate\Support\Number::currency($donation->amount, 'IDR', 'id') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>