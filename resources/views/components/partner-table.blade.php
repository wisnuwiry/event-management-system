<div x-data="{ confirmDelete: false, itemId: null }" class="w-full overflow-x-scroll align-middle rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 rounded-lg overflow-hidden">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">University Name</th>
                <th scope="col" class="px-6 py-3">Website</th>
                <th scope="col" class="px-6 py-3">Created At</th>
                <th scope="col" class="px-6 py-3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($partners as $item)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                    <img class="w-10 h-10 rounded-md" src="{{ asset('storage/' . $item->image) }}" alt="{{ $item['name'] }} image">
                    <div class="ps-3">
                        <div class="text-base font-semibold">{{ $item['name'] }}</div>
                    </div>  
                </th>
                <td class="px-6 py-4"><a href="{{ $item['link'] }}" target="_blank" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ $item['link'] }}</a></td>
                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($item->created_at)->format('Y/m/d H:i') }}</td>
                <td class="px-6 py-4 gap-2">
                    <a href="{{ route('admin.settings.partner.edit', $item->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ __('Edit') }}</a>
                    
                    <!-- Delete Button with Modal Trigger -->
                    <button @click="confirmDelete = true; itemId = {{ $item['id'] }}" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <!-- Delete Confirmation Modal -->
    <div x-show="confirmDelete" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white p-6 rounded-lg shadow-lg dark:bg-gray-700">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Confirm Delete</h2>
            <p class="text-sm text-gray-500 dark:text-gray-400">Are you sure you want to delete this partner?</p>
            <div class="flex flex-row gap-2 justify-end mt-6">
                <x-secondary-button @click="confirmDelete = false">{{ __('Cancel') }}</x-sedondary-button>
                <form method="POST" :action="`/admin/settings/partner/${itemId}`" x-ref="deleteForm">
                    @csrf
                    @method('DELETE')
                    <x-danger-button type="submit">{{ __('Delete') }}</x-danger-button>
                </form>
            </div>
        </div>
    </div>
</div>
