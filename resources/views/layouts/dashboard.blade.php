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

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
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
        sidebarCollapsed: false,
        isMobile: window.innerWidth < 768,
        init() {
            this.$watch('isMobile', (value) => {
                if (value) {
                    this.sidebarOpen = false;
                }
            });
            window.addEventListener('resize', () => {
                this.isMobile = window.innerWidth < 768;
            });
        }
    }" class="min-h-screen">
        @include('layouts.components.sidebar')

        <!-- Main Content -->
        <div class="flex flex-col min-h-screen transition-all duration-300"
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
</body>

</html>
