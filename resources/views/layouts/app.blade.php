<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- js in head tag -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>

    <!-- css -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans|500&family=Varela|500&display=swap" rel="stylesheet"> 

    @stack('css')
</head>
<body>
    <div id="app">
        <div x-data="{ sidebarOpen: false }">
            <div class="flex h-screen bg-gray-100 dark:bg-gray-800 font-roboto">
                <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false"
                    class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity"></div>
        
                <div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
                    class="fixed z-30 inset-y-0 left-0 w-60 transition duration-300 transform bg-white dark:bg-gray-900 overflow-y-auto">
       
                    <nav class="flex flex-col mt-10 px-4 text-center">
                        <a href="#"
                            class="py-2 text-sm text-gray-700 dark:text-gray-100 bg-gray-200 dark:bg-gray-800 rounded">
                            Overview
                        </a>
                        <a href="#"
                            class="mt-3 py-2 text-sm text-gray-600 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-100  hover:bg-gray-200 dark:hover:bg-gray-800 rounded">Tickets</a>
                        <a href="#"
                            class="mt-3 py-2 text-sm text-gray-600 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-100 hover:bg-gray-200 dark:hover:bg-gray-800 rounded">Ideas</a>
                        <a href="#"
                            class="mt-3 py-2 text-sm text-gray-600 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-100 hover:bg-gray-200 dark:hover:bg-gray-800 rounded">Contacts</a>
                        <a href="#"
                            class="mt-3 py-2 text-sm text-gray-600 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-100 hover:bg-gray-200 dark:hover:bg-gray-800 rounded">Settings</a>
                    </nav>
                </div>
        
                <div class="flex-1 flex flex-col overflow-hidden">
                    <header class="bg-white flex justify-between items-center p-6">
                        <div class="flex items-center space-x-4">
                            <button @click="sidebarOpen = true"
                                class="text-gray-500 dark:text-gray-300 focus:outline-none">
                                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                            <div>
                                <a href="{{ url('/') }}" class="">
                                    <img src="{{ asset('images/logo-color.svg') }}" class="h-16 sm:w-16 lg:w-auto object-cover object-left">
                                </a>
                            </div>
                        </div>
        
                        <div class="flex items-center space-x-4">   
                            @guest
                                <a class="button-flat" href="{{ route('register') }}">{{ __('auth.register') }}</a>
                                <a class="button-bordered" href="{{ route('login') }}">{{ __('auth.login') }}</a>
                            @else
                                <div x-data="{ dropdownOpen: false }" class="relative">
                                    <button @click="dropdownOpen = ! dropdownOpen"
                                        class="flex items-center space-x-2 relative focus:outline-none">
                                        <h2 class="text-gray-700 dark:text-gray-300 text-sm hidden sm:block">{{ ucfirst(Auth::user()->name) }}</h2>
                                        <img class="h-12 w-12 rounded-full border-2 border-primary-500 object-cover"
                                            src="https://images.unsplash.com/photo-1553267751-1c148a7280a1?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80"
                                            alt="Your avatar">
                                    </button>
                                    <div class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-10"
                                        x-show="dropdownOpen" x-transition:enter="transition ease-out duration-100 transform"
                                        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                                        x-transition:leave="transition ease-in duration-75 transform"
                                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                                        @click.away="dropdownOpen = false">
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-500 hover:text-white">Mano profilis</a>
                                        <a href="{{ route('addBook') }}"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-500 hover:text-white">Pridėti knygą</a>
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-500 hover:text-white">Pranešti</a>

                                            <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-500 hover:text-white">Atsijungti</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </div>
                            @endguest
                        </div>
                    </header>
                    <main class="flex-1 overflow-x-hidden overflow-y-auto">
                        <div class="container mx-auto px-6 py-8">
                            @yield('content')
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- before body tag js -->
@stack('js')
</body>

</html>
