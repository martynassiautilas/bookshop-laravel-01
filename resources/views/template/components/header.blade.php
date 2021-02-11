<header class="bg-white flex justify-between items-center p-6">
    <div class="flex items-center space-x-4">
        <button @click="sidebarOpen = true" class="text-gray-500 dark:text-gray-300 focus:outline-none">
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>
        <div>
            <a href="{{ url('/') }}" class="">
                <img src="{{ asset('images/logo-color.svg') }}"
                    class="h-16 sm:w-16 lg:w-auto object-cover object-left">
            </a>
        </div>
    </div>

    <div class="flex items-center space-x-4">
        @guest
            <a class="button-flat"
                href="{{ route('register') }}">{{ __('auth.register') }}</a>
            <a class="button-bordered"
                href="{{ route('login') }}">{{ __('auth.login') }}</a>
        @else
            <div x-data="{ dropdownOpen: false }" class="relative">
                <button @click="dropdownOpen = ! dropdownOpen"
                    class="flex items-center space-x-2 relative focus:outline-none">
                    <h2 class="text-gray-700 dark:text-gray-300 text-sm hidden sm:block">
                        {{ ucfirst(Auth::user()->name) }}</h2>
                    <img class="h-12 w-12 rounded-full border-2 border-primary-500 object-cover"
                        src="https://images.unsplash.com/photo-1553267751-1c148a7280a1?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80"
                        alt="Your avatar">
                </button>
                <div class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-10"
                    x-show="dropdownOpen"
                    x-transition:enter="transition ease-out duration-100 transform"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75 transform"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95" 
                    @click.away="dropdownOpen = false">
                    <a href="#"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-500 hover:text-white">Mano
                        profilis</a>
                    <a href="{{ route('addBook') }}"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-500 hover:text-white">Pridėti
                        knygą</a>
                    <a href="#"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-500 hover:text-white">Pranešti</a>

                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-500 hover:text-white">Atsijungti</a>
                    <form id="logout-form" action="{{ route('logout') }}"
                        method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        @endguest
    </div>
</header>