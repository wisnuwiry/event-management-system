<form method="post" action="{{ route('admin.users.update', $user->id) }}" enctype="multipart/form-data" class="mt-6 space-y-4">
    @csrf
    @method('patch')

    <div class="grid grid-cols-2 gap-6">

        <div class="col-span-2">
            <x-input-label for="avatar" :value="__('Avatar')" />
            <x-image-input id="avatar" class="mt-2 rounded-full" currentImage="{{ $user->avatar }}" />
            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
        </div>

        <div class="col-span-2 sm:col-span-1">
            <x-input-label for="name" :value="__('Name')"><x-required-indicator /></x-input-label>
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div class="col-span-2 sm:col-span-1">
            <x-input-label for="email" :value="__('Email')"><x-required-indicator /></x-input-label>
            <x-text-input id="email" name="email" readonly type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div class="col-span-2 sm:col-span-1">
            <x-input-label for="nik" :value="__('NIK')"><x-required-indicator /></x-input-label>
            <x-text-input id="nik" class="block mt-1 w-full" type="text" name="nik" type="number" :value="old('nik', $user->nik)" required autofocus placeholder="Insert your NIK" />
            <x-input-error :messages="$errors->get('nik')" class="mt-2" />
        </div>

        <div class="col-span-2 sm:col-span-1">
            <x-input-label for="phone" :value="__('Whatsapp')"><x-required-indicator /></x-input-label>
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone', $user->phone)" required autofocus placeholder="Insert your Whatsapp" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <div class="col-span-2 sm:col-span-1">
            <x-input-label for="password" :value="__('Password')"></x-input-label>
            <x-text-input id="password" class="block mt-1 w-full" type="text" name="password" autofocus placeholder="Insert Password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
    </div>

    <div class="pt-4 border-t border-t-gray-200 dark:border-t-gray-600 mt-10 flex justify-end">
        <x-primary-button type="submit">Save</x-primary-button>
    </div>
</form>