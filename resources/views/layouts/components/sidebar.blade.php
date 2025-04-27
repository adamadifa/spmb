<!-- Sidebar -->
<aside x-show="!isMobile || sidebarOpen" x-transition:enter="transition ease-in-out duration-300 transform" x-transition:enter-start="-translate-x-full"
    x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0"
    x-transition:leave-end="-translate-x-full" class="fixed inset-y-0 left-0 w-72 bg-white text-gray-800 z-20 shadow-sidebar"
    :class="{ 'w-20': sidebarCollapsed && !isMobile }">
    <!-- Logo and Toggle -->
    <div class="flex items-center justify-between h-16 px-4 border-b border-gray-200">
        <div class="flex items-center">
            <img src="https://placehold.co/32x32/0ea5e9/ffffff?text=SPMB" alt="Logo" class="h-8 w-auto">
            <span x-show="!sidebarCollapsed || isMobile" class="ml-2 text-lg font-semibold text-gray-900">SPMB</span>
        </div>
        <button x-show="!isMobile" @click="sidebarCollapsed = !sidebarCollapsed"
            class="p-1 rounded-md hover:bg-gray-100 transition-colors duration-200">
            <i data-lucide="chevron-left" class="w-5 h-5 text-gray-500" :class="{ 'rotate-180': sidebarCollapsed }"></i>
        </button>
    </div>

    <!-- User Profile -->
    <div class="px-4 py-4 border-b border-gray-200">
        <div class="flex items-center space-x-3">
            <div class="flex-shrink-0">
                <div class="w-10 h-10 rounded-full bg-primary-500 flex items-center justify-center">
                    <span class="text-xl font-semibold text-white">
                        {{ substr(Auth::user()->nama_lengkap ?? 'User', 0, 1) }}
                    </span>
                </div>
            </div>
            <div x-show="!sidebarCollapsed || isMobile" class="flex-1 min-w-0">
                <p class="text-sm font-medium text-gray-900 truncate">{{ Auth::user()->nama_lengkap }}</p>
                <p class="text-xs text-gray-500 truncate">{{ Auth::user()->email }}</p>
            </div>
        </div>
    </div>

    <!-- Menu Items -->
    <nav class="mt-4 space-y-1">
        <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2.5 text-sm transition-colors duration-200"
            :class="{
                'bg-primary-50 text-primary-600': request() - > routeIs('dashboard'),
                'text-gray-700 hover:bg-gray-100': !request() - > routeIs('dashboard')
            }">
            <i data-lucide="home" class="w-5 h-5"
                :class="{
                    'text-primary-500': request() - > routeIs('dashboard'),
                    'text-gray-500': !request() - > routeIs('dashboard')
                }"></i>
            <span x-show="!sidebarCollapsed || isMobile" class="ml-3">Dashboard</span>
        </a>
        <a href="{{ route('pendaftar.create') }}" class="flex items-center px-4 py-2.5 text-sm transition-colors duration-200"
            :class="{
                'bg-primary-50 text-primary-600': request() - > routeIs('pendaftar.*'),
                'text-gray-700 hover:bg-gray-100': !request() - > routeIs('pendaftar.*')
            }">
            <i data-lucide="users" class="w-5 h-5"
                :class="{
                    'text-primary-500': request() - > routeIs('pendaftar.*'),
                    'text-gray-500': !request() - > routeIs('pendaftar.*')
                }"></i>
            <span x-show="!sidebarCollapsed || isMobile" class="ml-3">Pendaftar</span>
        </a>
        <a href="#" class="flex items-center px-4 py-2.5 text-sm transition-colors duration-200"
            :class="{
                'bg-primary-50 text-primary-600': request() - > routeIs('pengumuman.*'),
                'text-gray-700 hover:bg-gray-100': !request() - > routeIs('pengumuman.*')
            }">
            <i data-lucide="megaphone" class="w-5 h-5"
                :class="{
                    'text-primary-500': request() - > routeIs('pengumuman.*'),
                    'text-gray-500': !request() - > routeIs('pengumuman.*')
                }"></i>
            <span x-show="!sidebarCollapsed || isMobile" class="ml-3">Pengumuman</span>
        </a>
        <a href="#" class="flex items-center px-4 py-2.5 text-sm transition-colors duration-200"
            :class="{
                'bg-primary-50 text-primary-600': request() - > routeIs('jadwal.*'),
                'text-gray-700 hover:bg-gray-100': !request() - > routeIs('jadwal.*')
            }">
            <i data-lucide="calendar" class="w-5 h-5"
                :class="{
                    'text-primary-500': request() - > routeIs('jadwal.*'),
                    'text-gray-500': !request() - > routeIs('jadwal.*')
                }"></i>
            <span x-show="!sidebarCollapsed || isMobile" class="ml-3">Jadwal</span>
        </a>
        <a href="#" class="flex items-center px-4 py-2.5 text-sm transition-colors duration-200"
            :class="{
                'bg-primary-50 text-primary-600': request() - > routeIs('pengaturan.*'),
                'text-gray-700 hover:bg-gray-100': !request() - > routeIs('pengaturan.*')
            }">
            <i data-lucide="settings" class="w-5 h-5"
                :class="{
                    'text-primary-500': request() - > routeIs('pengaturan.*'),
                    'text-gray-500': !request() - > routeIs('pengaturan.*')
                }"></i>
            <span x-show="!sidebarCollapsed || isMobile" class="ml-3">Pengaturan</span>
        </a>
    </nav>
</aside>

<!-- Overlay for mobile -->
<div x-show="isMobile && sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 bg-black bg-opacity-50 z-10"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
</div>
