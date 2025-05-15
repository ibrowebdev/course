<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? config('app.name', 'CourseLite') }}</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
@livewireStyles

<body>




    <nav
        class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 left-0 right-0 start-0 border-b border-gray-200 dark:border-gray-600">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                <span
                    class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white text-indigo-800">CourseLite</span>
            </a>
            <div class="flex items-center gap-x-5">
                @guest
                    <a href={{ Route('login') }}>Login</a>
                    <a href={{ Route('register') }}>Register</a>
                @endguest
                @auth
                    <a href={{ Route('course') }}>Course List</a>
                    <a href="/logout">Logout</a>
                @endauth
            </div>

        </div>
    </nav>

    <div class="mt-32 px-2">
        {{ $slot }}
    </div>

    @livewireScripts
</body>

</html>
