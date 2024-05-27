<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative flex flex-col gap-2 mb-4"
            role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">
                {{ session('success') }}
            </span>
        </div>
    @endif

    <div class="flex justify-end gap-4">
        <a href="/posts/create"
            class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 hover:ring hover:ring-blue-300 transition ease-in-out duration-300"
            type="button">Create
            New Post</a>
    </div>

    @foreach ($posts as $post)
        <article class="py-8 max-w-screen-md border-b border-gray-300">
            <div class="flex justify-between items-center">
                <a href="/posts/{{ $post['slug'] }}" class="hover:underline">
                    <h2 class="mb-1 text-3xl tracking-tighter font-bold text-gray-900">{{ $post['title'] }}</h2>
                </a>
                <div class="flex flex-row gap-2">

                    <a href="/posts/{{ $post['slug'] }}/edit"
                        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 hover:ring hover:ring-blue-300 transition ease-in-out duration-300"
                        type="button">Edit</a>
                    <form action="/posts/{{ $post['slug'] }}" method="POST" id="form-delete">
                        @csrf
                        @method('DELETE')
                        <button type="button" id="btn-delete"
                            class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 hover:ring hover:ring-red-300 transition ease-in-out duration-300">Delete</button>
                    </form>
                </div>
            </div>
            <div class="text-base text-gray-500 ">
                <a href="#">{{ $post['author'] }}</a> | {{ $post['created_at']->diffForHumans() }}
            </div>
            <p class="my-4 font-light">
                {{ Str::limit($post['body'], 150) }}
            </p>
            <a href="/posts/{{ $post['slug'] }}" class="font-medium text-blue-500 hover:underline">Read More &raquo;</a>
        </article>
    @endforeach

    <script>
        const btnDelete = document.querySelectorAll('#btn-delete');

        for (const btn of btnDelete) {
            btn.addEventListener('click', function() {
                const form = this.parentElement;
                const confirmation = confirm('Are you sure you want to delete this post?');

                if (confirmation) {
                    form.submit();
                }
            });
        }
    </script>
</x-layout>
