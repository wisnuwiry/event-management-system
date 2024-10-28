<aside aria-label="Related events" class="py-8 lg:py-24 dark:bg-gray-900">
  <div class="px-4 mx-auto max-w-screen-xl">
      <h2 class="mb-8 text-2xl font-bold text-gray-900 dark:text-white">{{ __('Related Events')}}</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 lg:grid-cols-4">
        @foreach ($relatedEvents as $event)
            <x-event-card :event="$event"/>
        @endforeach
     </div>
  </div>
</aside>