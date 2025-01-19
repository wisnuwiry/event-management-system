<section class="border-t border-b border-gray-100 dark:border-gray-700">
    <div class="max-w-screen-xl px-4 py-8 mx-auto lg:py-24">
        <h2 class="mb-6 text-3xl font-extrabold leading-tight tracking-tight text-gray-900 lg:text-center dark:text-white md:text-4xl">University Partners</h2>
        <p class="mb-10 text-lg font-normal text-gray-500 dark:text-gray-400 lg:text-center lg:text-xl lg:px-64 lg:mb-16">At ADSII, we are proud to collaborate with leading universities from across Indonesia and around the globe.</p>
        <div class="space-y-4 sm:grid sm:grid-cols-2 lg:grid-cols-4 sm:gap-4 xl:gap-8 sm:space-y-0 md:mt-12">
            @foreach ($partners as $partner)
            <a href="{{ $partner->link }}" class="block px-8 py-12 text-center bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-600 hover:shadow-lg dark:hover:shadow-lg-light">
                <img src="{{ asset('storage/' . $partner->image) }}" alt="{{ $partner->name }}" class="w-16 h-16 mx-auto">
                <h3 class="font-semibold text-xl text-gray-900 dark:text-white mt-3.5">{{ $partner->name }}</h3>
            </a>
            @endforeach
        </div>
    </div>
</section>