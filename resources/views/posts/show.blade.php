<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <article class="py-8 max-w-screen-xl">
        <h2 class="mb-1 text-3xl tracking-tighter font-bold text-gray-900">{{ $post->title }}</h2>
        <div class="text-base text-gray-500 ">
            <a href="/posts/author/{{ $post->author->id }}" class="hover:underline">{{ $post->author->name }}</a> on
            <a href="/posts/category/{{ $post->category->slug }}"
                class="bg-gray-500 text-white px-2 rounded-full text-sm hover:underline">{{ Str::ucfirst($post->category->name) }}</a>
            |
            {{ $post->created_at->diffForHumans() }}
        </div>
        <p class="my-4 font-light">
            {{ $post->body }}
        </p>
        <p class="my-4 font-light">
            <a href="/posts" class="font-medium text-blue-500 hover:underline">Back to Posts &laquo;</a>
        </p>
    </article>
</x-layout>
