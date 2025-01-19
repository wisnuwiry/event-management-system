@php
$isEdit = isset($bank);
@endphp

<div class="mb-5 w-full">
    <label for="account_holder" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Account Holder') }} <x-required-indicator/></label>
    <input type="account_holder" id="account_holder" name="account_holder" value="{{ old('account_holder', $isEdit ? $bank->account_holder : '') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="{{ __('Account Holder') }}" required />
    <x-input-error :messages="$errors->get('account_holder')" class="mt-2" />
</div>

<div class="mb-5 w-full">
    <label for="bank_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Bank Name') }} <x-required-indicator/></label>
    <input type="bank_name" id="bank_name" name="bank_name" value="{{ old('bank_name', $isEdit ? $bank->bank_name : '') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="{{ __('Bank Name') }}" required />
    <x-input-error :messages="$errors->get('bank_name')" class="mt-2" />
</div>

<div class="mb-5 w-full">
    <label for="account_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Bank Account Number') }} <x-required-indicator/></label>
    <input type="account_number" id="account_number" name="account_number" value="{{ old('account_number', $isEdit ? $bank->account_number : '') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="{{ __('Bank Account Number') }}" required />
    <x-input-error :messages="$errors->get('account_number')" class="mt-2" />
</div>


<div class="pt-4 border-t border-t-gray-200 dark:border-t-gray-600 mt-10 flex justify-end">
    <x-primary-button type="submit">Save</x-primary-button>
</div>