<div class="w-full px-4 md:px-6 lg:px-10 py-8">
    <div class="max-w-screen-lg m-auto rounded-xl bg-white dark:bg-gray-800 px-4 py-6 lg:px-8 lg:py-12 border border-gray-200 dark:border-gray-700">
        <div class="flex flex-col w-full">
            <p class="text-gray-500 mb-4 sm:text-xl dark:text-gray-400 font-semibold">{{ \Carbon\Carbon::parse($event->date)->format('d F Y') }}</p>
            <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">{{ $event->title }}</h1>

            <!-- Registration -->
            @if($event->users->contains(auth()->user()))
                <div class="flex items-center p-4 mb-4 text-md font-medium text-green-800 rounded-lg bg-green-100 dark:bg-green-900 dark:text-green-400" role="alert">
                    <svg class="flex-shrink-0 inline size-6 me-3" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="currentColor">
                        <path d="M10.5213 2.62368C11.3147 1.75255 12.6853 1.75255 13.4787 2.62368L14.4989 3.74391C14.8998 4.18418 15.4761 4.42288 16.071 4.39508L17.5845 4.32435C18.7614 4.26934 19.7307 5.23857 19.6757 6.41554L19.6049 7.92905C19.5771 8.52388 19.8158 9.10016 20.2561 9.50111L21.3763 10.5213C22.2475 11.3147 22.2475 12.6853 21.3763 13.4787L20.2561 14.4989C19.8158 14.8998 19.5771 15.4761 19.6049 16.071L19.6757 17.5845C19.7307 18.7614 18.7614 19.7307 17.5845 19.6757L16.071 19.6049C15.4761 19.5771 14.8998 19.8158 14.4989 20.2561L13.4787 21.3763C12.6853 22.2475 11.3147 22.2475 10.5213 21.3763L9.50111 20.2561C9.10016 19.8158 8.52388 19.5771 7.92905 19.6049L6.41553 19.6757C5.23857 19.7307 4.26934 18.7614 4.32435 17.5845L4.39508 16.071C4.42288 15.4761 4.18418 14.8998 3.74391 14.4989L2.62368 13.4787C1.75255 12.6853 1.75255 11.3147 2.62368 10.5213L3.74391 9.50111C4.18418 9.10016 4.42288 8.52388 4.39508 7.92905L4.32435 6.41553C4.26934 5.23857 5.23857 4.26934 6.41554 4.32435L7.92905 4.39508C8.52388 4.42288 9.10016 4.18418 9.50111 3.74391L10.5213 2.62368Z" stroke="currentColor" stroke-width="1.5"></path>
                        <path d="M9 12L11 14L15 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-semibold">{{ __('Thank You') }}</span>, you have registered for <span class="font-semibold">{{ $event->title }}</span>! We would love for you to join us on <span class="font-semibold">{{ \Carbon\Carbon::parse($event->date)->format('d F Y') }}</span>. <a href="{{ route('profile.events') }}" class="underline">See all my events</a>
                    </div>
                </div>
            @else
            <form method="POST" action="{{ route('events.register', $event->id) }}" class="flex w-full p-4 py-8 border-2 border-dashed border-gray-300 rounded-lg dark:border-gray-600 ">
                @csrf    
                <button type="submit" class="w-full px-6 py-3.5 text-base font-medium text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-4 h-4 text-white me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                        <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
                        <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
                    </svg>
                    {{ __('Register this Event') }}
                </button>
            </form>
            @endif

            <!-- Location -->
            <h4 class="mt-4 text-lg lg:text-2xl font-bold text-gray-600 dark:text-white">{{ __('Location') }}</h4>
            <div class="inline-flex gap-2 text-md font-bold text-blue-600 dark:text-blue-500 mt-3.5">
                <svg class="size-5" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="currentColor"><path d="M20 10C20 14.4183 12 22 12 22C12 22 4 14.4183 4 10C4 5.58172 7.58172 2 12 2C16.4183 2 20 5.58172 20 10Z" stroke="currentColor" stroke-width="1.5"></path><path d="M12 11C12.5523 11 13 10.5523 13 10C13 9.44772 12.5523 9 12 9C11.4477 9 11 9.44772 11 10C11 10.5523 11.4477 11 12 11Z" fill="currentColor" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                <p>{{ $event->location }}</p>
            </div>

            <!-- About this event -->
            <h4 class="mt-10 text-lg lg:text-2xl font-bold mb-6 text-gray-600 dark:text-white">{{ __('About This Event') }}</h4>
            
            <x-rich-text-viewer content="{!! $event->description !!}"/>
        </div>
    </div>
</div>