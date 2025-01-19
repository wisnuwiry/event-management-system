<x-guest-layout>
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <x-application-logo class="h-12 my-8 fill-current text-gray-800 dark:text-gray-200" />
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-screen-lg xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        {{ __('Create your Account') }}
                    </h1>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">{{ __('Start your website in seconds. Already have an account? ') }}<a class="font-medium text-blue-600 hover:underline dark:text-blue-500" href="{{ route('login') }}">
                            {{ __('Login here.') }}
                        </a>
                    </p>
                    <form method="POST" action="{{ route('register') }}" class="pt-6">
                        @csrf

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                            <!-- Name -->
                            <div class="mt-4">
                                <x-input-label for="name" :value="__('Name')"><x-required-indicator /></x-input-label>
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Insert your name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <!-- Email Address -->
                            <div class="mt-4">
                                <x-input-label for="email" :value="__('Email')"><x-required-indicator /></x-input-label>
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="name@email.com" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- NIK -->
                            <div class="mt-4">
                                <x-input-label for="nik" :value="__('NIK')"><x-required-indicator /></x-input-label>
                                <x-text-input id="nik" class="block mt-1 w-full" type="text" name="nik" type="number" :value="old('nik')" required autofocus placeholder="Insert your NIK" />
                                <x-input-error :messages="$errors->get('nik')" class="mt-2" />
                            </div>

                            <!-- Phone -->
                            <div class="mt-4">
                                <x-input-label for="phone" :value="__('Phone Number')"><x-required-indicator /></x-input-label>
                                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus placeholder="Insert your Phone Number" />
                                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                            </div>

                            <!-- Password -->
                            <div class="mt-4">
                                <x-input-label for="password" :value="__('Password')"><x-required-indicator /></x-input-label>

                                <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    placeholder="••••••••"
                                    required autocomplete="new-password" />

                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Confirm Password -->
                            <div class="mt-4">
                                <x-input-label for="password_confirmation" :value="__('Confirm Password')"><x-required-indicator /></x-input-label>

                                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    placeholder="••••••••"
                                    name="password_confirmation" required autocomplete="new-password" />
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>
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

                        <div class="flex items-center justify-end mt-8">
                            <x-primary-button class="">
                                {{ __('Register') }}
                            </x-primary-button>
                        </div>
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