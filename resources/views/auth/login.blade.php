<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <x-application-logo class="h-12 my-8 fill-current text-gray-800 dark:text-gray-200" />
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        {{ __('Sign in to your account') }}
                    </h1>
                    <form class="space-y-4 md:space-y-6" method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="name@email.com" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')" />

                            <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                placeholder="••••••••"
                                required autocomplete="current-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Captcha -->
                        <div class="flex flex-col gap-2 mt-8 justify-start items-start">
                            <x-input-label :value="__('Captcha')">
                                <button type="button" class="text-red-500" class="reload" id="reload">
                                    &#x21bb;
                                </button>
                            </x-input-label>

                            <div class="flex flex-row gap-4 items-center">
                                <div class="col-md-6 captcha">
                                    <span>{!! captcha_img() !!}</span>
                                </div>

                                <x-text-input id="captcha" class="block mt-1 w-full max-w-40" type="text" name="captcha" required autofocus placeholder="Enter captcha" />
                                <x-input-error :messages="$errors->get('captcha')" class="mt-2" />
                            </div>
                        </div>

                        <div class="flex flex-row justify-between">
                            <!-- Remember Me -->
                            <div class="block">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                                </label>
                            </div>


                            @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                            @endif
                        </div>


                        <div class="flex mt-4 w-full">
                            <x-primary-button class="w-full">
                                {{ __('Log in') }}
                            </x-primary-button>
                        </div>

                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Don’t have an account yet? <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:underline dark:text-blue-500">Sign up</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            const reloadButton = document.getElementById('reload');

            reloadButton.addEventListener('click', function() {
                fetch('reload-captcha')
                    .then(response => response.json())
                    .then(data => {
                        document.querySelector(".captcha span").innerHTML = data.captcha;
                    })
                    .catch(error => console.error('Error:', error));
            });
        });
    </script>
</x-guest-layout>