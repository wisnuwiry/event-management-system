<div class="flex flex-col items-start bg-white border border-gray-200 rounded-lg shadow-sm md:flex-row dark:border-gray-700 dark:bg-gray-800">
    <img class="object-cover w-full h-full md:max-w-sm md:aspect-video rounded-t-lg md:rounded-none md:rounded-s-lg" src="{{ asset('storage/' . $event->thumbnail) }}" alt="">
    <div class="flex flex-col justify-between p-4 leading-normal">
        <p class="mb-3 font-medium text-blue-700 dark:text-blue-400 flex flex-row gap-2">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path d="M20 7h-.7c.229-.467.349-.98.351-1.5a3.5 3.5 0 0 0-3.5-3.5c-1.717 0-3.215 1.2-4.331 2.481C10.4 2.842 8.949 2 7.5 2A3.5 3.5 0 0 0 4 5.5c.003.52.123 1.033.351 1.5H4a2 2 0 0 0-2 2v2a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V9a2 2 0 0 0-2-2Zm-9.942 0H7.5a1.5 1.5 0 0 1 0-3c.9 0 2 .754 3.092 2.122-.219.337-.392.635-.534.878Zm6.1 0h-3.742c.933-1.368 2.371-3 3.739-3a1.5 1.5 0 0 1 0 3h.003ZM13 14h-2v8h2v-8Zm-4 0H4v6a2 2 0 0 0 2 2h3v-8Zm6 0v8h3a2 2 0 0 0 2-2v-6h-5Z" />
            </svg>

            You donated to this event
        </p>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ \Carbon\Carbon::parse($event->date)->format('d F Y') }} - at {{ $event->location }}</p>
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $event->title }}</h5>
    </div>
</div>