<div id="navbar" class="mt-1 fixed top-0 mx-auto w-full">
    <nav x-data="{ open: false }"
        class="bg-white border-b rounded-2xl mt-[10px] dark:bg-gray-800 dark:border-gray-700 w-[75%] mx-auto border-[1px] border-border-primary ">
        <!-- Primary Navigation Menu -->
        <div class="px-4  w-full  mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="flex items-center shrink-0">
                        <a href="{{ route('dashboard') }}">
                            <x-application-logo class="block w-auto text-gray-800 fill-current h-9 dark:text-gray-200" />
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                            {{ __('home') }}
                        </x-nav-link>
                        <x-nav-link :href="route('features')" :active="request()->routeIs('features')">
                            {{ __('features') }}
                        </x-nav-link>
                        <x-nav-link :href="route('FAQ')" :active="request()->routeIs('FAQ')">
                            {{ __('FAQ') }}
                        </x-nav-link>
                    </div>
                </div>

                @if (Route::has('login'))
                    <div class="flex items-center gap-4 ">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                                class=" btn h-[40px] border-gray-200 bg-white text-black   hover:border-gray-200 hover:bg-white  hover:text-black rounded-[10px] border-[2px] px-3 py-2text-[18px] font-semibold ring-1 ring-transparent transition focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                Log in
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="btn border-primary bg-primary  hover:border-primary hover:bg-secondary rounded-[10px] border-[2px] px-3 py-2text-[18px] font-semibold text-[#FFFFFF] hover:text-[#FFFFFF] ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                    Register
                                </a>
                            @endif
                        @endauth
                    </div>
                @endif

                <!-- Hamburger -->
                <div class="flex items-center -me-2 sm:hidden">
                    <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400">
                        <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                    home
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('features')" :active="request()->routeIs('features')">
                    features
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('FAQ')" :active="request()->routeIs('FAQ')">
                    FAQ
                </x-responsive-nav-link>
            </div>
        </div>
</div>
</nav>

</div>
