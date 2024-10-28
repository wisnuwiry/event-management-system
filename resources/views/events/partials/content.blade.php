<div class="w-full px-4 md:px-6 lg:px-10 py-8">
    <div class="max-w-screen-xl m-auto rounded-xl bg-white dark:bg-gray-800 px-4 py-6 lg:px-8 lg:py-12 border border-gray-200 dark:border-gray-700">
        <div class="flex flex-col w-full">
            <p class="text-gray-500 mb-4 sm:text-xl dark:text-gray-400 font-semibold">{{ \Carbon\Carbon::parse($event->date)->format('d F Y') }}</p>
            <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">{{ $event->title }}</h1>

            <!-- Registration -->
            <div class="flex w-full p-4 py-8 border-2 border-dashed border-gray-300 rounded-lg dark:border-gray-600 ">
                <button type="button" class="w-full px-6 py-3.5 text-base font-medium text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-4 h-4 text-white me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                        <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
                        <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
                    </svg>
                    {{ __('Register this Event') }}
                </button>
            </div>

            <!-- Location -->
            <h4 class="mt-4 text-lg lg:text-2xl font-bold text-gray-600 dark:text-white">{{ __('Location') }}</h4>
            <div class="inline-flex gap-2 text-md font-bold text-blue-600 dark:text-blue-500 mt-3.5">
                <svg class="size-5" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="currentColor"><path d="M20 10C20 14.4183 12 22 12 22C12 22 4 14.4183 4 10C4 5.58172 7.58172 2 12 2C16.4183 2 20 5.58172 20 10Z" stroke="currentColor" stroke-width="1.5"></path><path d="M12 11C12.5523 11 13 10.5523 13 10C13 9.44772 12.5523 9 12 9C11.4477 9 11 9.44772 11 10C11 10.5523 11.4477 11 12 11Z" fill="currentColor" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                <p>{{ $event->location }}</p>
            </div>

            <!-- About this event -->
            <h4 class="mt-10 text-lg lg:text-2xl font-bold mb-6 text-gray-600 dark:text-white">{{ __('About This Event') }}</h4>
            
            <x-rich-text-viewer content="{!! $event->description !!}"/>
        </div>
    </div>
</div>