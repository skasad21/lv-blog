<x-guest-layout>
    {{-- <x-app-layout> --}}
    <div class="mt-12 max-w-6xl mx-auto bg-slate-50 p-4 rounded">
        <div class="flex m-2 p-2">
            <a href="{{ route('posts.index') }}" class="px-4 py-2 bg-indigo-400 hover:bg-indigo-600 rounded">
                Back</a>
        </div>
        <div class="max-w-md mx-auto bg-gray-100 p-6 mt-12 rounded">
            <form class="space-y-5" method="POST" action="{{ route('posts.update', $post->id) }}">
                @csrf
                @method('PUT')

                {{ $post->category_id }}
                <div>
                    <label for="title" class="text-xl">Title</label>
                    <input id="title" type="text" name="title" value="{{ $post->title }}"
                        class="block w-full py-3 px-3 mt-2
                                text-gray-800 appearance-none
                                border-2 border-gray-100
                                focus:text-gray-500 focus:outline-none focus:border-gray-200 rounded-md" />
                    @error('title')
                        <span class="text-sm text-red-400">{{ $message }}</span>
                    @enderror
                </div>
                {{-- <div>
                        <label for="body" class="text-xl">Body</label>
                        <input id="body" type="text" name="body" value="{{ $post->body }}"
                            class="block w-full py-3 px-3 mt-2
                                text-gray-800 appearance-none
                                border-2 border-gray-100
                                focus:text-gray-500 focus:outline-none focus:border-gray-200 rounded-md" />
                        @error('body')
                            <span class="text-sm text-red-400">{{ $message }}</span>
                        @enderror
                    </div> --}}


                <div>
                    <label for="body" class="text-xl">Body</label>
                    {{-- <input id="body" type="text" name="body"
                            class="block w-full py-6 px-6 mt-2
                                text-gray-800 appearance-none
                                border-2 border-gray-100
                                focus:text-gray-500 focus:outline-none focus:border-gray-200 rounded-md" /> --}}

                    <textarea id="body" name="body" rows="6"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Your blog text...">{{ $post->body }}</textarea>
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
                    <div class="form-group">
                        <img src="/uploads/{{ $post->image }}" height="200" width="200" alt="" />
                    </div>
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
                                <option value="{{ $category->id }}" @selected(($post->category_id == $category->id) ? 1 : 0)>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                    </label>
                </div>


                <button type="submit"
                    class="w-full py-3 mt-10 bg-indigo-400 hover:bg-indigo-600 rounded-md
                            font-medium text-white uppercase
                            focus:outline-none hover:shadow-none">
                    Update
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>

{{-- </x-app-layout> --}}
