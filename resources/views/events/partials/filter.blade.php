<div class="px-4 mx-auto max-w-screen-xl py-8 flex flex-row gap-4">
    @foreach($categories as $category)
    <a href="{{ route('events', ['category' => $category->id, 'search' => request('search')]) }}"
        class="font-medium rounded-lg text-base px-6 py-2.5 text-center inline-flex justify-center items-center 
              {{ $activeFilterCategory === $category->id ? '' : 'text-gray-900 bg-white hover:bg-gray-100 hover:text-blue-700 border border-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:border-gray-600 dark:bg-gray-800' }}"
               @if( $activeFilterCategory === $category->id ) style="background: {{ $category->color}}4d; color:{{ $category->color}}; font-weight: bold; border:1.5px solid {{ $category->color}};" @endif>
        @if(isset($category->icon))
        <img src="{{ asset('storage/'. $category->icon) }}" alt="" class="size-4 mr-1" />
        @else
        <svg class="size-4 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="{{ $category->color }}" viewBox="0 0 18 18">
            <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"></path>
        </svg>
        @endif
        <span class="ml-2">{{ $category->name }}</span>
    </a>
    @endforeach
</div>