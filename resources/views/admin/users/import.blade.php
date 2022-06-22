<x-admin-layout>
    <div class="mt-12 max-w-6xl mx-auto bg-slate-50 p-4 rounded">
        <div class="flex m-2 p-2">
            <a href="{{ route('admin.users.index') }}" class="px-4 py-2 bg-indigo-400 hover:bg-indigo-600 rounded">
                Back</a>
        </div>
        <div class="max-w-md mx-auto bg-gray-100 p-6 mt-12 rounded">
            <form class="space-y-5" method="POST" action="{{ route('admin.users.exstore') }}"
                enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="name" class="text-xl">Upload File</label>
                    <input id="name" type="file" name="file" />
                </div>
                <button type="submit"
                    class="w-full py-3 mt-10 bg-indigo-400 hover:bg-indigo-600 rounded-md
                        font-medium text-white uppercase
                        focus:outline-none hover:shadow-none">
                    Import
                </button>
            </form>
        </div>
    </div>
</x-admin-layout>
