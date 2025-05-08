<!-- Navbar -->
<header class="bg-white shadow-sm sticky top-0 z-30">
    <div class="flex items-center justify-between h-16 px-6">
        <!-- Mobile Menu Button -->
        <button @click="sidebarOpen = !sidebarOpen"
            class="md:hidden p-2.5 rounded-md hover:bg-gray-100 transition-colors duration-200">
            <i data-lucide="menu" class="w-6 h-6 text-gray-500"></i>
        </button>

        <!-- Search Bar -->
        <div class="hidden md:flex items-center flex-1 max-w-md mx-6">
            <div class="relative w-full">
                <input type="text" placeholder="Search..."
                    class="w-full pl-12 pr-4 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-200">
                <i data-lucide="search" class="absolute left-4 top-3 w-5 h-5 text-gray-400"></i>
            </div>
        </div>

        <!-- Right Side -->
        <div class="flex items-center space-x-6">
            <!-- Notifications -->
            <button
                class="relative p-2.5 text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded-full transition-colors duration-200">
                <i data-lucide="bell" class="w-6 h-6"></i>
                <span class="absolute top-1 right-1 w-2.5 h-2.5 bg-red-500 rounded-full"></span>
            </button>

            <!-- Profile Dropdown -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open"
                    class="flex items-center space-x-3 p-2 rounded-full hover:bg-gray-100 transition-colors duration-200">
                    <div
                        class="w-9 h-9 rounded-full bg-primary-500 flex items-center justify-center text-white font-medium">
                        {{ substr(Auth::user()->nama_lengkap ?? 'User', 0, 1) }}
                    </div>
                    <span
                        class="hidden md:block text-sm font-medium text-gray-700">{{ Auth::user()->nama_lengkap }}</span>
                    <i data-lucide="chevron-down" class="w-4 h-4 text-gray-500"></i>
                </button>

                <!-- Dropdown Menu -->
                <div x-show="open" @click.away="open = false"
                    class="absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-lg py-2 ring-1 ring-black ring-opacity-5"
                    x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="transform opacity-100 scale-100"
                    x-transition:leave-end="transform opacity-0 scale-95">
                    <a href="#"
                        class="block px-5 py-2.5 text-sm text-gray-700 hover:bg-gray-100 transition-colors duration-200">Profile</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="block w-full text-left px-5 py-2.5 text-sm text-gray-700 hover:bg-gray-100 transition-colors duration-200">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
