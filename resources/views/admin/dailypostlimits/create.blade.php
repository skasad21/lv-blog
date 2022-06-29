<x-admin-layout>
    <div class="mt-12 max-w-6xl mx-auto bg-slate-50 p-4 rounded">
        <div class="flex m-2 p-2">
            <a href="{{ route('admin.dailypostlimits.index') }}"
                class="px-4 py-2 bg-indigo-400 hover:bg-indigo-600 rounded">
                Back</a>
        </div>

        <div class="max-w-md mx-auto bg-gray-100 p-6 mt-12 rounded">

            <form class="space-y-5" method="POST" action="{{ route('admin.dailypostlimits.store') }}">
                @csrf

                <div>
                    <label class="text-xl">
                        <span class="text-gray-700">Role</span>
                        <select name="role_id"
                            class="block w-full py-3 px-3 mt-2
                            text-gray-800 appearance-none
                            border-2 border-gray-100
                            focus:text-gray-500 focus:outline-none focus:border-gray-200 rounded-md">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">
                                    {{ $role->name }}</option>
                            @endforeach
                        </select>
                    </label>
                </div>

                <div>
                    <label for="daily_number_of_post" class="text-xl">Daily Limit</label>
                    <input id="daily_number_of_post" type="number" name="daily_number_of_post"
                        class="block w-full py-3 px-3 mt-2
                            text-gray-800 appearance-none
                            border-2 border-gray-100
                            focus:text-gray-500 focus:outline-none focus:border-gray-200 rounded-md" />
                    @error('daily_number_of_post')
                        <span class="text-sm text-red-400">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full py-3 mt-10 bg-indigo-400 hover:bg-indigo-600 rounded-md
                        font-medium text-white uppercase
                        focus:outline-none hover:shadow-none">
                    Create
                </button>
            </form>
        </div>
    </div>
</x-admin-layout>

