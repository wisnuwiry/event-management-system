<section class="py-8 bg-gray-50 dark:bg-gray-800 lg:py-24">
    <div class="px-4 mx-auto max-w-screen-xl lg:px-4 lg:text-center">
    <h2 class="mb-4 text-2xl font-bold tracking-tight text-gray-900 lg:font-extrabold lg:text-4xl lg:leading-snug dark:text-white lg:text-center 2xl:px-48">{{ __('New Events') }}</h2>
    <p class="mb-10 text-lg font-normal text-gray-500 dark:text-gray-400 lg:text-center lg:text-xl lg:mb-16">
        {{ __('Ready for adventure and meeting a new community? Explore a selection of interesting events and updates directly from us.') }}
    </p>

    <!-- Events -->
     <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 lg:grid-cols-4">
        @foreach ($latestEvents as $event)
            <x-event-card :event="$event"/>
        @endforeach
     </div>


    <div class="w-full flex flex-row justify-center">
        <x-primary-link class="mt-10 inline-flex items-center" :href="route('events')">
            {{ __('View All') }}
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </x-primary-link>
    </div>
    </div>
</section>