<nav x-data="{ open: false }" class="bg-white border-b border-gray-200 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- Left: Logo + Main Links -->
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="h-9 w-auto text-gray-800" />
                    </a>
                </div>

                <!-- Desktop Nav -->
                <div class="hidden sm:flex sm:ml-10 sm:space-x-8">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="font-medium">
                        Dashboard
                    </x-nav-link>

                    <x-nav-link :href="route('shop.index')" :active="request()->routeIs('shop.*')" class="font-medium">
                        Shop
                    </x-nav-link>

                    @php
                        $cart = session('cart', []);
                        $cartCount = collect($cart)->sum('quantity');
                    @endphp

                    <x-nav-link :href="route('cart.index')" :active="request()->routeIs('cart.*')" class="relative font-medium">
                        Cart
                        @if($cartCount > 0)
                            <span class="absolute -top-2 -right-3 px-2 py-0.5 text-xs font-semibold bg-red-600 text-white rounded-full shadow">
                                {{ $cartCount }}
                            </span>
                        @endif
                    </x-nav-link>

                    @if (Auth::check() && Auth::user()->is_admin)
                        <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.*')" class="font-medium">
                            Admin
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Right: Auth -->
            <div class="hidden sm:flex sm:items-center space-x-6">

                @auth
                    <span class="text-gray-700 font-medium">{{ Auth::user()->name }}</span>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="text-red-600 hover:text-red-700 font-medium">
                            Logout
                        </button>
                    </form>

                @else
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-gray-900 font-medium">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="text-blue-600 hover:underline font-medium">
                        Register
                    </a>
                @endauth
            </div>

            <!-- Mobile Menu Button -->
            <div class="sm:hidden flex items-center">
                <button @click="open = !open"
                        class="p-2 rounded-md text-gray-500 hover:bg-gray-100 hover:text-gray-700 focus:outline-none transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none">
                        <path :class="{'hidden': open, 'inline-flex': ! open}"
                              class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />

                        <path :class="{'hidden': ! open, 'inline-flex': open}"
                              class="hidden"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden bg-white border-t border-gray-200 sm:hidden">

        <!-- Main mobile links -->
        <div class="py-4 px-4 space-y-2">

            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                Dashboard
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('shop.index')" :active="request()->routeIs('shop.*')">
                Shop
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('cart.index')" :active="request()->routeIs('cart.*')">
                Cart ({{ $cartCount }})
            </x-responsive-nav-link>

        </div>

        <!-- Mobile Auth -->
        <div class="py-4 px-4 border-t border-gray-200">

            @auth
                <div class="font-medium text-gray-800 text-base">{{ Auth::user()->name }}</div>
                <div class="font-medium text-gray-500 text-sm">{{ Auth::user()->email }}</div>

                <div class="mt-3">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                                               onclick="event.preventDefault(); this.closest('form').submit();">
                            Logout
                        </x-responsive-nav-link>
                    </form>
                </div>

            @else
                <div class="space-y-2">
                    <a href="{{ route('login') }}" class="block text-gray-700 font-medium hover:underline">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="block text-blue-600 font-medium hover:underline">
                        Register
                    </a>
                </div>
            @endauth

        </div>
    </div>
</nav>
