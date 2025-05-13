<!-- Sidebar -->
<aside x-show="!isMobile || sidebarOpen" x-transition:enter="transition ease-in-out duration-300 transform"
    x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
    x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0"
    x-transition:leave-end="-translate-x-full"
    class="fixed inset-y-0 left-0 bg-primary-800 text-white z-40 shadow-sidebar transition-all duration-300 ease-in-out"
    :class="{ 'w-72': !sidebarCollapsed || isMobile, 'w-20': sidebarCollapsed && !isMobile }">
    <!-- Logo and Toggle -->
    <div class="flex items-center justify-between h-16 px-4 border-b border-primary-700">
        <div class="flex items-center">
            <div class="h-14 w-14 rounded-md overflow-hidden">
                <img src="{{ asset('assets/image/logo.png') }}" alt="Logo" class="h-full w-auto">
            </div>
            <span x-show="!sidebarCollapsed || isMobile" x-transition:enter="transition ease-in-out duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in-out duration-300" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0" class="ml-2 text-lg font-semibold text-white">SPMB</span>
        </div>
        <button x-show="!isMobile" @click="toggleSidebar()" type="button"
            class="p-1 rounded-md hover:bg-primary-700 transition-colors duration-200 focus:outline-none">
            <i data-lucide="chevron-left" class="w-5 h-5 text-white transition-transform duration-300"
                :class="{ 'rotate-180': sidebarCollapsed }"></i>
        </button>
    </div>

    <!-- User Profile -->
    <div class="px-4 py-4 border-b border-primary-700">
        <div class="flex items-center space-x-3">
            <div class="flex-shrink-0">
                <div class="w-10 h-10 rounded-full bg-primary-600 flex items-center justify-center">
                    <span class="text-xl font-semibold text-white">
                        {{ substr(Auth::user()->nama_lengkap ?? 'User', 0, 1) }}
                    </span>
                </div>
            </div>
            <div x-show="!sidebarCollapsed || isMobile" x-transition:enter="transition ease-in-out duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in-out duration-300" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0" class="flex-1 min-w-0">
                <p class="text-sm font-medium text-white truncate">{{ Auth::user()->nama_lengkap }}</p>
                <p class="text-xs text-primary-200 truncate">{{ Auth::user()->email }}</p>
            </div>
        </div>
    </div>

    <!-- Menu Items -->
    <nav class="mt-4 space-y-1">
        <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2.5 text-sm transition-colors duration-200"
            :class="{
                'bg-primary-700 text-white': '{{ request()->routeIs('dashboard') }}',
                'text-primary-100 hover:bg-primary-700 hover:text-white': !'{{ request()->routeIs('dashboard') }}'
            }">
            <i data-lucide="home" class="w-5 h-5"
                :class="{
                    'text-white': '{{ request()->routeIs('dashboard') }}',
                    'text-primary-300': !'{{ request()->routeIs('dashboard') }}'
                }"></i>
            <span x-show="!sidebarCollapsed || isMobile" x-transition:enter="transition ease-in-out duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in-out duration-300" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0" class="ml-3">Dashboard</span>
        </a>
        <a href="{{ route('pendaftar.create') }}"
            class="flex items-center px-4 py-2.5 text-sm transition-colors duration-200"
            :class="{
                'bg-primary-700 text-white': '{{ request()->routeIs('pendaftar.*') }}',
                'text-primary-100 hover:bg-primary-700 hover:text-white': !'{{ request()->routeIs('pendaftar.*') }}'
            }">
            <i data-lucide="users" class="w-5 h-5"
                :class="{
                    'text-white': '{{ request()->routeIs('pendaftar.*') }}',
                    'text-primary-300': !'{{ request()->routeIs('pendaftar.*') }}'
                }"></i>
            <span x-show="!sidebarCollapsed || isMobile" x-transition:enter="transition ease-in-out duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in-out duration-300" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0" class="ml-3">Pendaftar</span>
        </a>
        <a href="{{ route('pembayaran.index') }}"
            class="flex items-center px-4 py-2.5 text-sm transition-colors duration-200"
            :class="{
                'bg-primary-700 text-white': '{{ request()->routeIs('pembayaran.*') }}',
                'text-primary-100 hover:bg-primary-700 hover:text-white': !'{{ request()->routeIs('pembayaran.*') }}'
            }">
            <i data-lucide="credit-card" class="w-5 h-5"
                :class="{
                    'text-white': '{{ request()->routeIs('pembayaran.*') }}',
                    'text-primary-300': !'{{ request()->routeIs('pembayaran.*') }}'
                }"></i>
            <span x-show="!sidebarCollapsed || isMobile" x-transition:enter="transition ease-in-out duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in-out duration-300" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0" class="ml-3">Pembayaran</span>
        </a>
        <a href="{{ route('pendaftar.upload-dokumen') }}"
            class="flex items-center px-4 py-2.5 text-sm transition-colors duration-200"
            :class="{
                'bg-primary-700 text-white': '{{ request()->routeIs('pendaftar.upload-dokumen') }}',
                'text-primary-100 hover:bg-primary-700 hover:text-white': !
                    '{{ request()->routeIs('pendaftar.upload-dokumen') }}'
            }">
            <i data-lucide="upload" class="w-5 h-5"
                :class="{
                    'text-white': '{{ request()->routeIs('pendaftar.upload-dokumen') }}',
                    'text-primary-300': !'{{ request()->routeIs('pendaftar.upload-dokumen') }}'
                }"></i>
            <span x-show="!sidebarCollapsed || isMobile" x-transition:enter="transition ease-in-out duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in-out duration-300" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0" class="ml-3">Upload Dokumen</span>
        </a>
    </nav>
</aside>

<!-- Overlay for mobile -->
<div x-show="isMobile && sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 bg-black bg-opacity-50 z-10"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
</div>
