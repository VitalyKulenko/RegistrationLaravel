<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="flex basis-1/2 justify-end items-center mb-5">
            <iframe class="rounded-b-2xl" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d23822.09444593769!2d44.783860615344246!3d41.725658482341196!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2sge!4v1666771346182!5m2!1sru!2sge" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <nav class="flex mx-auto max-w-7xl px-5 justify-between">
            <div class="flex">
                <a href="#" class="flex items-center text-2xl font-light"><img src="{{ url('/logos/firstdraft.svg') }}" alt="logo"><span class="ml-2.5 mr-5">Example application</span></a>
                <ul class="flex text-gray-600 items-center">
                    <li class="px-5 hover:text-red-700"><a href="/registration">Registration</a></li>
                    <li class="px-5 hover:text-red-700"><a href="/users">Speakers</a></li>
                </ul>
            </div>
            @if (Auth::user())
            <div class="flex relative" x-data="{ open: false }">
                <a x-on:click="open = ! open" class="flex items-center"><img class="w-6" src="{{ url('/logos/admin.svg') }}" alt="admin"><span class="ml-1">{{ Auth::user()->name }}</span></a>
                <div class="flex flex-wrap absolute w-28 top-10 z-10 border border-black rounded-md bg-white" x-show="open">
                    <a class="hover:text-red-700 w-full p-2 border-b" href="/home">Profile</a>
                    <a class="hover:text-red-700 w-full p-2" href="/logout">Logout</a>
                </div>
            </div>
            @else
                <a href="/login" class="flex items-center"><img class="w-6" src="{{ url('/logos/login.svg') }}" alt="login"><span class="ml-1">Login</span></a>
            @endif
        </nav>
        @yield('index-content')
    </body>
</html>