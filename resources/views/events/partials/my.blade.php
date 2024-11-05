<div class="space-y-6">
    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">{{ __('My Events') }}</h3>

    <div class="divide-y divide-gray-200 overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm dark:divide-gray-700 dark:border-gray-700 dark:bg-gray-800">
      @foreach ($events as $event)
        <div class="flex items-center gap-8 p-6 sm:items-start lg:items-center">
          <div class="min-w-0 flex-1 gap-14 xl:flex xl:items-center">
          <div class="min-w-0 max-w-xl flex-1 gap-6 sm:flex sm:items-center">
              <div class="mb-4 flex aspect-square h-24 w-24 shrink-0 items-center sm:mb-0">
              <img class="h-auto h-full w-full object-cover rounded-lg" src="{{ asset('storage/' . $event->thumbnail) }}" alt="{{ $event['title'] }} image" />
              </div>
              <a href="{{ route('events.detail', $event->slug) }}" class="mt-4 font-medium text-gray-900 hover:underline dark:text-white sm:mt-0">{{ $event->title }}</a>
          </div>

          <div class="mt-4 flex shrink-0 flex-col gap-2 sm:flex-row sm:justify-between md:items-center xl:mt-0 xl:flex-col xl:items-start">
              <dl class="flex items-center gap-2.5">
              <dt class="text-base font-normal text-gray-500 dark:text-gray-400 xl:w-36">{{ __('Registration ID')}}:</dt>
              <dd class="text-base font-normal text-gray-500 dark:text-gray-400">
                  {{ $event->pivot->id }}
              </dd>
              </dl>
              <dl class="flex items-center gap-2.5">
              <dt class="text-base font-normal text-gray-500 dark:text-gray-400 xl:w-36">{{ __('Registration Date')}}:</dt>
              <dd class="text-base font-normal text-gray-500 dark:text-gray-400">
                  {{  \Carbon\Carbon::parse($event->pivot->created_at)->format('d/m/Y') }}
              </dd>
              </dl>
              <dl class="flex items-center gap-2.5">
              <dt class="text-base font-normal text-gray-500 dark:text-gray-400 xl:w-36">{{ __('Event Date')}}:</dt>
              <dd class="text-base font-bold text-green-500 dark:text-green-400">
                  {{  \Carbon\Carbon::parse($event->date)->format('d/m/Y') }}
              </dd>
              </dl>
          </div>
          </div>
        </div>
      @endforeach
    </div>
</div>