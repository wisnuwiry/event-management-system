<article class="w-full">
    <a href="{{ route('news.detail', $news->slug ) }}">
        <img src="{{ asset('storage/' . $news->thumbnail) }}" class="mb-5 rounded-lg w-full aspect-[29/19] object-cover min-h-[170px] bg-gray-200" alt="Image 1">
    </a>
    <p class="mb-4 text-gray-500 dark:text-gray-400">{{ \Carbon\Carbon::parse($news->published_at)->format('d F Y') }} • Read in {{ $news->getReadingTime() }} minutes</p>
    <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900 dark:text-white">
        <a href="{{ route('news.detail', $news->slug ) }}">{{ $news->title }}</a>
    </h2>
</article>