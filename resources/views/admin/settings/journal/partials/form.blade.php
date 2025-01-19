@php
$isEdit = isset($journal);
@endphp
<div class="mb-5 w-full">
    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Journal Name') }} <x-required-indicator/></label>
    <input type="name" id="name" name="name" value="{{ old('name', $isEdit ? $journal->name : '') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="{{ __('Journal Name') }}" required />
    <x-input-error :messages="$errors->get('name')" class="mt-2" />
</div>

<div class="mb-5 w-full">
    <label for="url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('URL') }} <x-required-indicator/></label>
    <input type="url" id="url" name="url" value="{{ old('url', $isEdit ? $journal->url : '') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="{{ __('URL') }}" required />
    <x-input-error :messages="$errors->get('url')" class="mt-2" />
</div>

<div class="pt-4 border-t border-t-gray-200 dark:border-t-gray-600 mt-10 flex justify-end">
    <x-primary-button type="submit">Save</x-primary-button>
</div>