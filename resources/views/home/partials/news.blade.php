<section class="py-8 dark:bg-gray-900 lg:py-24">
    <div class="px-4 mx-auto max-w-screen-xl lg:px-4 lg:text-center">
    <h2 class="mb-10 text-2xl font-bold tracking-tight text-gray-900 lg:font-extrabold lg:text-4xl lg:leading-snug dark:text-white lg:text-center 2xl:px-48">{{ __('Our Blog') }}</h2>
    
    <!-- Events -->
     <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 lg:grid-cols-4">
        @foreach (range(1, 4) as $i)
            <x-news-card />
        @endforeach
     </div>


    <div class="w-full flex flex-row justify-center">
        <x-primary-button class="mt-10 inline-flex items-center">
            {{ __('View All') }}
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </x-primary-button>
    </div>
    </div>
</section>