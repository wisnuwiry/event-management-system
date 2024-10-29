<div class="py-24">
    <div class="px-4 mx-auto max-w-screen-xl">
        @if(request('search'))
            <p class="inline-block mb-2 text-3xl text-center font-bold mb-16 w-full tracking-tight text-gray-900 dark:text-white">Search results for "{{ $search }}"</p>
        @endif
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 lg:grid-cols-4">
            @foreach ($news as $item)
                <x-news-card :news="$item"/>
            @endforeach
        </div>
        <div class="mt-12 m-auto flex justify-center">
            <x-pagination :currentPage="$news->currentPage()" :totalPages="$news->lastPage()" />
        </div>
    </div>
</div>