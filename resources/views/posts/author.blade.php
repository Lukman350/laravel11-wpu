<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:withHeader></x-slot:withHeader>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative flex flex-col gap-2 mb-4"
            role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">
                {{ session('success') }}
            </span>
        </div>
    @endif

    @if ($posts->isEmpty())
        <p class="text-center text-gray-500 text-2xl mt-8">No posts found.</p>
    @endif

    <a href="/posts" class="font-medium text-blue-500 hover:underline">Back to Posts &laquo;</a>

    <p class="text-center text-gray-500 text-lg mt-8">{{ count($posts) }} article(s) found by {{ $author }}</p>

    @foreach ($posts as $post)
        <article class="py-8 max-w-screen-xl border-b border-gray-300">
            <div class="flex justify-between items-center">
                <a href="/posts/{{ $post->slug }}" class="hover:underline">
                    <h2 class="mb-1 text-3xl tracking-tighter font-bold text-gray-900">{{ $post->title }}</h2>
                </a>
                <div class="flex flex-row gap-2">

                    <a href="/posts/{{ $post->slug }}/edit"
                        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 hover:ring hover:ring-blue-300 transition ease-in-out duration-300"
                        type="button">Edit</a>
                    <form action="/posts/{{ $post->slug }}" method="POST" id="form-delete">
                        @csrf
                        @method('DELETE')
                        <button type="button" id="btn-delete"
                            class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 hover:ring hover:ring-red-300 transition ease-in-out duration-300">Delete</button>
                    </form>
                </div>
            </div>
            <div class="text-gray-500">
                By
                <p class="inline-block text-base text-gray-950">{{ $post->author->name }}</p>
                in
                <a href="/posts/category/{{ $post->category->slug }}"
                    class="hover:underline text-base text-gray-950">{{ Str::ucfirst($post->category->name) }}</a>
                |
                {{ $post->created_at->diffForHumans() }}
            </div>
            <p class="my-4 font-light">
                {{ Str::limit($post->body, 300) }}
            </p>
            <a href="/posts/{{ $post->slug }}" class="font-medium text-blue-500 hover:underline">Read More
                &raquo;</a>
        </article>
    @endforeach

</x-layout>
