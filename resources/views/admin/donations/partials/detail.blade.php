<section class="py-8 antialiased md:py-16">
  <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
    <div class="mx-auto max-w-3xl">
      @if ($donation->status == 'pending')
      <div class="gap-4 sm:flex sm:items-center">
        <x-secondary-button data-modal-target="reject-modal" data-modal-toggle="reject-modal" class="w-full justify-center hover:text-red-700 dark:hover:bg-red-700">{{ __('Reject') }}</x-secondary-button>
        <x-primary-button data-modal-target="approve-modal" data-modal-toggle="approve-modal" class="w-full">{{ __('Accept') }}</x-primary-button>
      </div>
      @endif

      <div class="mt-6 space-y-4 border-b border-t border-gray-200 py-8 dark:border-gray-700 sm:mt-8">
        <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Donor</h4>

        <div class="flex flex-row gap-4 items-center">
          @php
          $avatar = $donation->user->avatar;
          $defaultAvatar = 'avatars/default.png';
          @endphp
          <img class="size-12 rounded-full cursor-pointer object-cover" src="{{ asset('storage/' . ($avatar != null ? $avatar : $defaultAvatar)) }}">

          <dl>
            <dt class="text-base font-medium text-gray-900 dark:text-white">{{ $donation->user->name }}</dt>
            <dd class="mt-1 text-base font-normal text-gray-500 dark:text-gray-400">{{ $donation->user->email }}</dd>
          </dl>
        </div>

        <x-secondary-link class="items-center justify-center" href="{{ route('admin.users.detail', $donation->user->id) }}">
          {{ __('View') }}
          <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
          </svg>
        </x-secondary-link>
      </div>

      <div class="mt-6 sm:mt-8">
        <div class="mt-4 space-y-6">
          <h4 class="text-xl font-semibold text-gray-900 dark:text-white">{{ __('Donation Detail') }}</h4>

          <div class="space-y-4">
            <div class="space-y-2">
              <dl class="flex items-center justify-between gap-4">
                <dt class="text-gray-500 dark:text-gray-400">{{ __('Date') }}</dt>
                <dd class="text-base font-medium text-gray-900 dark:text-white">{{ $donation->created_at }}</dd>
              </dl>

              <dl class="flex items-center justify-between gap-4">
                <dt class="text-gray-500 dark:text-gray-400">{{ __('Account Name') }}</dt>
                <dd class="text-base font-medium text-green-500">{{ $donation->account_name }}</dd>
              </dl>

              <dl class="flex items-center justify-between gap-4">
                <dt class="text-gray-500 dark:text-gray-400">{{ __('Bank Name') }}</dt>
                <dd class="text-base font-medium text-gray-900 dark:text-white">{{ $donation->bank }}</dd>
              </dl>

              <dl class="flex items-center justify-between gap-4">
                <dt class="text-gray-500 dark:text-gray-400">{{ __('Status') }}</dt>
                <dd class="text-base font-medium text-gray-900 dark:text-white">
                  <div class="flex items-center">
                    <div class="h-2.5 w-2.5 rounded-full {{ $donation['status'] == 'pending' ? 'bg-yellow-500' : ($donation['status'] == 'complete' ? 'bg-green-500' : 'bg-red-500') }} me-2"></div>
                    {{ $donation['status'] }}
                  </div>
                </dd>
              </dl>
            </div>

            <dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
              <dt class="text-lg font-bold text-gray-900 dark:text-white">{{ __('Amount') }}</dt>
              <dd class="text-lg font-bold text-gray-900 dark:text-white">{{ Illuminate\Support\Number::currency($donation->amount, 'IDR', 'id') }}</dd>
            </dl>
          </div>

          @if ($donation->rejection_reason != null && $donation->status == 'invalid')
          <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-red-900/70 dark:text-red-400" role="alert">
            <span class="font-medium">{{ __('Rejected:') }}</span> {{ $donation->rejection_reason }}
          </div>
          @endif

          <!-- Event -->
          @if($donation->event)
          <p class="text-lg font-bold text-gray-900 dark:text-white">Event</p>
          <div class="flex flex-col items-start bg-blue-50 border border-gray-200 rounded-lg shadow-sm md:flex-row dark:border-gray-700 dark:bg-blue-900/50">
            <img class="object-cover w-full h-full md:max-w-xs md:aspect-video rounded-t-lg md:rounded-none md:rounded-s-lg" src="{{ asset('storage/' . $donation->event->thumbnail) }}" alt="">
            <div class="flex flex-col justify-between p-4 leading-normal">
              <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $donation->event->title }}</h5>
              <a href="{{ route('events.detail', $donation->event->slug ) }}" class="inline-flex items-center font-medium text-blue-600 dark:text-blue-500 hover:underline">
                View event
                <svg class="w-4 h-4 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
              </a>
            </div>
          </div>
          @endif

          <dl class="flex flex-col items-start justify-between gap-4">
            <dt class="text-lg font-bold text-gray-900 dark:text-white">{{ __('Receipt') }}</dt>
            <dd class="w-full flex items-center p-10 justify-center rounded-lg bg-gray-100 dark:bg-gray-700">
              <img src="{{ asset('storage/' . $donation->receipt) }}" class="object-fit max-w-full max-h-full object-center" alt="">
            </dd>
          </dl>
        </div>
      </div>
    </div>
    </form>
</section>

<!-- Reject modal -->
<div id="reject-modal" tabindex="-1" aria-hidden="true" class="antialiased fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-auto w-full max-h-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
  <div class="relative p-4 w-full max-w-md max-h-full">
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
      <!-- Modal header -->
      <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
          {{ __('Rejection Confirmation')}}
        </h3>
        <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
          </svg>
          <span class="sr-only">Close modal</span>
        </button>
      </div>
      <!-- Modal body -->
      <div class="p-4 md:p-5">
        <form class="space-y-4" method="POST" action="{{ route('admin.donations.reject', $donation->id) }}">
          @csrf
          @method('PATCH')
          <div>
            <label for="reason" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Reason') }}</label>
            <textarea id="reason" name="reason" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ __('Input reason rejection') }}" required></textarea>
          </div>

          <x-danger-button type="submit" class="w-full px-5 py-2.5 text-center rounded-lg text-sm justify-center">{{ __('Reject') }}</x-danger-button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Approve modal -->
<div id="approve-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative p-4 w-full max-w-2xl max-h-full">
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
      <!-- Modal header -->
      <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
          {{ __('Confirm Donation Approval') }}
        </h3>
        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="approve-modal">
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
          </svg>
          <span class="sr-only">Close modal</span>
        </button>
      </div>
      <!-- Modal body -->
      <div class="p-4 md:p-5 space-y-4">
        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
          {{ __('Are you sure you want to approve this donation?') }}
        </p>
      </div>
      <!-- Modal footer -->
      <div class="flex items-center justify-end p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
        <x-secondary-button data-modal-hide="approve-modal" type="button">{{ __('Cancel') }}</x-secondary-button>
        <form method="POST" action="{{ route('admin.donations.verify', $donation->id) }}">
          @csrf
          @method('PATCH')
          <x-primary-button data-modal-hide="approve-modal" type="submit">{{ __('Approve') }}</x-primary-button>
        </form>
      </div>
    </div>
  </div>
</div>