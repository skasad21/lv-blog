<x-guest-layout>
    {{-- <x-app-layout> --}}
    <div class="mt-12 max-w-6xl mx-auto">
        <div class="flex m-2 p-2">
            <a href="{{ route('posts.index') }}"
                class="px-4 py-2 bg-indigo-400 hover:bg-indigo-600 rounded">
                Back</a>
        </div>

        <div
            class="hero container max-w-screen-lg mx-auto pb-10 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
            <img style="margin-top: 25px;" class="mx-auto rounded-t-lg" src="/uploads/{{ $post->image }}" alt="" />

            <div class="p-5 m-1.5">
                <div class="content-center">
                    <h1 style="margin-top: 25px;" class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->title }}
                    </h1>
                </div>

                <p style="margin-top: 25px;" class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $post->body }}</p>

            </div>
        </div>

    </div>
</x-guest-layout>

{{-- </x-app-layout> --}}
