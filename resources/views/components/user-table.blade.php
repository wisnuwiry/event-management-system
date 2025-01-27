<div class="w-full overflow-x-scroll align-middle rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 rounded-lg">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">{{ __('Name') }}</th>
                <th scope="col" class="px-6 py-3">{{ __('Role') }}</th>
                <th scope="col" class="px-6 py-3">{{ __('NIK') }}</th>
                <th scope="col" class="px-6 py-3">{{ __('Active Until') }}</th>
                <th scope="col" class="px-6 py-3">{{ __('Action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                    @php
                        $avatar = $user->avatar;
                        $defaultAvatar = 'avatars/default.png';
                    @endphp
                    <img class="w-10 h-10 rounded-full" src="{{ asset('storage/' . ($avatar != null ? $avatar : $defaultAvatar)) }}" alt="{{ $user['name'] }} image">
                    <div class="ps-3">
                        <div class="text-base font-semibold">{{ $user['name'] }}</div>
                        <div class="font-normal text-gray-500">{{ $user['email'] }}</div>
                    </div>  
                </th>
                <td class="px-6 py-4">{{ $user['role'] }}</td>
                <td class="px-6 py-4">{{ $user['nik'] }}</td>
                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($user['expired_date'])->format('Y/m/d H:i') }}</td>
                <td class="px-6 py-4">
                    <a href="{{ route('admin.users.detail', $user->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ __('View') }}</a>
                    @if (Auth::user()->id != $user->id)
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ __('Edit') }}</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>