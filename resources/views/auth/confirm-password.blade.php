<x-guest-layout>
<section class="bg-gray-50 dark:bg-gray-900">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
    <x-application-logo class="h-12 my-8 fill-current text-gray-800 dark:text-gray-200"/>
      <div class="w-full p-6 bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md dark:bg-gray-800 dark:border-gray-700 sm:p-8">
          <p class="font-light text-gray-500 dark:text-gray-400">{{ __('This is a secure area of the application. Please confirm your password before continuing.') }}</p>
          <form class="mt-4 space-y-4 lg:mt-5 md:space-y-5" method="POST" action="{{ route('password.confirm') }}">
              <div>
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
              </div>
              <x-primary-button>
                {{ __('Confirm') }}
                </x-primary-button>
            </form>
      </div>
  </div>
</section>
</x-guest-layout>