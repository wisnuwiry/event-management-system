<x-guest-layout>
<!-- Session Status -->
<x-auth-session-status class="mb-4" :status="session('status')" />

<section class="bg-gray-50 dark:bg-gray-900">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
    <x-application-logo class="h-12 my-8 fill-current text-gray-800 dark:text-gray-200"/>
      <div class="w-full p-6 bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md dark:bg-gray-800 dark:border-gray-700 sm:p-8">
          <h1 class="mb-1 text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
              {{ __('Forgot your password?') }}
          </h1>
          <p class="font-light text-gray-500 dark:text-gray-400">{{ __('No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
          </p>
          <form class="mt-4 space-y-4 lg:mt-5 md:space-y-5" action="{{ route('password.email') }}">
          @csrf
              <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="name@email.com" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
              </div>
              
              <div class="flex items-center justify-end mt-4">
                <x-primary-button class="w-full ">
                    {{ __('Email Password Reset Link') }}
                </x-primary-button>
            </div>
          </form>
      </div>
  </div>
</section>
</x-guest-layout>
