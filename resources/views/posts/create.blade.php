<x-guest-layout>
    <div class="mt-12 max-w-6xl mx-auto">
        @can('create', App\Models\Post::class)
            <div class="flex m-2 p-2">
                <a href="{{ route('posts.index') }}" class="px-4 py-2 bg-indigo-400 hover:bg-indigo-600 rounded">
                    Back</a>
            </div>
        @endcan
        <div class="max-w-full mx-auto p-4">
            <form class="space-y-5" method="POST" enctype="multipart/form-data" action="{{ route('posts.store') }}">
                @csrf
                <div>
                    <label for="title" class="text-xl">Title</label>
                    <input id="title" type="text" name="title"
                        class="block w-full py-3 px-3 mt-2
                            text-gray-800 appearance-none
                            border-2 border-gray-100
                            focus:text-gray-500 focus:outline-none focus:border-gray-200 rounded-md" />
                    @error('title')
                        <span class="text-sm text-red-400">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="body" class="text-xl">Body</label>
                    {{-- <input id="body" type="text" name="body"
                        class="block w-full py-6 px-6 mt-2
                            text-gray-800 appearance-none
                            border-2 border-gray-100
                            focus:text-gray-500 focus:outline-none focus:border-gray-200 rounded-md" /> --}}

                    <textarea id="body" name="body" rows="6"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Your blog text..."></textarea>
                    @error('body')
                        <span class="text-sm text-red-400">{{ $message }}</span>
                    @enderror
                </div>


                <div>
                    <label for="file" class="text-xl">Image</label>
                    <input id="image" type="file" name="image"
                        class="block w-full py-3 px-3 mt-2
                            text-gray-800 appearance-none
                            border-2 border-gray-100
                            focus:text-gray-500 focus:outline-none focus:border-gray-200 rounded-md" />
                    @error('image')
                        <span class="text-sm text-red-400">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="text-xl">
                        <span class="text-gray-700">Category</span>
                        <select name="category_id"
                            class="block w-full py-3 px-3 mt-2
                            text-gray-800 appearance-none
                            border-2 border-gray-100
                            focus:text-gray-500 focus:outline-none focus:border-gray-200 rounded-md">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                    </label>
                </div>

                <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">

                <button type="submit"
                    class="w-full py-3 mt-10 bg-indigo-400 hover:bg-indigo-600 rounded-md
                        font-medium text-white uppercase
                        focus:outline-none hover:shadow-none">
                    Create
                </button>
            </form>
        </div>

    </div>
</x-guest-layout>
