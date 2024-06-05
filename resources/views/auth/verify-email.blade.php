<x-layout>
    <x-slot:title>Login into your account</x-slot:title>

    <div class="flex min-h-screen flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                alt="Your Company">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Verify Email</h2>
        </div>

        <div class="sm:mx-auto sm:w-full sm:max-w-sm bg-green-100 mt-10 border border-green-400 text-green-700 px-4 py-3 rounded relative flex flex-col gap-2"
            role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">
                A new verification link has been sent to the email address you provided during registration.
            </span>
        </div>
    </div>
</x-layout>
