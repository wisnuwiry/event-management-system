<div x-data="{ confirmDelete: false, eventId: null }" class="w-full overflow-x-scroll align-middle rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 rounded-lg overflow-hidden">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">Title</th>
                <th scope="col" class="px-6 py-3">Date & Time</th>
                <th scope="col" class="px-6 py-3">Location</th>
                <th scope="col" class="px-6 py-3">Status</th>
                <th scope="col" class="px-6 py-3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                    <img class="w-10 h-10 rounded-md" src="{{ asset('storage/' . $event->thumbnail) }}" alt="{{ $event['title'] }} image">
                    <div class="ps-3">
                        <div class="text-base font-semibold">{{ $event['title'] }}</div>
                    </div>  
                </th>
                <td class="px-6 py-4">{{ $event['date'] }}</td>
                <td class="px-6 py-4">{{ $event['location'] }}</td>
                <td class="px-6 py-4">
                    <div class="flex items-center">
                    @php
                        $now = now(); // Get the current date and time
                        $eventDate = \Carbon\Carbon::parse($event['date']); // Parse the event date
                        $status = $eventDate->isFuture() ? 'Pending' : 'Finished'; // Set status based on the event date
                        $color = $eventDate->isFuture() ? 'bg-yellow-500' : 'bg-orange-500'; // Set color based on the event date
                    @endphp

                    <div class="h-2.5 w-2.5 rounded-full {{ $color }} me-2"></div>
                    {{ $status }}
                    </div>
                </td>
                <td class="px-6 py-4 gap-2 justify-center items-center h-full">
                    <a href="{{ route('admin.events.edit', $event->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    <!-- Delete Button with Modal Trigger -->
                    <button @click="confirmDelete = true; eventId = {{ $event['id'] }}" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Delete Confirmation Modal -->
    <div x-show="confirmDelete" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white p-6 rounded-lg shadow-lg dark:bg-gray-700">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Confirm Delete</h2>
            <p class="text-sm text-gray-500 dark:text-gray-400">Are you sure you want to delete this event item?</p>
            <div class="flex flex-row gap-2 justify-end mt-6">
                <x-secondary-button @click="confirmDelete = false">{{ __('Cancel') }}</x-sedondary-button>
                <form method="POST" :action="`/admin/events/${eventId}/delete`" x-ref="deleteForm">
                    @csrf
                    @method('DELETE')
                    <x-danger-button type="submit">{{ __('Delete') }}</x-danger-button>
                </form>
            </div>
        </div>
    </div>
</div>