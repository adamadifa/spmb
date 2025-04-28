<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPMB Admin Dashboard</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Headless UI -->
    <script src="https://unpkg.com/@headlessui/react@1.7.17/dist/index.umd.min.js"></script>

    <!-- Framer Motion -->
    <script src="https://unpkg.com/framer-motion@10.16.4/dist/framer-motion.js"></script>

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/airbnb.css">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0fdfa',
                            100: '#ccf2ed',
                            200: '#99e5db',
                            300: '#66d8c9',
                            400: '#33cbb7',
                            500: '#069687',
                            600: '#057870',
                            700: '#045a59',
                            800: '#034e46',
                            900: '#023c37',
                        }
                    },
                    boxShadow: {
                        'sidebar': '0 0 2rem 0 rgba(136, 152, 170, .15)',
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-50">
    <div x-data="{
        sidebarOpen: false,
        sidebarCollapsed: localStorage.getItem('sidebarCollapsed') === 'true',
        isMobile: window.innerWidth < 768,
        init() {
            this.$watch('isMobile', (value) => {
                if (value) {
                    this.sidebarOpen = false;
                }
            });
            this.$watch('sidebarCollapsed', (value) => {
                localStorage.setItem('sidebarCollapsed', value);
            });
            window.addEventListener('resize', () => {
                this.isMobile = window.innerWidth < 768;
            });
        }
    }" class="min-h-screen">
        @include('layouts.components.sidebar')

        <!-- Main Content -->
        <div class="flex flex-col min-h-screen transition-all duration-300 ease-in-out"
            :class="{ 'ml-72': !sidebarCollapsed && !isMobile, 'ml-20': sidebarCollapsed && !isMobile }">
            @include('layouts.components.navbar')

            <!-- Content -->
            <main class="flex-1 p-6">
                @yield('content')
            </main>

            @include('layouts.components.footer')
        </div>
    </div>

    <script>
        // Initialize Lucide Icons
        lucide.createIcons();

        // Auto-hide sidebar on mobile
        window.addEventListener('resize', function() {
            if (window.innerWidth < 768) {
                this.document.querySelector('[x-data]').__x.$data.sidebarOpen = false;
            }
        });
    </script>

    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr("input[type=text][id=tanggal_lahir]", {
                dateFormat: "Y-m-d",
                allowInput: true,
            });
        });
    </script>
</body>

</html>
