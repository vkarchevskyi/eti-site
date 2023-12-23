<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
<div class="min-h-screen">
    <div class="bg-white">
        <header class="absolute inset-x-0 top-0 z-50" x-data="{ menuShow: false }">
            <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
                <div class="flex lg:flex-1">
                    <a href="{{ route('main') }}" class="-m-1.5 p-1.5">
                        <span class="sr-only">ETI</span>
                        <img src="{{ asset('assets/logo.png') }}" alt="eti" class="h-14 w-auto">
                    </a>
                </div>
                <div class="flex lg:hidden" @click="menuShow = true">
                    <button type="button"
                            class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                        <span class="sr-only">Open main menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                             aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                        </svg>
                    </button>
                </div>
                <div class="hidden lg:flex lg:gap-x-12">
                    <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Розклад</a>
                    <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Новини</a>
                </div>
                <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                    @auth
                        <a href="{{ route('dashboard') }}" class="text-sm font-semibold leading-6 text-gray-900">
                            {{ auth()->user()->name }} <span aria-hidden="true">&rarr;</span>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-semibold leading-6 text-gray-900">
                            Увійти <span aria-hidden="true">&rarr;</span>
                        </a>
                    @endauth
                </div>
            </nav>
            <div class="lg:hidden" x-show="menuShow" x-cloak role="dialog" aria-modal="true">
                <div class="fixed inset-0 z-50"></div>
                <div
                    class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10"
                    x-on:click.outside="menuShow = false"
                >
                    <div class="flex items-center justify-between">
                        <a href="#" class="-m-1.5 p-1.5">
                            <span class="sr-only">ETI</span>
                            <img class="h-8 w-auto"
                                 src="{{ asset('assets/logo.png') }}" alt="eti">
                        </a>
                        <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700"
                                @click="menuShow = false">
                            <span class="sr-only">Закрити меню</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                    <div class="mt-6 flow-root">
                        <div class="-my-6 divide-y divide-gray-500/10">
                            <div class="space-y-2 py-6">
                                <a href="#"
                                   class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">
                                    Розклад
                                </a>
                                <a href="#"
                                   class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">
                                    Новини
                                </a>
                            </div>
                            <div class="py-6">
                                <a href="#"
                                   class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">
                                    @auth
                                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-950">
                                            Профіль
                                        </a>
                                    @else
                                        <a href="{{ route('login') }}" class="font-semibold text-gray-950">
                                            Увійти
                                        </a>
                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}"
                                               class="ml-4 font-semibold text-gray-950">Реєстрація</a>
                                        @endif
                                    @endauth
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>
    <main>
        {{ $slot }}
    </main>
</div>
</body>
</html>
