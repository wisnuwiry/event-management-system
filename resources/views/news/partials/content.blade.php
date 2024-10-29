<div class="w-full px-4 md:px-6 lg:px-10 py-8">
    <div class="max-w-screen-lg m-auto rounded-xl bg-white dark:bg-gray-800 px-4 py-6 lg:px-8 lg:py-12 border border-gray-200 dark:border-gray-700">
        <div class="flex flex-col w-full">
            <p class="text-gray-500 mb-4 sm:text-xl dark:text-gray-400 font-semibold">{{ \Carbon\Carbon::parse($news->created_at)->format('d F Y') }} • {{ $news->getReadingTime() }} minutes</p>
            <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">{{ $news->title }}</h1>

            <x-rich-text-viewer content="{!! $news->content !!}"/>
        </div>
    </div>
</div>