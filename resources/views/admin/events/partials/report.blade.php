<div class="mx-auto flex flex-col py-4">
    <p class="text-gray-900 mb-4 text-xl font-bold dark:text-white">Donations</p>
    <dl class="w-full text-gray-900 dark:text-white flex flex-col md:flex-row gap-6 justify-between p-8 border border-gray-200 rounded-lg dark:border-gray-700 dark:bg-gray-900">
        <div class="flex flex-col flex-wrap items-center justify-center text-green-500">
            <dt class="mb-2 text-2xl md:text-3xl font-extrabold">{{ Illuminate\Support\Number::currency($validDonations, 'IDR', 'id') }}</dt>
            <dd class="font-medium">Valid Donations</dd>
        </div>
        <div class="flex flex-col items-center justify-center text-yellow-600">
            <dt class="mb-2 text-2xl md:text-3xl font-extrabold">{{ Illuminate\Support\Number::currency($pendingDonations, 'IDR', 'id') }}</dt>
            <dd class="font-medium">Pending Donations</dd>
        </div>
        <div class="flex flex-col items-center justify-center">
            <dt class="mb-2 text-2xl md:text-3xl font-extrabold">{{ Illuminate\Support\Number::currency($totalDonations, 'IDR', 'id') }}</dt>
            <dd class="font-medium text-gray-500 dark:text-gray-400">Total Donations </dd>
        </div>
        <div class="flex flex-col items-center justify-center">
            <dt class="mb-2 text-2xl md:text-3xl font-extrabold">{{ $totalItemsDonations }}</dt>
            <dd class="font-medium text-gray-500 dark:text-gray-400">Total Items Donations</dd>
        </div>
    </dl>

    <div class="w-full overflow-x-scroll align-middle rounded-lg mt-4">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 rounded-lg">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">{{ __('Name') }}</th>
                    <th scope="col" class="px-6 py-3">{{ __('Amount') }}</th>
                    <th scope="col" class="px-6 py-3">{{ __('Date') }}</th>
                    <th scope="col" class="px-6 py-3">{{ __('Status') }}</th>
                    <th scope="col" class="px-6 py-3">{{ __('Action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($donations as $donation)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        <div>
                            <div class="text-base font-semibold">{{ $donation->user->name }}</div>
                            <div class="font-normal text-gray-500">{{ $donation->user->email }}</div>
                        </div>
                    </th>
                    <td class="px-6 py-4">{{ Illuminate\Support\Number::currency($donation->amount, 'IDR', 'id') }}</td>
                    <td class="px-6 py-4">{{ \Carbon\Carbon::parse($donation->created_at)->format('Y/m/d H:i') }}</td>
                    <td>
                        <div class="flex items-center">
                            <div class="h-2.5 w-2.5 rounded-full {{ $donation['status'] == 'pending' ? 'bg-yellow-500' : ($donation['status'] == 'complete' ? 'bg-green-500' : 'bg-red-500') }} me-2"></div>
                            {{ $donation['status'] }}
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('admin.donations.detail', $donation->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ __('View') }}</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="mx-auto flex flex-col py-4">
    <p class="text-gray-900 mb-2 text-xl font-bold dark:text-white">Registered Users</p>

    <div class="w-full overflow-x-scroll align-middle rounded-lg mt-4">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 rounded-lg">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">{{ __('Name') }}</th>
                    <th scope="col" class="px-6 py-3">{{ __('Email') }}</th>
                    <th scope="col" class="px-6 py-3">{{ __('Register At') }}</th>
                    <th scope="col" class="px-6 py-3">{{ __('Action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($registeredUsers as $user)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        @php
                        $avatar = $user->avatar;
                        $defaultAvatar = 'avatars/default.png';
                        @endphp
                        <img class="w-10 h-10 rounded-full" src="{{ asset('storage/' . ($avatar != null ? $avatar : $defaultAvatar)) }}" alt="{{ $user['name'] }} image">
                        <div class="ps-3">
                            <div class="text-base font-semibold">{{ $user['name'] }}</div>
                        </div>
                    </th>
                    <td class="px-6 py-4">{{ $user['email'] }}</td>
                    <td class="px-6 py-4">{{ \Carbon\Carbon::parse($user->pivot->created_at)->format('Y/m/d H:i') }}</td>
                    <td class="px-6 py-4">
                        <a href="{{ route('admin.users.detail', $user->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ __('View') }}</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>