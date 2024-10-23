<div class="w-full overflow-x-scroll align-middle rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 rounded-lg overflow-hidden">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">Title</th>
                <th scope="col" class="px-6 py-3">Published Date</th>
                <th scope="col" class="px-6 py-3">Status</th>
                <th scope="col" class="px-6 py-3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($news as $item)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                    <img class="w-10 h-10 rounded-full" src="{{ $item['thumbnail'] }}" alt="{{ $item['title'] }} image">
                    <div class="ps-3">
                        <div class="text-base font-semibold">{{ $item['title'] }}</div>
                    </div>  
                </th>
                <td class="px-6 py-4">{{ $item['published'] == true ?  $item['published'] : '-' }}</td>
                <td class="px-6 py-4">
                    <div class="flex items-center">
                    <div class="h-2.5 w-2.5 rounded-full {{ $item['published'] == true ? 'bg-green-500' : 'bg-gray-500' }} me-2"></div> 
                        {{ $item['published'] == true ? 'Published' : 'Draft' }}
                    </div>
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>