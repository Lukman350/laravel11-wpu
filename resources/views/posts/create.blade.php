<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <form action="/posts/create" method="POST" class="max-w-xl mx-auto w-full flex flex-col space-y-4">
        @csrf

        @if (!empty($error))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative flex flex-col gap-2"
                role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">
                    {{ $error }}
                </span>
            </div>
        @endif

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative flex flex-col gap-2"
                role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">
                    {{ session('success') }}
                </span>
            </div>
        @endif

        <div class="flex flex-col space-y-2">
            <label for="title" class="text-sm font-semibold">Title</label>
            <input type="text" name="title" id="title" class="border border-gray-300 p-2 rounded">
        </div>

        <div class="flex flex-col space-y-2">
            <label for="slug" class="text-sm font-semibold">Author</label>
            <input type="text" name="author" id="author" class="border border-gray-300 p-2 rounded">
        </div>

        <div class="flex flex-col space-y-2">
            <label for="content" class="text-sm font-semibold">Content</label>
            <textarea name="content" id="content" class="border border-gray-300 p-2 rounded" rows="15"></textarea>
        </div>

        <div class="mt-4">
            <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded-full hover:ring hover:ring-blue-300 transition duration-300 ease-linear">Create</button>
        </div>
    </form>
</x-layout>
