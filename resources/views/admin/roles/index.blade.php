<x-admin-layout>
    <div class="mt-12 max-w-6xl mx-auto">
        <div class="flex justify-end m-2 p-2">
            <a href="{{ route('admin.roles.create') }}" class="px-4 py-2 transition ease-in-out delay-100 hover:-translate-y-1 hover:scale-110 bg-indigo-400 hover:bg-indigo-600 rounded">
                New Role</a>
        </div>
        <div class="relative overflow-x-auto shadow-md bg-gray-200 sm:rounded-lg">
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
                            Permissions
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{ $role->id }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{ $role->name }}
                            </th>

                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                @forelse ($role->permissions as $rp)
                                    <span class="m-1 p-1 bg-indigo-300 rounded">{{ $rp->name }}</span>
                                @empty
                                    <span class="test-sm text-gray-300">No Permissions</span>
                                @endforelse
                            </th>

                            <td class="px-6 py-4 text-right">
                                <div class="flex space-x-2">
                                    <a href="{{ route('admin.roles.edit', $role->id) }}"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                          </svg></a>
                                    <form method="POST" action="{{ route('admin.roles.destroy', $role->id) }}"
                                        onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="font-medium text-red-600 dark:text-red-500 hover:underline"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                              </svg></button>
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
