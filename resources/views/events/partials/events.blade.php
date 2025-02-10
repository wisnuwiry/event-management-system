<div class="py-24">
    <div class="px-4 mx-auto max-w-screen-xl">
        @if(request('search'))
            <p class="inline-block mb-2 text-3xl text-center font-bold mb-16 w-full tracking-tight text-gray-900 dark:text-white">Search results for "{{ $search }}"</p>
        @endif
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 lg:grid-cols-4">
            @foreach ($events as $event)
                <x-event-card :event="$event"/>
            @endforeach
        </div>
        <div class="mt-12 m-auto flex justify-center">
            <x-pagination :currentPage="$events->currentPage()" :totalPages="$events->lastPage()" />
        </div>
    </div>
</div>