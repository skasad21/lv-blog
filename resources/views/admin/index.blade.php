<x-admin-layout>
    <h1 class="text-4xl font-normal leading-normal mt-0 mb-2 text-neutral-800">Hello,
        {{ strtoupper(auth()->user()->name) }}</h1>

    <div class="flex ml-8 flex-wrap space-x-7">
        <div
            class="transition ease-in-out delay-100 hover:-translate-y-1 hover:scale-110 w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6 mb-5 p-8 max-w-sm bg-violet-400 rounded-lg border border-gray-200 shadow-md hover:bg-purple-400 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Number of Category</h5>
            <p class="font-normal text-gray-700 dark:text-gray-600">{{ $caegoryCount }}</p>
        </div>

        <div
            class="transition ease-in-out delay-100 hover:-translate-y-1 hover:scale-110 w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6 mb-5 p-8 max-w-sm bg-pink-400 rounded-lg border border-gray-200 shadow-md hover:bg-purple-400 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Number of Post</h5>
            <p class="font-normal text-gray-700 dark:text-gray-600">{{ $postCount }}</p>
        </div>

        <div
            class="transition ease-in-out delay-100 hover:-translate-y-1 hover:scale-110 w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6 mb-5 p-8 max-w-sm bg-indigo-300 rounded-lg border border-gray-200 shadow-md hover:bg-purple-500 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Number of Todays Post</h5>
            <p class="font-normal text-gray-700 dark:text-gray-400">{{ $todayCount }}</p>
        </div>

        <div
            class="transition ease-in-out delay-100 hover:-translate-y-1 hover:scale-110 w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6 mb-5 p-8 max-w-sm bg-purple-300 rounded-lg border border-gray-200 shadow-md hover:bg-purple-600 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Number of Users</h5>
            <p class="font-normal text-gray-700 dark:text-gray-400">{{ $usersCount }}</p>
        </div>

    </div>

</x-admin-layout>
