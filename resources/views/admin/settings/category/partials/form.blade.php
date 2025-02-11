@php
$isEdit = isset($category);
@endphp
<div class="flex flex-row gap-4">
    <div class="w-full flex-1">
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Category Name') }} <x-required-indicator /></label>
        <input type="name" id="name" name="name" value="{{ old('name', $isEdit ? $category->name : '') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="{{ __('Category Name') }}" required />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <div class="w-full flex-1">
        <label for="color" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Color') }} <x-required-indicator /></label>
        <input type="color" id="color" name="color" value="{{ old('color', $isEdit ? $category->color : '') }}" class="p-1 h-10 w-14 block bg-white border border-gray-200 cursor-pointer rounded-lg disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700" required />
        <x-input-error :messages="$errors->get('color')" class="mt-2" />
    </div>
</div>

<div class="mt-4 flex flex-row gap-4">
    <div class="flex-1">
        <p class="mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Icon') }}</p>
        <x-image-input id="icon" isEdit="false" currentImage="{{ $isEdit ? $category->icon : null }}" />
        <x-input-error :messages="$errors->get('icon')" class="mt-2" />
    </div>
</div>

<div class="pt-4 border-t border-t-gray-200 dark:border-t-gray-600 mt-10 flex justify-end">
    <x-primary-button type="submit">Save</x-primary-button>
</div>