<div class="w-full overflow-x-scroll align-middle rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 rounded-lg">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">Name</th>
                <th scope="col" class="px-6 py-3">Amount</th>
                <th scope="col" class="px-6 py-3">Date</th>
                <th scope="col" class="px-6 py-3">Event</th>
                <th scope="col" class="px-6 py-3">Status</th>
                <th scope="col" class="px-6 py-3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($donations as $donation)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                    <div>
                        <div class="text-base font-semibold">{{ $donation->user->name }}</div>
                        <div class="font-normal text-gray-500">{{ $donation->user->email }}</div>
                    </div>
                </th>
                <td class="px-6 py-4">{{ Illuminate\Support\Number::currency($donation->amount, 'IDR', 'id') }}</td>
                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($donation->created_at)->format('Y/m/d H:i') }}</td>
                <td class="px-6 py-4">
                    @if ($donation->event)
                    <a href="/events/{{ $donation->event->slug }}" target="_blank" class="hover:underline">
                        {{ $donation->event->title }}
                    </a>
                    @else
                    -
                    @endif
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center">
                        <div class="h-2.5 w-2.5 rounded-full {{ $donation['status'] == 'pending' ? 'bg-yellow-500' : ($donation['status'] == 'complete' ? 'bg-green-500' : 'bg-red-500') }} me-2"></div>
                        {{ $donation['status'] }}
                    </div>
                </td>
                <td class="px-6 py-4">
                    <a href="{{ route('admin.donations.detail', $donation->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ __('View') }}</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>