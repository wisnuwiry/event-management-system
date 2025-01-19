<x-guest-layout>

    <section class="bg-white dark:bg-gray-900 m-auto mt-10 mx-4 lg:mx-10 rounded-3xl">
        @if (session('status') == 'verification-link-sent')
        <div class="p-8">
            <x-success-alert>
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </x-success-alert>
        </div>
        @endif

        <div class="gap-8 items-center py-8 px-4 mx-auto max-w-screen-xl xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6">
            <img class="w-full" src="/img/verification.svg">
            <div class="mt-4 md:mt-0">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">{{ __('Verify Your Email!') }}</h2>
                <p class="mb-6 font-light text-gray-500 md:text-lg dark:text-gray-400">{{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}</p>

                <div class="flex flex-row gap-2">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <x-primary-button>Resend Verification Email</x-primary-button>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-secondary-button type="submit">Log Out</x-secondary-button>
                    </form>
                </div>

            </div>
        </div>
    </section>
</x-guest-layout>