<section class="bg-white dark:bg-gray-900">
    <div class="relative max-w-screen-xl px-4 py-16 mx-auto lg:py-24 overflow-hidden">
        <div class="flex flex-col gap-5">
            @php $chunks = array_chunk($partners->toArray(), 4); @endphp
            @foreach ($chunks as $rowPartners)
            <div class="flex flex-row flex-nowrap animate-scroll-left hover:pause-animation gap-5">
                @foreach ($rowPartners as $partner)
                <a href="{{ $partner['link'] }}" class="flex flex-row rounded-lg gap-2 p-2 pr-6 items-center bg-gray-100 dark:bg-gray-800 dark:border-gray-600 flex-shrink-0">
                    <img src="{{ asset('storage/' . $partner['image']) }}" alt="{{ $partner['name'] }}" class="size-16 p-2 object-contain">
                    <h3 class="w-full text-sm min-w-30 text-gray-900 dark:text-white">{{ $partner['name'] }}</h3>
                </a>
                @endforeach
                @foreach ($rowPartners as $partner)
                <a href="{{ $partner['link'] }}" class="flex flex-row rounded-lg gap-2 p-2 pr-6 items-center bg-gray-100 dark:bg-gray-800 dark:border-gray-600 flex-shrink-0">
                    <img src="{{ asset('storage/' . $partner['image']) }}" alt="{{ $partner['name'] }}" class="size-16 p-2 object-contain">
                    <h3 class="w-full text-sm min-w-30 text-gray-900 dark:text-white">{{ $partner['name'] }}</h3>
                </a>
                @endforeach
            </div>
            @endforeach
        </div>
        <div class="absolute h-full left-0 top-0 w-48 bg-gradient-to-r from-white to-transparent dark:from-gray-900 z-30"></div>
        <div class="absolute h-full right-0 top-0 w-48 bg-gradient-to-l from-white to-transparent dark:from-gray-900 z-30"></div>
    </div>
</section>