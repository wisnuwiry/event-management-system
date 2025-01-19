<form method="POST" enctype="multipart/form-data">
    @csrf
    <div class="flex flex-row w-full justify-between">
    <h2 class="mb-4 text-3xl tracking-tight font-bold text-gray-900 dark:text-white">{{ __('Jumbotron Sliders') }}</h2>
    <button type="button" class="py-2.5 px-5 me-2 mb-2 inline-flex items-center text-center text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
    <svg class="w-6 h-5 me-2 -ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
    </svg>    
        {{ __('Add') }}
    </button>
    </div>
    
    @if ($jumbotronImages ??= [])
    <div class="flex items-center justify-center w-full">
        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z" clip-rule="evenodd"/>
                </svg>

                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">{{ __('Click to add') }}</span></p>
                <p class="text-xs text-gray-500 dark:text-gray-400">{{ __('Create new slider item') }}</p>
            </div>
            <input id="dropzone-file" type="file" class="hidden" />
        </label>
    </div>
    @else
    <!-- Display Current Images -->
    <div class="mb-3">
        @foreach($jumbotronImages ?? [] as $image)
            <img src="{{ asset('storage/' . $image) }}" alt="Jumbotron Image" width="150">
        @endforeach
    </div>
    <button type="submit" class="btn btn-primary mt-4">Save Jumbotron</button>
    @endif
</form>