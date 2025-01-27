<div class="bg-white border border-gray-200 rounded-lg hover:shadow-md dark:bg-gray-900 dark:border-gray-700">
    <a href="{{ route('events.detail', $event->slug ) }}">
        <img class="rounded-t-lg aspect-[29/19] object-cover min-h-[170px] w-full bg-gray-200" src="{{ asset('storage/' . $event->thumbnail) }}" alt="{{ $event['title'] }} image" />
    </a>
    <div class="p-5 flex flex-col text-left">
        <p class="mb-2 text-gray-500 dark:text-gray-400">{{ \Carbon\Carbon::parse($event->date)->format('d F Y') }}</p>
        <a href="{{ route('events.detail', $event->slug ) }}">
            <h5 class="mb-2 text-lg font-semibold tracking-tight text-gray-900 dark:text-white">{{ $event->title }}</h5>
        </a>
        <p class="inline-flex gap-2 text-sm font-bold text-blue-600 dark:text-blue-500">
            <svg class="size-5" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="currentColor"><path d="M20 10C20 14.4183 12 22 12 22C12 22 4 14.4183 4 10C4 5.58172 7.58172 2 12 2C16.4183 2 20 5.58172 20 10Z" stroke="currentColor" stroke-width="1.5"></path><path d="M12 11C12.5523 11 13 10.5523 13 10C13 9.44772 12.5523 9 12 9C11.4477 9 11 9.44772 11 10C11 10.5523 11.4477 11 12 11Z" fill="currentColor" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
            <span>{{ $event->location }}</span>
        </p>
    </div>
</div>
