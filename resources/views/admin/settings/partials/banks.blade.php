<form  method="POST" class="mb-8">
    @csrf
    <div class="flex flex-row justify-between w-full">
    <h2 class="mb-4 text-3xl tracking-tight font-bold text-gray-900 dark:text-white">{{ __('Bank Accounts') }}</h2>
    <button type="button" data-modal-target="create-bank-modal" data-modal-toggle="create-bank-modal" class="py-2.5 px-5 me-2 mb-2 inline-flex items-center text-center text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
    <svg class="w-6 h-5 me-2 -ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
    </svg>    
        {{ __('Add') }}
    </button>
    </div>
   

    @if (is_null($bankAccounts) || empty($bankAccounts))
    <div class="flex items-center justify-center w-full" data-modal-target="create-bank-modal" data-modal-toggle="create-bank-modal">
        <label class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z" clip-rule="evenodd"/>
                </svg>

                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">{{ __('Click to add') }}</span></p>
                <p class="text-xs text-gray-500 dark:text-gray-400">{{ __('Create new bank account donation') }}</p>
            </div>
        </label>
    </div>
    @else
    <div class="pt-8 border-t border-gray-200 dark:border-gray-700">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            {{ __('Bank Name') }}
                        </th>
                        <th scope="col" class="px-6 py-3">
                            {{ __('Account Number') }}
                        </th>
                        <th scope="col" class="px-6 py-3">
                            {{ __('Account Holder') }}
                        </th>
                        <th scope="col" class="px-6 py-3">
                            {{ __('Action') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($bankAccounts ?? [] as $index => $account)
                    <tr>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $account->bank_name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $account->account_number }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $account->account_holder }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ __('Edit') }}</a>
                            <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline">{{ __('Delete') }}</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
</form>


<!-- Modal Create Bank Account -->
<div id="create-bank-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    {{ __('Create New Bank Account')}}
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="create-bank-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" method="POST" action="{{ route('admin.settings.bank-account.store') }}">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="bank_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Bank Name')}} <x-required-indicator/></label>
                        <x-text-input id="bank_name" name="bank_name" placeholder="{{ __('Insert Bank Name') }}" required/>
                    </div>
                    <div class="col-span-2">
                        <label for="account_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Account Numbers')}} <x-required-indicator/></label>
                        <x-text-input id="account_number" name="account_number" placeholder="{{ __('Insert Account Number') }}" type="number" required/>
                    </div>
                    <div class="col-span-2">
                        <label for="account_holder" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Account Holder')}} <x-required-indicator/></label>
                        <x-text-input id="account_holder" name="account_holder" placeholder="{{ __('Insert Account Holder') }}" required/>
                    </div>
                </div>
                <div class="flex flex-row w-full items-end justify-end">
                    <x-primary-button type="submit">{{ __('Save') }}</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</div> 
