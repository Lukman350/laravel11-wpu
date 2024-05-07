<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <form action="/posts/create" method="POST" class="max-w-md w-full flex flex-col space-y-4">
        @csrf

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
            <textarea name="content" id="content" class="border border-gray-300 p-2 rounded"></textarea>
        </div>

        <div class="mt-4">
            <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded-full hover:ring hover:ring-blue-300 transition duration-300 ease-linear">Create</button>
        </div>
    </form>
</x-layout>
