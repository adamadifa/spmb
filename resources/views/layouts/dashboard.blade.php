<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Figtree', 'sans-serif'],
                    },
                    colors: {
                        primary: {
                            dark: '#034e46',
                            light: '#069687',
                        }
                    }
                }
            }
        }
    </script>
</head>

<body class="font-sans antialiased bg-gray-50">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-72 bg-white shadow-lg flex flex-col fixed h-screen">
            <!-- Sidebar Header -->
            <div class="flex items-center justify-between h-16 px-4 border-b border-gray-200">
                <div class="flex items-center">
                    <div
                        class="w-8 h-8 bg-gradient-to-r from-primary-dark to-primary-light rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                    </div>
                    <span class="ml-2 text-lg font-semibold text-gray-800">SPMB</span>
                </div>
            </div>

            <!-- Sidebar Navigation -->
            <nav class="flex-1 px-2 py-4 space-y-1 overflow-y-auto">
                <div class="mb-4">
                    <h3 class="px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">MENU</h3>
                    <div class="mt-2 space-y-1">
                        <a href="{{ route('dashboard') }}"
                            class="flex items-center px-4 py-3 text-gray-700 bg-gray-100 rounded-lg group">
                            <i class="fas fa-home w-5 h-5 text-primary-dark"></i>
                            <span class="ml-3">Dashboard</span>
                        </a>

                        <a href="#"
                            class="flex items-center px-4 py-3 text-gray-600 rounded-lg hover:bg-gray-100 group">
                            <i class="fas fa-user-graduate w-5 h-5 text-gray-500 group-hover:text-primary-dark"></i>
                            <span class="ml-3">Pendaftaran</span>
                        </a>

                        <a href="#"
                            class="flex items-center px-4 py-3 text-gray-600 rounded-lg hover:bg-gray-100 group">
                            <i class="fas fa-file-alt w-5 h-5 text-gray-500 group-hover:text-primary-dark"></i>
                            <span class="ml-3">Berkas</span>
                        </a>

                        <a href="#"
                            class="flex items-center px-4 py-3 text-gray-600 rounded-lg hover:bg-gray-100 group">
                            <i class="fas fa-calendar-alt w-5 h-5 text-gray-500 group-hover:text-primary-dark"></i>
                            <span class="ml-3">Jadwal</span>
                        </a>

                        <a href="#"
                            class="flex items-center px-4 py-3 text-gray-600 rounded-lg hover:bg-gray-100 group">
                            <i class="fas fa-info-circle w-5 h-5 text-gray-500 group-hover:text-primary-dark"></i>
                            <span class="ml-3">Informasi</span>
                        </a>
                    </div>
                </div>

                <div class="mb-4">
                    <h3 class="px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">SUPPORT</h3>
                    <div class="mt-2 space-y-1">
                        <a href="#"
                            class="flex items-center px-4 py-3 text-gray-600 rounded-lg hover:bg-gray-100 group">
                            <i class="fas fa-comments w-5 h-5 text-gray-500 group-hover:text-primary-dark"></i>
                            <span class="ml-3">Chat</span>
                        </a>

                        <a href="#"
                            class="flex items-center px-4 py-3 text-gray-600 rounded-lg hover:bg-gray-100 group">
                            <i class="fas fa-envelope w-5 h-5 text-gray-500 group-hover:text-primary-dark"></i>
                            <span class="ml-3">Email</span>
                        </a>

                        <a href="#"
                            class="flex items-center px-4 py-3 text-gray-600 rounded-lg hover:bg-gray-100 group">
                            <i class="fas fa-file-invoice w-5 h-5 text-gray-500 group-hover:text-primary-dark"></i>
                            <span class="ml-3">Invoice</span>
                        </a>
                    </div>
                </div>

                <div class="mb-4">
                    <h3 class="px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">OTHERS</h3>
                    <div class="mt-2 space-y-1">
                        <a href="#"
                            class="flex items-center px-4 py-3 text-gray-600 rounded-lg hover:bg-gray-100 group">
                            <i class="fas fa-chart-line w-5 h-5 text-gray-500 group-hover:text-primary-dark"></i>
                            <span class="ml-3">Charts</span>
                        </a>

                        <a href="#"
                            class="flex items-center px-4 py-3 text-gray-600 rounded-lg hover:bg-gray-100 group">
                            <i class="fas fa-palette w-5 h-5 text-gray-500 group-hover:text-primary-dark"></i>
                            <span class="ml-3">UI Elements</span>
                        </a>

                        <a href="#"
                            class="flex items-center px-4 py-3 text-gray-600 rounded-lg hover:bg-gray-100 group">
                            <i class="fas fa-lock w-5 h-5 text-gray-500 group-hover:text-primary-dark"></i>
                            <span class="ml-3">Authentication</span>
                        </a>
                    </div>
                </div>
            </nav>

            <!-- Sidebar Footer -->
            <div class="p-4 border-t border-gray-200">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div
                            class="w-10 h-10 rounded-full bg-gradient-to-r from-primary-dark to-primary-light flex items-center justify-center">
                            <span
                                class="text-white font-semibold">{{ substr(Auth::user()->nama_lengkap ?? 'User', 0, 1) }}</span>
                        </div>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-700">{{ Auth::user()->nama_lengkap ?? 'User' }}</p>
                        <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 ml-72">
            <!-- Top Navbar -->
            <header class="bg-white shadow-sm z-10">
                <div class="flex items-center justify-between h-16 px-4 sm:px-6">
                    <div class="flex-1 flex">
                        <h1 class="text-2xl font-semibold text-gray-900">{{ $header ?? 'Dashboard' }}</h1>
                    </div>
                    <div class="ml-4 flex items-center md:ml-6 space-x-4">
                        <!-- Search -->
                        <div class="relative">
                            <input type="text" placeholder="Search..."
                                class="w-64 px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary-light focus:border-transparent">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                        </div>

                        <!-- Notifications -->
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open"
                                class="p-2 rounded-full text-gray-500 hover:text-gray-600 hover:bg-gray-100">
                                <i class="fas fa-bell"></i>
                                <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-500"></span>
                            </button>

                            <div x-show="open" @click.away="open = false"
                                class="origin-top-right absolute right-0 mt-2 w-80 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                                <div class="py-1">
                                    <div class="px-4 py-2 border-b border-gray-100">
                                        <h3 class="text-sm font-semibold text-gray-700">Notifications</h3>
                                    </div>
                                    <div class="max-h-64 overflow-y-auto">
                                        <a href="#" class="block px-4 py-3 hover:bg-gray-50">
                                            <div class="flex items-start">
                                                <div class="flex-shrink-0">
                                                    <div
                                                        class="w-8 h-8 rounded-full bg-blue-100 text-blue-500 flex items-center justify-center">
                                                        <i class="fas fa-user-plus"></i>
                                                    </div>
                                                </div>
                                                <div class="ml-3">
                                                    <p class="text-sm font-medium text-gray-800">Ahmad Fadillah
                                                        mendaftar</p>
                                                    <p class="text-xs text-gray-500">2 jam yang lalu</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="block px-4 py-3 hover:bg-gray-50">
                                            <div class="flex items-start">
                                                <div class="flex-shrink-0">
                                                    <div
                                                        class="w-8 h-8 rounded-full bg-green-100 text-green-500 flex items-center justify-center">
                                                        <i class="fas fa-check"></i>
                                                    </div>
                                                </div>
                                                <div class="ml-3">
                                                    <p class="text-sm font-medium text-gray-800">Berkas Rudi Hartono
                                                        diverifikasi</p>
                                                    <p class="text-xs text-gray-500">5 jam yang lalu</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="px-4 py-2 border-t border-gray-100">
                                        <a href="#"
                                            class="text-sm text-primary-dark hover:text-primary-light">Lihat Semua
                                            Notifikasi</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Profile dropdown -->
                        <div class="relative" x-data="{ open: false }">
                            <div>
                                <button @click="open = !open"
                                    class="flex items-center max-w-xs text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-light">
                                    <div
                                        class="w-8 h-8 rounded-full bg-gradient-to-r from-primary-dark to-primary-light flex items-center justify-center">
                                        <span
                                            class="text-white font-semibold">{{ substr(Auth::user()->nama_lengkap ?? 'User', 0, 1) }}</span>
                                    </div>
                                </button>
                            </div>

                            <div x-show="open" @click.away="open = false"
                                class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                                <div class="py-1">
                                    <a href="{{ route('profile.edit') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profil</a>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Pengaturan
                                        Akun</a>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Bantuan</a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit"
                                            class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                            Keluar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 p-4 sm:p-6 lg:p-8">
                {{ $slot }}
            </main>

            <!-- Footer -->
            <footer class="bg-white border-t border-gray-200 py-4 px-4 sm:px-6 lg:px-8">
                <div class="text-center text-sm text-gray-500">
                    &copy; {{ date('Y') }} SPMB. All rights reserved.
                </div>
            </footer>
        </div>
    </div>
</body>

</html>
