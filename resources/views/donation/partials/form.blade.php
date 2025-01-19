<section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
  <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
    <div class="mx-auto max-w-5xl">
      <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">{{ __('Donation') }}</h2>

      <div class="flex items-center p-4 my-4 text-md text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800" role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">{{ __('Info') }}</span>
        <div>
          {{ __('Donations are optional, these donation funds are used for foundation operations. You can skip this step.') }}
        </div>
      </div>

      <div class="mt-6 sm:mt-8 lg:flex lg:items-start lg:gap-12">
      <div class="mt-6 grow sm:mt-8 lg:mt-0 mb-8">
          <div class="space-y-4 rounded-lg border border-gray-100 bg-gray-50 p-6 dark:border-gray-700 dark:bg-gray-800">
            <dl class="flex flex-col gap-4 border-b border-gray-200 pb-2 dark:border-gray-700">
              <dt class="text-base font-bold text-gray-900 dark:text-white">{{ __('Account Number List') }}</dt>

              <p class="text-base font-normal text-gray-500 dark:text-gray-400">{{ __('You can transfer donation funds to one of the accounts below') }}</p>
            </dl>
            <div class="space-y-2">
              @foreach ($bankAccounts as $bankAccount)
              <dl class="flex items-center justify-between gap-4">
                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">{{ $bankAccount->bank_name }}</dt>
                <dd class="text-base font-medium text-gray-900 dark:text-white">{{ $bankAccount->account_number }}</dd>
              </dl>
              @endforeach
            </div>
          </div>
        </div>
        <form action="{{ route('donation.store') }}" method="POST" enctype="multipart/form-data" class="w-full rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6 lg:max-w-xl lg:p-8">
          @csrf
          <input type="hidden" name="previous" value="{{ $previousUrl }}">
          <div class="mb-6 grid grid-cols-2 gap-4">
            <div class="col-span-2">
              <p class="mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Receipt') }}<x-required-indicator/></p>
              <x-image-input id="receipt" isEdit="false"/>
              <x-input-error :messages="$errors->get('receipt')" class="mt-2" />
            </div>

            <div class="col-span-2">
              <label for="amount" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Amount<x-required-indicator/> </label>
              <input id="amount" name="amount" type="number" value="{{ old('amount') }}" aria-describedby="helper-text-explanation" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ __('Enter the amount you are transferring') }}" required />
              <x-input-error :messages="$errors->get('amount')" class="mt-2" />
            </div>

            <div class="col-span-2 sm:col-span-1">
              <label for="account_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Account Name') }}<x-required-indicator/></label>
              <input type="account_name" id="account_name" name="account_name" value="{{ old('account_name') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="{{ __('Enter Account Name') }}" required />
              <x-input-error :messages="$errors->get('account_name')" class="mt-2" />
            </div>

            <div class="col-span-2 sm:col-span-1">
              <label for="bank" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Bank Name') }}<x-required-indicator/></label>
              <input type="bank" id="bank" name="bank" value="{{ old('bank') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="{{ __('Enter Bank Name') }}" required />
              <x-input-error :messages="$errors->get('bank')" class="mt-2" />
            </div>
            
          </div>

          <div class="w-full flex flex-row justify-end border-t pt-8">
            <x-secondary-link href="{{ $previousUrl }}" class="px-16 border-none">{{ __('Skip') }}</x-secondary-link>
            <x-primary-button type="submit" class="px-16">{{ __('Save') }}</x-primary-button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
