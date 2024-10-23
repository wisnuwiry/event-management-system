<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 rounded-lg overflow-hidden">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">Name</th>
            <th scope="col" class="px-6 py-3">Position</th>
            <th scope="col" class="px-6 py-3">Status</th>
            <th scope="col" class="px-6 py-3">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                <img class="w-10 h-10 rounded-full" src="{{ $user['image'] }}" alt="{{ $user['name'] }} image">
                <div class="ps-3">
                    <div class="text-base font-semibold">{{ $user['name'] }}</div>
                    <div class="font-normal text-gray-500">{{ $user['email'] }}</div>
                </div>  
            </th>
            <td class="px-6 py-4">{{ $user['position'] }}</td>
            <td class="px-6 py-4">
                <div class="flex items-center">
                    <div class="h-2.5 w-2.5 rounded-full {{ $user['status'] == 'Online' ? 'bg-green-500' : 'bg-red-500' }} me-2"></div> 
                    {{ $user['status'] }}
                </div>
            </td>
            <td class="px-6 py-4">
                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit user</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
