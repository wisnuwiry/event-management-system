<section class="bg-gray-50 dark:bg-gray-800 border-t border-b border-gray-100 dark:border-gray-700">
    <div class="mx-auto max-w-screen-xl px-4 py-8 mx-auto lg:py-24 lg:text-center">
    <h2 class="mb-10 text-2xl font-bold tracking-tight text-gray-900 lg:font-extrabold lg:text-4xl lg:leading-snug dark:text-white lg:text-center 2xl:px-48">{{ __('Popular Events') }}</h2>
    
    <!-- Events -->
     <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 lg:grid-cols-4">
        @foreach ($popularEvents as $event)
            <x-event-card :event="$event"/>
        @endforeach
     </div>


    <div class="w-full flex flex-row justify-center">
        <x-primary-link class="mt-10 inline-flex items-center" :href="route('events')">
            {{ __('View All') }}
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </x-primary-button>
    </div>
    </div>
</section>