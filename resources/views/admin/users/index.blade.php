<x-admin-layout>




    <div class="mt-12 max-w-6xl mx-auto">
        <div class="flex justify-between m-2 p-2">

            <a href="{{ route('admin.users.import') }}" class="px-4 py-2 bg-indigo-400 hover:bg-indigo-600 rounded">
                Upload Excel File</a>

            <a href="{{ route('admin.users.create') }}" class="px-4 py-2 bg-indigo-400 hover:bg-indigo-600 rounded">
                Add New User</a>

        </div>


        <div class="relative overflow-x-auto shadow-md bg-gray-200 sm:rounded-lg">
            <h2 class="text-xl font-normal leading-normal mt-0 mb-2 text-violet-800">User List</h2>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Role
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{ $user->id }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{ $user->name }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{ $user->role->name }}
                            </th>
                            <td class="px-6 py-4 text-right">
                                <div class="flex space-x-2">
                                    <a href="{{ route('admin.users.edit', $user->id) }}"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                    <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}"
                                        onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>

</x-admin-layout>
