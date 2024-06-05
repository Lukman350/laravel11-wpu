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

    @foreach ($posts as $post)
        <article class="py-8 max-w-screen-xl border-b border-gray-300">
            <div class="flex justify-between items-center">
                <a href="/posts/{{ $post->slug }}" class="hover:underline">
                    <h2 class="mb-1 text-3xl tracking-tighter font-bold text-gray-900">{{ $post->title }}</h2>
                </a>
            </div>
            <div class="text-gray-500">
                By
                <a href="/posts/author/{{ $post->author->username }}"
                    class="hover:underline text-base text-gray-950">{{ $post->author->name }}</a>
                in
                <p class="inline-block text-base text-gray-950">{{ Str::ucfirst($post->category->name) }}</p>
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
