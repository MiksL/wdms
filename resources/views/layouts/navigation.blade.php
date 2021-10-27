<div class="relative bg-white dark:bg-gray-800 dark:text-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex justify-between items-center border-b-2 border-gray-100 py-6 md:justify-start md:space-x-10">
        <div class="flex justify-start lg:w-0 lg:flex-1">
            <a href="{{ route('dashboard') }}" class="text-base text-gray-500 dark:text-gray-200 font-semibold text-xl leading-tight">
                @yield('title')
            </a>
        </div>
        <nav class="hidden md:flex space-x-10">
            <a href="{{ route('warehouses') }}" class="text-base font-medium text-gray-500 dark:text-gray-200 hover:text-gray-900 dark:hover:text-gray-400">
                Warehouses
            </a>
            
            <a href="{{ route('stores') }}" class="text-base font-medium text-gray-500 dark:text-gray-200 hover:text-gray-900 dark:hover:text-gray-400">
                Stores
            </a>

            <a href="{{ route('products') }}" class="text-base font-medium text-gray-500 dark:text-gray-200 hover:text-gray-900 dark:hover:text-gray-400">
                Products
            </a>
        </nav>
        <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">
            <div @click.away="open = false" class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-medium text-left bg-transparent rounded-lg text-gray-500 dark:text-gray-200 dark:bg-transparent dark:focus:text-gray-200 dark:hover:text-gray-200 dark:focus:bg-gray-600 dark:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                  <span>{{ Auth::user()->name }}</span>
                  <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
                <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                  <div class="px-2 py-2 bg-white dark:bg-gray-800 rounded-md shadow">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link class="block px-4 py-2 mt-2 text-sm font-medium bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-gray-200 dark:hover:text-gray-200 dark:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                        :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
    
    <!--
        Mobile menu, show/hide based on mobile menu state.
    
        Entering: "duration-200 ease-out"
        From: "opacity-0 scale-95"
        To: "opacity-100 scale-100"
        Leaving: "duration-100 ease-in"
        From: "opacity-100 scale-100"
        To: "opacity-0 scale-95"
    -->

    <div class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden dark:bg-gray-800 dark:text-gray-200">
        <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y-2 divide-gray-50">
        <div class="pt-5 pb-6 px-5">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </div>
        <div class="py-6 px-5 space-y-6">
            <div class="grid grid-cols-2 gap-y-4 gap-x-8">
                <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
                    Warehouses
                </a>
        
                <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
                    Stores
                </a>

                <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
                    Products
                </a>
            </div>
        </div>
        </div>
    </div>
</div>