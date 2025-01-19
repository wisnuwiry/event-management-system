<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Jumbotron Slider') }}
        </h2>
    </x-slot>

    <x-dashboard-content>
        <div class="relative flex flex-toe justify-between pb-2 border-b border-b-gray-200 dark:border-b-gray-700">
            <h2 class="text-3xl tracking-tight font-bold text-gray-900 dark:text-white">{{ __('Sliders') }}</h2>
            <x-primary-button data-modal-target="upload-modal" data-modal-toggle="upload-modal">Upload Slider</x-primary-button>
        </div>

        <!-- Content -->
        <div class="p-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($data ?? [] as $item)
            <div class="relative">
                <form action="{{ route('admin.settings.slider.delete', $item->id) }}" method="POST" class="absolute top-4 right-4">
                    @csrf
                    @method('DELETE')
                    <button class="bg-white/20 rounded-full p-2 group">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white group-hover:text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                        </svg>
                </form>
                </button>
                <img src="{{ asset('storage/' . $item->image_url) }}" alt="" class="aspect-video max-w-md w-full h-auto object-cover rounded-lg">
            </div>
            @endforeach
        </div>
    </x-dashboard-content>

    <!-- Popup -->
    <div id="upload-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full max-w-2xl m-auto">
        <form class="relative p-4 w-full max-w-2xl max-h-full" action="{{ route('admin.settings.slider.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Upload Slider
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="upload-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <!-- Modal body -->
                <div class="flex items-center justify-center m-8">
                    <x-image-input id="image" />
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>

                <!-- Modal footer -->
                <div class="flex w-full justify-end items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <x-primary-button>Upload</x-primary-button>
                </div>
            </div>
        </form>
    </div>

</x-app-layout>