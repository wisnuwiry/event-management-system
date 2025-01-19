<footer class="bg-white dark:bg-gray-900">
    <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <div class="flex flex-col gap-4 max-w-[300px]">
                <a href="/" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                    <img src="/logo_compact.png" class="size-32" />
                </a>
                <p class="text-md text-gray-500 dark:text-gray-400">Street AMD, Tanjung Harapan Alley, Taman Kavling Mandiri Sejahtera B11, Palembang, South Sumatra, Indonesia, 30151</p>

                <!-- Contact -->
                <div class="flex flex-col gap-2 border-l border-l-gray-200 dark:border-l-gray-700 pl-4 mt-6">
                    <div class="flex flex-row gap-2">
                        <svg class="size-5 text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z" clip-rule="evenodd" />
                        </svg>
                        <span class="dark:text-gray-300">Palembang, Indonesia</span>
                    </div>
                    <div class="flex flex-row gap-2">
                        <svg class="size-5 text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M7.978 4a2.553 2.553 0 0 0-1.926.877C4.233 6.7 3.699 8.751 4.153 10.814c.44 1.995 1.778 3.893 3.456 5.572 1.68 1.679 3.577 3.018 5.57 3.459 2.062.456 4.115-.073 5.94-1.885a2.556 2.556 0 0 0 .001-3.861l-1.21-1.21a2.689 2.689 0 0 0-3.802 0l-.617.618a.806.806 0 0 1-1.14 0l-1.854-1.855a.807.807 0 0 1 0-1.14l.618-.62a2.692 2.692 0 0 0 0-3.803l-1.21-1.211A2.555 2.555 0 0 0 7.978 4Z" />
                        </svg>

                        <span class="dark:text-gray-300">081271103018</span>
                    </div>
                    <div class="flex flex-row gap-2">
                        <svg class="size-5 text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M5.024 3.783A1 1 0 0 1 6 3h12a1 1 0 0 1 .976.783L20.802 12h-4.244a1.99 1.99 0 0 0-1.824 1.205 2.978 2.978 0 0 1-5.468 0A1.991 1.991 0 0 0 7.442 12H3.198l1.826-8.217ZM3 14v5a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-5h-4.43a4.978 4.978 0 0 1-9.14 0H3Zm5-7a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm0 2a1 1 0 0 0 0 2h8a1 1 0 1 0 0-2H8Z" clip-rule="evenodd" />
                        </svg>

                        <span class="dark:text-gray-300">info@adsii.or.id</span>
                    </div>
                </div>
            </div>
            <div class="lg:border-l lg:border-l-gray-200 lg:dark:border-l-gray-700 flex flex-1 flex-col md:flex-row gap-8 flex-wrap lg:p-8 items-start">
                <div class="flex flex-col flex-1">
                    <h5 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Menu</h5>
                    <ul class="flex flex-col gap-2 text-md font-medium text-gray-500 sm:mb-0 dark:text-gray-400 mt-4">
                        <li>
                            <a href="https://adsii.or.id/" class="hover:underline me-4 md:me-6">ADSII</a>
                        </li>
                        <li>
                            <a href="https://adsii.or.id/about-us/" class="hover:underline me-4 md:me-6">About</a>
                        </li>
                        <li>
                            <a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="#" class="hover:underline me-4 md:me-6">Licensing</a>
                        </li>
                        <li>
                            <a href="https://adsii.or.id/contact/" class="hover:underline">Contact</a>
                        </li>
                    </ul>
                </div>

                <div class="flex flex-col flex-1">
                    <h5 class="text-lg font-semibold text-gray-700 dark:text-gray-200">ADSII Publication</h5>
                    <ul class="flex flex-col gap-2 text-md font-medium text-gray-500 sm:mb-0 dark:text-gray-400 mt-4">
                        @foreach ($journals as $journal)
                        <li class="flex flex-row gap-2 items-center">
                            <svg class="w-5 h-5 text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20 14h-2.722L11 20.278a5.511 5.511 0 0 1-.9.722H20a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1ZM9 3H4a1 1 0 0 0-1 1v13.5a3.5 3.5 0 1 0 7 0V4a1 1 0 0 0-1-1ZM6.5 18.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2ZM19.132 7.9 15.6 4.368a1 1 0 0 0-1.414 0L12 6.55v9.9l7.132-7.132a1 1 0 0 0 0-1.418Z" />
                            </svg>

                            <a href="{{ $journal->link }}" class="hover:underline me-4 md:me-6">{{ $journal->name }}</a>
                        </li>
                        @endforeach

                    </ul>
                </div>

                <div class="flex flex-col flex-1">
                    <h5 class="text-lg font-semibold text-gray-700 dark:text-gray-200">University Partners</h5>
                    <ul class="flex flex-col gap-2 text-md font-medium text-gray-500 sm:mb-0 dark:text-gray-400 mt-4">
                        @foreach ($partners as $partner)
                        <li class="flex flex-row gap-2 items-center">
                            <svg class="w-5 h-5 text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M10.915 2.345a2 2 0 0 1 2.17 0l7 4.52A2 2 0 0 1 21 8.544V9.5a1.5 1.5 0 0 1-1.5 1.5H19v6h1a1 1 0 1 1 0 2H4a1 1 0 1 1 0-2h1v-6h-.5A1.5 1.5 0 0 1 3 9.5v-.955a2 2 0 0 1 .915-1.68l7-4.52ZM17 17v-6h-2v6h2Zm-6-6h2v6h-2v-6Zm-2 6v-6H7v6h2Z" clip-rule="evenodd" />
                                <path d="M2 21a1 1 0 0 1 1-1h18a1 1 0 1 1 0 2H3a1 1 0 0 1-1-1Z" />
                            </svg>

                            <a href="{{ $partner->link }}" class="hover:underline me-4 md:me-6">{{ $partner->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a href="/" class="hover:underline">{{ config('app.name', 'Laravel') }}</a>. All Rights Reserved.</span>
    </div>
</footer>