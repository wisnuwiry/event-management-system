<div class="space-y-6">
    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">{{ __('My Donations') }}</h3>

    <div class="px-6 py-8 w-full overflow-x-scroll align-middle rounded-lg mt-4 rounded-lg border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 rounded-lg">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">{{ __('Event') }}</th>
                    <th scope="col" class="px-6 py-3">{{ __('Amount') }}</th>
                    <th scope="col" class="px-6 py-3">{{ __('Date') }}</th>
                    <th scope="col" class="px-6 py-3">{{ __('Status') }}</th>
                    <th scope="col" class="px-6 py-3">{{ __('Receipt') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($donations as $donation)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        @if($donation->event)
                        <a class="flex flex-row gap-1.5 items-center hover:underline cursor-pointer" href="{{ route('events.detail', $donation->event->slug) }}">
                            <img src="{{ asset('storage/' . $donation->event->thumbnail) }}" class="w-10 h-10 object-cover rounded-md" />
                            {{ $donation->event->title }}
                        </a>
                    </th>
                    @else
                    -
                    @endif
                    <td class="px-6 py-4">{{ Illuminate\Support\Number::currency($donation->amount, 'IDR', 'id') }}</td>
                    <td class="px-6 py-4">{{ \Carbon\Carbon::parse($donation->created_at)->format('Y/m/d H:i') }}</td>
                    <td>
                        <div class="flex items-center">
                            <div class="h-2.5 w-2.5 rounded-full {{ $donation['status'] == 'pending' ? 'bg-yellow-500' : ($donation['status'] == 'complete' ? 'bg-green-500' : 'bg-red-500') }} me-2"></div>
                            {{ $donation['status'] }}
                        </div>
                    </td>
                    <td>
                        <div class="flex flex-row gap-1.5 flex-wrap items-center">
                            <img src="{{ asset('storage/' . $donation->receipt) }}" class="w-10 h-10 object-cover rounded-md" />
                            <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" target="_blank" href="{{ asset('storage/' . $donation->receipt) }}">View</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>