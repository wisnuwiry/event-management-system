<nav class="mb-4 flex" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        @foreach($items as $index => $item)
            <li class="inline-flex items-center">
                @if($index > 0)
                    <div class="flex items-center">
                        <svg class="mx-1 h-4 w-4 text-gray-400 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7" />
                        </svg>
                    </div>
                @endif
                <a href="{{ $item['url'] }}" class="inline-flex items-center text-sm font-medium {{ $index === count($items) - 1 ? 'text-gray-500 dark:text-gray-400' : 'text-gray-700 hover:text-blue-700 dark:text-gray-400 dark:hover:text-white' }}">
                    {{ $item['label'] }}
                </a>
            </li>
        @endforeach
    </ol>
</nav>
