<x-layout>
    <x-slot:title>Login into your account</x-slot:title>

    <div class="flex min-h-screen flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                alt="Your Company">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your
                account</h2>
        </div>

        @if (!empty($error))
            <div class="sm:mx-auto sm:w-full sm:max-w-sm bg-red-100 mt-10 border border-red-400 text-red-700 px-4 py-3 rounded relative flex flex-col gap-2"
                role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">
                    {{ $error }}
                </span>
            </div>
        @endif

        @if (session('success'))
            <div class="sm:mx-auto sm:w-full sm:max-w-sm bg-green-100 mt-10 border border-green-400 text-green-700 px-4 py-3 rounded relative flex flex-col gap-2"
                role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">
                    {{ session('success') }}
                </span>
            </div>
        @endif

        <div class="mt-5 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="/auth/login" method="POST">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email
                        address</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" autocomplete="email" required
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        <div class="text-sm">
                            <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot
                                password?</a>
                        </div>
                    </div>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign
                        in</button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm text-gray-500">
                Not a member?
                <a href="/auth/register" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Register
                    here</a>
            </p>
        </div>
    </div>
</x-layout>
