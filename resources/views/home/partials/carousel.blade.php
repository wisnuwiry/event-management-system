<div class="w-full">
    <div id="indicators-carousel" class="m-auto relative w-full aspect-[10/8] md:aspect-[20/9]" data-carousel="static">
        <!-- Carousel wrapper -->
        <div class="relative overflow-hidden w-full h-full">
            @foreach ($carousels as $carousel)
            <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                <img src="{{ asset('storage/'.$carousel->image_url) }}" class="absolute block w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-cover" alt="...">
            </div>
            @endforeach
        </div>

        <!-- Overlay -->
        <div class="absolute w-full h-full bg-gradient-to-b from-transparent to-black/70 top-0 z-30"></div>

        <!-- Slider indicators -->
        <div class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2">
            @foreach ($carousels as $index => $carousel)
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" data-carousel-slide-to="{{ $index }}"></button>
            @endforeach
        </div>

        <div class="absolute top-0 z-30 w-full h-full">
            <div class="max-w-screen-2xl m-auto px-2 md:px-6 lg:px-10 w-full h-full flex flex-row justify-between items-center">
                <!-- Slider controls -->
                <button type="button" class="flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>

                <!-- CTA/Search Form -->
                <div class="flex flex-col max-w-5xl w-full">
                    <!-- Greeting -->
                    <div class="flex flex-col gap-4 mb-4 lg:mb-10 items-center w-full">
                        <div class="text-sm px-4 py-1 font-medium text-gray-700 bg-gray-100/60 border border-gray-200 rounded-full dark:bg-gray-800/60 dark:text-white dark:border-gray-400">
                            ADSII Events
                        </div>
                        <h2 class="text-xl md:text-2xl lg:text-5xl xl:text-6xl font-bold text-white text-center max-w-2xl">Discover, Learn, and Connect</h2>
                        <h5 class="text-md lg:text-xl font-medium text-neutral-200 text-center">Explore a wide range of academic events, from workshops and conferences to scientific discussions. Stay ahead in your field and expand your knowledge with ADSII.</h5>
                    </div>

                    <!-- Form -->
                    <div class="w-full bg-white/80 border border-neutral-300 py-4 px-5 lg:px-8 rounded-2xl dark:bg-black/80 dark:border-neutral-700">
                        <p class="text-md font-semibold mb-2 text-gray-900 dark:text-white">Start Now</p>

                        <form class="flex flex-row gap-3 items-start md:items-center w-full mx-auto">
                            <label for="voice-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-4 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Find an Events..." required />
                            </div>
                            <button type="submit" class="inline-flex items-center py-2.5 px-3 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-4 h-4 md:me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg><span class="hidden md:block">Search</span>
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Slider Control -->
                <button type="button" class="flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>