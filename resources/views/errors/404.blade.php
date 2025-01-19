<x-guest-layout>
    <section class="bg-white dark:bg-gray-900 min-h-screen flex flex-col items-center justify-center">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm text-center">
                <h1 class="mb-4 text-7xl tracking-tight font-extrabold lg:text-9xl text-blue-600 dark:text-blue-500">404</h1>
                <p class="mb-4 text-3xl tracking-tight font-bold text-gray-900 md:text-4xl dark:text-white">Something's missing.</p>
                <p class="mb-4 text-lg font-light text-gray-500 dark:text-gray-400">Sorry, we can't find that page. You'll find lots to explore on the home page. </p>
                <x-primary-link href="{{ route('home') }}" class=" px-5 py-2.5 my-4">{{ __('Back to Homepage') }}</x-primary-link>
            </div>   
        </div>
    </section>
</x-guest-layout>