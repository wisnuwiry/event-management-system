<form method="POST" action="{{ route('admin.news.store') }}" class="mx-auto" enctype="multipart/form-data">
    @csrf
    <div class="mb-5 w-full">
        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('News Title') }}</label>
        <input type="title" id="title" name="title" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="{{ __('Insert News Title') }}" required />
    </div>

    <x-rich-text id="content" value=""></x-rich-text>

    <div class="mt-4 flex flex-row gap-4">
        <div class="flex-1">
            <p class="mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Thumbnail') }}</p>
            <x-image-input id="thumbnail" />
        </div>
        
        <div class="flex-1">
            <p class="mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Published') }}</p>
            <label class="inline-flex items-center mb-5 cursor-pointer">
                <input type="checkbox" value="0" name="published" class="sr-only peer">
                <span class="mr-3 text-sm font-medium text-gray-900 dark:text-gray-300">Draft</span>
                <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:w-5 after:h-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Publish</span>
            </label>
        </div>
    </div>
    
    <div class="pt-4 border-t border-t-gray-200 dark:border-t-gray-600 mt-10 flex justify-end">
        <x-primary-button type="submit">Save</x-primary-button>
    </div>
</form>