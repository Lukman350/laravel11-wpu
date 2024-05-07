<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="flex justify-end gap-4">
        <a href="/posts/create"
            class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 hover:ring hover:ring-blue-300 transition ease-in-out duration-300"
            type="button">Create
            New Post</a>
    </div>

    @foreach ($posts as $post)
        <article class="py-8 max-w-screen-md border-b border-gray-300">
            <a href="/posts/{{ $post['slug'] }}" class="hover:underline">
                <h2 class="mb-1 text-3xl tracking-tighter font-bold text-gray-900">{{ $post['title'] }}</h2>
            </a>
            <div class="text-base text-gray-500 ">
                <a href="#">{{ $post['author'] }}</a> | 1 January 2021
            </div>
            <p class="my-4 font-light">
                {{ Str::limit($post['body'], 150) }}
            </p>
            <a href="/posts/{{ $post['slug'] }}" class="font-medium text-blue-500 hover:underline">Read More &raquo;</a>
        </article>
    @endforeach
</x-layout>
