<div class="flex flex-col gap-4">
    <p class="text-gray-900 mb-4 text-xl font-bold dark:text-white">Registered Events</p>
    <div class="w-full overflow-x-scroll align-middle rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 rounded-lg">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">{{ __('Event') }}</th>
                    <th scope="col" class="px-6 py-3">{{ __('Registration ID') }}</th>
                    <th scope="col" class="px-6 py-3">{{ __('Register At') }}</th>
                    <th scope="col" class="px-6 py-3">{{ __('Action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        <img class="w-10 h-10 rounded-md object-cover" src="{{ asset('storage/' . $event->thumbnail) }}" alt="{{ $event['title'] }} image">
                        <div class="ps-3">
                            <div class="text-base font-semibold">{{ $event['title'] }}</div>
                        </div>
                    </th>
                    <td class="px-6 py-4">{{ $event->id }}</td>
                    <td class="px-6 py-4">{{ \Carbon\Carbon::parse($event->pivot->created_at)->format('Y/m/d H:i') }}</td>
                    <td class="px-6 py-4">
                        <a href="{{ route('admin.events.detail', $event->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ __('View') }}</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>