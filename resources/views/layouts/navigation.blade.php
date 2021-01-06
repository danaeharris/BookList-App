<nav x-data="{ open: false }" class="border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto md:mx-30 sm:mx-15 pt-10 px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col justify-between  h-20">
            <div class="flex pb-10 flex-row justify-between xs:relative">
                <!-- Logo -->
                <div class="flex items-center flex-col md:flex-row justify-start w-full md:w-9/12">
                    <div class="flex-shrink-0 flex">
                        <a href="{{ route('home') }}">
                            <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                        </a>
                    </div>
                    <x-search-bar />
                </div>
                <!-- Settings Dropdown -->
                <div class="hidden self-start md:self-center mb-10 sm:flex items-center sm:ml-6">
                    @auth
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                    <div class="primaryText font-karla">{{ Auth::user()->name }}</div>

                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Logout') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                        @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline font-karla">Login</a>
    
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline font-karla">Join</a>
                        @endif
                    @endauth
                </div>
                <!-- Hamburger -->
                <div class="-mr-2 flex items-center xs:items-start sm:hidden xs:absolute xs:top-0 xs:right-0 xs:p-3">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
                <!-- Navigation Links -->
            @auth
                <div class="flex justify-center lg:justify-start space-x-8 -mt-10 mb-10">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class=" font-karla">
                        {{ __('My Lists') }}
                    </x-nav-link>
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')" class=" font-karla">
                        {{ __('Home') }}
                    </x-nav-link>
                </div>
            @endauth
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                <div class="flex-shrink-0">
                    <svg class="h-10 w-10 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>

{{-- 
                @auth
                <div class="ml-3">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
                @endauth --}}
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                this.closest('form').submit();">
                        {{ __('Logout') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
