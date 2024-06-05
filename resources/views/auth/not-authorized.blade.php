<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="text-center min-h-screen flex justify-center items-center flex-col gap-8">
        <h3 class="text-2xl font-bold">Anda tidak diizinkan mengakses halaman ini</h3>
        <p>Silahkan login terlebih dahulu</p>
        <a href="{{ route('login') }}" class="text-blue-500">Login</a>
    </div>
</x-layout>
