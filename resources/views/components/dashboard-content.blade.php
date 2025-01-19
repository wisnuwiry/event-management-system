<div class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 bg-white dark:bg-gray-800 py-10 rounded-xl min-h-[00vh]">
        @if (session('success'))
        <x-success-alert>
            {{ session('success') }}
        </x-success-alert>
        @endif

        @if (session('error'))
        <x-error-alert>
            {{ session('error') }}
        </x-error-alert>
        @endif

        {{ $slot }}
    </div>
</div>