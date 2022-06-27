<?php
use App\Http\Controllers\PostController;
?>
<x-guest-layout>
    {{-- <x-app-layout> --}}
    <div class="mt-12 max-w-6xl mx-auto">
        @can('create', App\Models\Post::class)

            @if ($roleID == 1)
                <div class="flex justify-end m-2 p-2">
                    <a href="{{ route('posts.create') }}" class="px-4 py-2 bg-indigo-400 hover:bg-indigo-600 rounded">
                        New Post</a>
                </div>
            @endif

            @if ($postCount < 1 && $roleID == 3)
                <div class="flex justify-end m-2 p-2">
                    <a href="{{ route('posts.create') }}" class="px-4 py-2 bg-indigo-400 hover:bg-indigo-600 rounded">
                        New Post</a>
                </div>
            @endif

            <p class="joined-text">Today's Posts: {{ $postCount }}</p>
            <p class="joined-text">User Role: {{ $roleID }}</p>
        @endcan
        <div class="relative overflow-x-auto shadow-md bg-gray-200 sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Title
                        </th>
                        {{-- <th scope="col" class="px-6 py-3">
                            Category
                        </th> --}}
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($posts as $post)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{ $post->id }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{ $post->title }}
                            </th>
                            {{-- <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                @php
                                    $posts_controller = new PostController();
                                    echo $posts_controller->getCategoryName($post->id);
                                @endphp
                            </th> --}}

                            <td class="px-6 py-4 text-right">


                                <div class="flex space-x-2">
                                    <a href="{{ route('posts.show', $post->id) }}"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><svg
                                            xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg></a>
                                    @can('update', $post)
                                        <a href="{{ route('posts.edit', $post->id) }}"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><svg
                                                xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg></a>
                                    @endcan
                                    @can('delete', $post)
                                        <form method="POST" action="{{ route('posts.destroy', $post->id) }}"
                                            onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="font-medium text-red-600 dark:text-red-500 hover:underline"><svg
                                                    xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg></button>
                                        </form>
                                    @endcan

                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="container mx-auto">
                {{ $posts->links() }}
            </div>

        </div>

    </div>
</x-guest-layout>

{{-- </x-app-layout> --}}
