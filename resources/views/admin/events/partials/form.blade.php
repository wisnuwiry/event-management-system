@php
$isEdit = isset($event);
@endphp
<div class="mb-5 w-full">
    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Title') }} <x-required-indicator /></label>
    <input type="title" id="title" name="title" value="{{ old('title', $isEdit ? $event->title : '') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="{{ __('Insert Title') }}" required />
    <x-input-error :messages="$errors->get('title')" class="mt-2" />
</div>

<x-rich-text id="description" value="{{ old('description', $isEdit ? $event->description : '') }}"></x-rich-text>
<x-input-error :messages="$errors->get('description')" class="mt-2" />

<div class="mt-4 flex flex-col md:flex-row gap-4">
    <div class="flex-1">
        <p class="mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Thumbnail') }} <x-required-indicator /></p>
        <x-image-input id="thumbnail" isEdit="false" currentImage="{{ $isEdit ? $event->thumbnail : null }}" />
        <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
    </div>

    <div class="flex-1 flex flex-col gap-6">
        <div class="flex flex-col">
            <label class="mb-2 text-sm font-medium text-gray-900 dark:text-white" for="date">{{ __('Date') }} <x-required-indicator /></label>
            <div class="relative max-w-sm">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                    </svg>
                </div>
                @php
                $minDate = \Carbon\Carbon::today()->format('m/d/Y');
                $maxDate = \Carbon\Carbon::today()->addYear()->format('m/d/Y');
                @endphp

                <input id="date" name="date" datepicker value="{{ old('date', $isEdit ? $event->date->format('m/d/Y') : '') }}" datepicker-min-date="{{ $minDate }}" datepicker-max-date="{{ $maxDate }}" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
            </div>
            <x-input-error :messages="$errors->get('date')" class="mt-2" />
        </div>

        <div class="max-w-sm">
            <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
            <select id="category_id" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id', $isEdit? $event->category_id : '') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
        </div>

        <div class="flex flex-col">
            <p class="mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Location') }}</p>

            <div class="flex flex-row gap-2">
                <div class="flex items-center mb-4">
                    <input id="location-radio-1" type="radio" value="online" name="location_type" onclick="toggleLocationInput(true)" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                        {{ old('location', $isEdit ? $event->location : 'Online') == 'Online' ? 'checked' : '' }}>
                    <label for="location-radio-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Online</label>
                </div>

                <div class="flex items-center mb-4">
                    <input id="location-radio-2" type="radio" value="manual" name="location_type" onclick="toggleLocationInput(false)" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                        {{ old('location', $isEdit ? $event->location : 'Online') == 'Online' ? '' : 'checked' }}>
                    <label for="location-radio-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Physical Place</label>
                </div>
            </div>

            <!-- Location Input Field (Used for both Online and Manual) -->
            <input
                type="text"
                id="locationInput"
                name="location"
                value="{{ old('location', $isEdit ? $event->location : 'Online') }}"
                class="{{ old('location', $isEdit ? $event->location : 'Online') == 'Online' ? 'hidden' : '' }} max-w-sm shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" />
            <x-input-error :messages="$errors->get('location')" class="mt-2" />
        </div>
    </div>
</div>

<div class="pt-4 border-t border-t-gray-200 dark:border-t-gray-600 mt-10 flex justify-end">
    <x-primary-button type="submit">Save</x-primary-button>
</div>

<script>
    function toggleLocationInput(isOnline) {
        const locationInput = document.getElementById('locationInput');

        if (isOnline) {
            locationInput.required = false;
            locationInput.style.display = 'none';
            locationInput.value = 'Online';
        } else {
            locationInput.required = true;
            locationInput.placeholder = "Enter physical location";
            locationInput.style.display = 'block';
            locationInput.value = '';
        }
    }
</script>