<x-admin-layout>
    <h1 class="text-4xl font-normal leading-normal mt-0 mb-2 text-neutral-800">Hello, {{ strtoupper(auth()->user()->name) }}</h1>

    <div class="flex flex-wrap space-x-4">
        <div
            class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6 mb-5 p-8 max-w-sm bg-indigo-300 rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Total Number of Post</h5>
            <p class="font-normal text-gray-700 dark:text-gray-600">{{ $postCount }}</p>
        </div>

        <div
            class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6 mb-5 p-8 max-w-sm bg-indigo-300 rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Total Number of Todays Post</h5>
            <p class="font-normal text-gray-700 dark:text-gray-400">{{ $todayCount }}</p>
        </div>

        <div
            class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6 mb-5 p-8 max-w-sm bg-indigo-300 rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Number of Users</h5>
            <p class="font-normal text-gray-700 dark:text-gray-400">{{ $usersCount }}</p>
        </div>

      </div>




</x-admin-layout>
