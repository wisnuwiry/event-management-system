<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">

  <!-- Total Donations -->
  <div class="block p-6 bg-white border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700">
    <div class="text-blue-500 rounded-full size-12 bg-blue-50 dark:bg-blue-900 flex">
      <svg class="w-6 h-6 m-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
        <path d="M20 7h-.7c.229-.467.349-.98.351-1.5a3.5 3.5 0 0 0-3.5-3.5c-1.717 0-3.215 1.2-4.331 2.481C10.4 2.842 8.949 2 7.5 2A3.5 3.5 0 0 0 4 5.5c.003.52.123 1.033.351 1.5H4a2 2 0 0 0-2 2v2a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V9a2 2 0 0 0-2-2Zm-9.942 0H7.5a1.5 1.5 0 0 1 0-3c.9 0 2 .754 3.092 2.122-.219.337-.392.635-.534.878Zm6.1 0h-3.742c.933-1.368 2.371-3 3.739-3a1.5 1.5 0 0 1 0 3h.003ZM13 14h-2v8h2v-8Zm-4 0H4v6a2 2 0 0 0 2 2h3v-8Zm6 0v8h3a2 2 0 0 0 2-2v-6h-5Z" />
      </svg>
    </div>

    <h5 class="mt-6 mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">{{ Illuminate\Support\Number::currency($totalDonations, 'IDR', 'id') }}</h5>
    <p class="font-normal text-gray-700 dark:text-gray-400">Total Donations</p>
  </div>

  <!-- Total Events -->
  <div class="block p-6 bg-white border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700">
    <div class="text-blue-500 rounded-full size-12 bg-blue-50 dark:bg-blue-900 flex">
      <svg class="w-6 h-6 m-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
        <path fill-rule="evenodd" d="M5 8a1 1 0 0 1 1 1v3a4.006 4.006 0 0 0 4 4h4a4.006 4.006 0 0 0 4-4V9a1 1 0 1 1 2 0v3.001A6.006 6.006 0 0 1 14.001 18H13v2h2a1 1 0 1 1 0 2H9a1 1 0 1 1 0-2h2v-2H9.999A6.006 6.006 0 0 1 4 12.001V9a1 1 0 0 1 1-1Z" clip-rule="evenodd" />
        <path d="M7 6a4 4 0 0 1 4-4h2a4 4 0 0 1 4 4v5a4 4 0 0 1-4 4h-2a4 4 0 0 1-4-4V6Z" />
      </svg>

    </div>

    <h5 class="mt-6 mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $totalEvents }}</h5>
    <p class="font-normal text-gray-700 dark:text-gray-400">Total Events</p>
  </div>

  <!-- Total News -->
  <div class="block p-6 bg-white border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700">
    <div class="text-blue-500 rounded-full size-12 bg-blue-50 dark:bg-blue-900 flex">
      <svg class="w-6 h-6 m-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
        <path fill-rule="evenodd" d="M5 3a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h11.5c.07 0 .14-.007.207-.021.095.014.193.021.293.021h2a2 2 0 0 0 2-2V7a1 1 0 0 0-1-1h-1a1 1 0 1 0 0 2v11h-2V5a2 2 0 0 0-2-2H5Zm7 4a1 1 0 0 1 1-1h.5a1 1 0 1 1 0 2H13a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h.5a1 1 0 1 1 0 2H13a1 1 0 0 1-1-1Zm-6 4a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H7a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H7a1 1 0 0 1-1-1ZM7 6a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H7Zm1 3V8h1v1H8Z" clip-rule="evenodd" />
      </svg>

    </div>

    <h5 class="mt-6 mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $totalNews }}</h5>
    <p class="font-normal text-gray-700 dark:text-gray-400">Total News</p>
  </div>


  <!-- Total Users -->
  <div class="block p-6 bg-white border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700">
    <div class="text-blue-500 rounded-full size-12 bg-blue-50 dark:bg-blue-900 flex">
      <svg class="w-6 h-6 m-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
        <path fill-rule="evenodd" d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z" clip-rule="evenodd" />
      </svg>

    </div>

    <h5 class="mt-6 mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $totalUsers }}</h5>
    <p class="font-normal text-gray-700 dark:text-gray-400">Total Users</p>
  </div>

</div>