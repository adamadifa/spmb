<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
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

    <!-- Alpine.js CDN -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        /* Custom styles for login page */
        .bg-login-pattern {
            background-color: #f3f4f6;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23034646' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        /* Background Image with Overlay for Left Column */
        .bg-islamic-school {
            background-image: url('/assets/image/bgalamin.png');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }

        .bg-islamic-school::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to right, rgba(3, 78, 70, 0.95), rgba(6, 150, 135, 0.85));
            z-index: 1;
        }

        .bg-islamic-school>* {
            position: relative;
            z-index: 2;
        }

        /* Error styles */
        .input-error {
            border-color: #ef4444 !important;
        }

        .input-error:focus {
            border-color: #ef4444 !important;
            ring-color: #ef4444 !important;
        }

        .error-message {
            display: flex;
            align-items: center;
            margin-top: 0.5rem;
            font-size: 0.875rem;
            color: #ef4444;
        }

        .error-icon {
            margin-right: 0.5rem;
        }

        /* Custom animations */
        @keyframes float-slow {

            0%,
            100% {
                transform: translateY(0) translateX(0);
            }

            50% {
                transform: translateY(-10px) translateX(5px);
            }
        }

        @keyframes float-medium {

            0%,
            100% {
                transform: translateY(0) translateX(0);
            }

            50% {
                transform: translateY(-8px) translateX(-8px);
            }
        }

        @keyframes float-fast {

            0%,
            100% {
                transform: translateY(0) translateX(0);
            }

            50% {
                transform: translateY(-5px) translateX(5px);
            }
        }

        @keyframes pulse-slow {

            0%,
            100% {
                transform: scale(1);
                opacity: 0.3;
            }

            50% {
                transform: scale(1.05);
                opacity: 0.5;
            }
        }

        @keyframes pulse-medium {

            0%,
            100% {
                transform: scale(1);
                opacity: 0.2;
            }

            50% {
                transform: scale(1.03);
                opacity: 0.4;
            }
        }

        @keyframes pulse-fast {

            0%,
            100% {
                transform: scale(1);
                opacity: 0.1;
            }

            50% {
                transform: scale(1.02);
                opacity: 0.3;
            }
        }

        /* Animasi berpencar - back to original distances but with slight adjustments */
        @keyframes scatter-topLeft {
            0% {
                transform: translate(0, 0);
            }

            100% {
                transform: translate(-250px, -200px);
            }
        }

        @keyframes scatter-topRight {
            0% {
                transform: translate(0, 0);
            }

            100% {
                transform: translate(250px, -200px);
            }
        }

        @keyframes scatter-bottomLeft {
            0% {
                transform: translate(0, 0);
            }

            100% {
                transform: translate(-250px, 280px);
                /* Slightly increased from original */
            }
        }

        @keyframes scatter-bottomRight {
            0% {
                transform: translate(0, 0);
            }

            100% {
                transform: translate(250px, 280px);
                /* Slightly increased from original */
            }
        }

        .animate-scatter-topLeft {
            animation: scatter-topLeft 2.5s cubic-bezier(0.22, 1, 0.36, 1) forwards;
        }

        .animate-scatter-topRight {
            animation: scatter-topRight 2.5s cubic-bezier(0.22, 1, 0.36, 1) forwards;
        }

        .animate-scatter-bottomLeft {
            animation: scatter-bottomLeft 2.5s cubic-bezier(0.22, 1, 0.36, 1) forwards;
        }

        .animate-scatter-bottomRight {
            animation: scatter-bottomRight 2.5s cubic-bezier(0.22, 1, 0.36, 1) forwards;
        }

        .animate-float-slow {
            animation: float-slow 4s ease-in-out infinite;
        }

        .animate-float-medium {
            animation: float-medium 3s ease-in-out infinite;
        }

        .animate-float-fast {
            animation: float-fast 2s ease-in-out infinite;
        }

        .animate-pulse-slow {
            animation: pulse-slow 4s ease-in-out infinite;
        }

        .animate-pulse-medium {
            animation: pulse-medium 3s ease-in-out infinite;
        }

        .animate-pulse-fast {
            animation: pulse-fast 2s ease-in-out infinite;
        }
    </style>
</head>

<body class="bg-login-pattern">
    <div class="min-h-screen flex">
        <!-- Left Column - Background & Content -->
        <div class="hidden lg:flex lg:w-2/3 bg-islamic-school relative overflow-hidden">
            <div class="absolute inset-0">
                <div class="absolute inset-0 bg-black opacity-20"></div>
                <!-- Decorative Pattern -->
                <div class="absolute right-0 top-0 mr-16 mt-16">
                    <div class="flex space-x-1">
                        @for ($i = 0; $i < 3; $i++)
                            <div class="h-2 w-2 rounded-full bg-white opacity-60"></div>
                        @endfor
                    </div>
                </div>
            </div>

            <!-- Student Image with Gradient Overlay -->
            <div class="absolute inset-0 w-full h-full">
                <div class="relative w-full h-full">
                    <!-- Gradient Overlay -->
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-primary-dark via-transparent to-transparent opacity-90">
                    </div>

                    <!-- Floating Elements -->
                    <div class="absolute inset-0 overflow-hidden">
                        <!-- Floating Circle 1 -->
                        <div
                            class="absolute top-1/4 left-1/4 w-16 h-16 rounded-full bg-white/10 backdrop-blur-sm animate-float-slow">
                        </div>
                        <!-- Floating Circle 2 -->
                        <div
                            class="absolute bottom-1/3 right-1/4 w-12 h-12 rounded-full bg-white/5 backdrop-blur-sm animate-float-medium">
                        </div>
                        <!-- Floating Circle 3 -->
                        <div
                            class="absolute top-1/3 right-1/3 w-10 h-10 rounded-full bg-white/15 backdrop-blur-sm animate-float-fast">
                        </div>
                    </div>

                    <!-- Images Container - Back to normal size but with position adjustment -->
                    <div class="absolute inset-0 flex items-center justify-center" style="height: 110%; top: 0%;">
                        <!-- Model Image Container - Kiri Atas -->
                        <div
                            class="absolute w-[260px] h-[260px] flex items-center justify-center group animate-scatter-topLeft">
                            <!-- Animated Border -->
                            <div
                                class="absolute inset-0 rounded-full border-4 border-primary-light/30 animate-pulse-slow">
                            </div>
                            <div
                                class="absolute inset-0 rounded-full border-4 border-primary-light/20 animate-pulse-medium">
                            </div>
                            <div
                                class="absolute inset-0 rounded-full border-4 border-primary-light/10 animate-pulse-fast">
                            </div>

                            <!-- Glowing Orbs - Beragam ukuran dan posisi -->
                            <div
                                class="absolute top-[-10px] left-[60%] w-5 h-5 rounded-full bg-primary-light/40 animate-float-slow">
                            </div>
                            <div
                                class="absolute bottom-[10px] right-[40%] w-4 h-4 rounded-full bg-primary-light/40 animate-float-medium">
                            </div>
                            <div
                                class="absolute top-[40%] left-[-5px] w-6 h-6 rounded-full bg-primary-light/40 animate-float-fast">
                            </div>
                            <div
                                class="absolute top-[30%] right-[10px] w-3 h-3 rounded-full bg-primary-light/40 animate-float-slow">
                            </div>

                            <div class="relative transform transition-all duration-500 group-hover:scale-105">
                                <!-- Glow Effect -->
                                <div
                                    class="absolute inset-0 bg-primary-light/20 rounded-full blur-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                </div>
                                <!-- Main Image with Mask -->
                                <div class="relative flex items-center justify-center">
                                    <!-- Image Mask Gradient -->
                                    <div
                                        class="absolute bottom-0 left-0 right-0 h-24 bg-gradient-to-t from-primary-dark to-transparent">
                                    </div>
                                    <!-- Main Image -->
                                    <img src="https://persis80alamin.com/assets/images/model1.png" alt="Student"
                                        class="w-auto h-[180px] object-contain transform transition-all duration-500 group-hover:translate-y-[-10px]">
                                </div>
                            </div>
                        </div>

                        <!-- TK Image Container - Kanan Atas -->
                        <div
                            class="absolute w-[210px] h-[210px] flex items-center justify-center group animate-scatter-topRight">
                            <!-- Animated Border -->
                            <div
                                class="absolute inset-0 rounded-full border-4 border-primary-light/30 animate-pulse-slow">
                            </div>
                            <div
                                class="absolute inset-0 rounded-full border-4 border-primary-light/20 animate-pulse-medium">
                            </div>
                            <div
                                class="absolute inset-0 rounded-full border-4 border-primary-light/10 animate-pulse-fast">
                            </div>

                            <!-- Glowing Orbs - Beragam ukuran dan posisi -->
                            <div
                                class="absolute top-[5px] left-[45%] w-3 h-3 rounded-full bg-primary-light/40 animate-float-slow">
                            </div>
                            <div
                                class="absolute bottom-[-5px] right-[60%] w-7 h-7 rounded-full bg-primary-light/40 animate-float-medium">
                            </div>
                            <div
                                class="absolute top-[55%] left-[0px] w-4 h-4 rounded-full bg-primary-light/40 animate-float-fast">
                            </div>
                            <div
                                class="absolute top-[20%] right-[-5px] w-5 h-5 rounded-full bg-primary-light/40 animate-float-slow">
                            </div>

                            <div class="relative transform transition-all duration-500 group-hover:scale-105">
                                <!-- Glow Effect -->
                                <div
                                    class="absolute inset-0 bg-primary-light/20 rounded-full blur-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                </div>
                                <!-- Main Image with Mask -->
                                <div class="relative flex items-center justify-center">
                                    <!-- Image Mask Gradient -->
                                    <div
                                        class="absolute bottom-0 left-0 right-0 h-24 bg-gradient-to-t from-primary-dark to-transparent">
                                    </div>
                                    <!-- Main Image -->
                                    <img src="https://persis80alamin.com/assets/images/tk.png" alt="TK"
                                        class="w-auto h-[150px] object-contain transform transition-all duration-500 group-hover:translate-y-[-10px]">
                                </div>
                            </div>
                        </div>

                        <!-- SDIT Image Container - Kiri Bawah -->
                        <div
                            class="absolute w-[240px] h-[240px] flex items-center justify-center group animate-scatter-bottomLeft">
                            <!-- Animated Border -->
                            <div
                                class="absolute inset-0 rounded-full border-4 border-primary-light/30 animate-pulse-slow">
                            </div>
                            <div
                                class="absolute inset-0 rounded-full border-4 border-primary-light/20 animate-pulse-medium">
                            </div>
                            <div
                                class="absolute inset-0 rounded-full border-4 border-primary-light/10 animate-pulse-fast">
                            </div>

                            <!-- Glowing Orbs - Beragam ukuran dan posisi -->
                            <div
                                class="absolute top-[0px] left-[55%] w-6 h-6 rounded-full bg-primary-light/40 animate-float-slow">
                            </div>
                            <div
                                class="absolute bottom-[0px] right-[35%] w-3 h-3 rounded-full bg-primary-light/40 animate-float-medium">
                            </div>
                            <div
                                class="absolute top-[60%] left-[-8px] w-4 h-4 rounded-full bg-primary-light/40 animate-float-fast">
                            </div>
                            <div
                                class="absolute top-[25%] right-[-5px] w-7 h-7 rounded-full bg-primary-light/40 animate-float-slow">
                            </div>

                            <div class="relative transform transition-all duration-500 group-hover:scale-105">
                                <!-- Glow Effect -->
                                <div
                                    class="absolute inset-0 bg-primary-light/20 rounded-full blur-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                </div>
                                <!-- Main Image with Mask -->
                                <div class="relative flex items-center justify-center">
                                    <!-- Image Mask Gradient -->
                                    <div
                                        class="absolute bottom-0 left-0 right-0 h-24 bg-gradient-to-t from-primary-dark to-transparent">
                                    </div>
                                    <!-- Main Image -->
                                    <img src="https://persis80alamin.com/assets/images/sdit.png" alt="SDIT"
                                        class="w-auto h-[170px] object-contain transform transition-all duration-500 group-hover:translate-y-[-10px]">
                                </div>
                            </div>
                        </div>

                        <!-- MTS Image Container - Kanan Bawah -->
                        <div
                            class="absolute w-[190px] h-[190px] flex items-center justify-center group animate-scatter-bottomRight">
                            <!-- Animated Border -->
                            <div
                                class="absolute inset-0 rounded-full border-4 border-primary-light/30 animate-pulse-slow">
                            </div>
                            <div
                                class="absolute inset-0 rounded-full border-4 border-primary-light/20 animate-pulse-medium">
                            </div>
                            <div
                                class="absolute inset-0 rounded-full border-4 border-primary-light/10 animate-pulse-fast">
                            </div>

                            <!-- Glowing Orbs - Beragam ukuran dan posisi -->
                            <div
                                class="absolute top-[-5px] left-[40%] w-4 h-4 rounded-full bg-primary-light/40 animate-float-slow">
                            </div>
                            <div
                                class="absolute bottom-[5px] right-[65%] w-5 h-5 rounded-full bg-primary-light/40 animate-float-medium">
                            </div>
                            <div
                                class="absolute top-[45%] left-[-2px] w-3 h-3 rounded-full bg-primary-light/40 animate-float-fast">
                            </div>
                            <div
                                class="absolute top-[35%] right-[-8px] w-6 h-6 rounded-full bg-primary-light/40 animate-float-slow">
                            </div>

                            <div class="relative transform transition-all duration-500 group-hover:scale-105">
                                <!-- Glow Effect -->
                                <div
                                    class="absolute inset-0 bg-primary-light/20 rounded-full blur-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                </div>
                                <!-- Main Image with Mask -->
                                <div class="relative flex items-center justify-center">
                                    <!-- Image Mask Gradient -->
                                    <div
                                        class="absolute bottom-0 left-0 right-0 h-24 bg-gradient-to-t from-primary-dark to-transparent">
                                    </div>
                                    <!-- Main Image -->
                                    <img src="https://persis80alamin.com/assets/images/mts.png" alt="MTS"
                                        class="w-auto h-[130px] object-contain transform transition-all duration-500 group-hover:translate-y-[-10px]">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Welcome Content - Back to center but with higher z-index and transparent background -->
            <div class="absolute inset-0 flex items-center justify-center z-20 pointer-events-none">
                <div class="w-full max-w-2xl pointer-events-auto">
                    <div class="flex flex-col items-center">
                        <!-- Logo on top - Changed to image -->
                        <div
                            class="mb-6 w-24 h-24 rounded-full flex items-center justify-center border-4 border-white/30 shadow-lg overflow-hidden bg-white">
                            <img src="{{ asset('assets/image/logo.png') }}" alt="Logo Persis"
                                class="w-20 h-20 object-contain">
                        </div>

                        <!-- Welcome box with higher transparency -->
                        <div
                            class="backdrop-blur-sm bg-white/5 rounded-2xl p-10 shadow-xl border border-white/20 w-full relative">
                            <h1 class="text-4xl font-bold text-white mb-6 text-center">Selamat Datang di SPMB</h1>
                            <p class="text-lg text-white/90 text-center mb-4">
                                Sistem Penerimaan Murid Baru <br>
                                Pesantren Persatuan Islam 80 Al Amin Sindangkasih
                            </p>
                            <p class="text-white/80 text-center text-sm">
                                Silahkan masuk menggunakan akun yang telah terdaftar atau daftar jika belum memiliki
                                akun.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column - Login Form -->
        <div class="w-full lg:w-1/3 flex items-center justify-center p-8 lg:p-16 bg-white">
            <div class="w-full max-w-md space-y-8">
                <!-- Logo -->
                <div class="text-center">
                    <div
                        class="mx-auto w-24 h-24 rounded-full flex items-center justify-center border-2 border-primary-light/30 overflow-hidden bg-white">
                        <img src="{{ asset('assets/image/logo.png') }}" alt="Logo Persis"
                            class="w-24 h-24 object-contain">
                    </div>
                    <h2 class="mt-6 text-3xl font-bold text-gray-900">Login ke Akun Anda</h2>
                    <p class="mt-2 text-sm text-gray-600">Masukkan kredensial Anda untuk melanjutkan</p>
                </div>

                <!-- Session Status -->
                @if (session('status'))
                    <div class="bg-primary-light/10 border-l-4 border-primary-light p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-primary-light" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-primary-dark">{{ session('status') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Login Form -->
                <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-6" x-data="loginForm()">
                    @csrf
                    <div class="space-y-5">
                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <div class="mt-1 relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                    </svg>
                                </div>
                                <input id="email" name="email" type="email" required
                                    value="{{ old('email') }}" x-model="email" @input="validateEmail"
                                    @blur="validateEmail" :class="{ 'input-error': emailError }"
                                    class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-light focus:border-primary-light sm:text-sm @error('email') input-error @enderror"
                                    placeholder="nama@email.com">
                            </div>
                            <template x-if="emailError">
                                <div class="error-message">
                                    <svg class="h-4 w-4 error-icon" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span x-text="emailError"></span>
                                </div>
                            </template>
                            @error('email')
                                <div class="error-message">
                                    <svg class="h-4 w-4 error-icon" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            <div class="mt-1 relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>
                                <input id="password" name="password" type="password" required x-model="password"
                                    @input="validatePassword" @blur="validatePassword"
                                    :class="{ 'input-error': passwordError }"
                                    class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-light focus:border-primary-light sm:text-sm @error('password') input-error @enderror"
                                    placeholder="••••••••">
                            </div>
                            <template x-if="passwordError">
                                <div class="error-message">
                                    <svg class="h-4 w-4 error-icon" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg><span x-text="passwordError"></span>
                                </div>
                            </template>
                            @error('password')
                                <div class="error-message">
                                    <svg class="h-4 w-4 error-icon" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember" name="remember" type="checkbox"
                                    class="h-4 w-4 text-primary-light focus:ring-primary-light border-gray-300 rounded">
                                <label for="remember" class="ml-2 block text-sm text-gray-700">Ingat saya</label>
                            </div>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}"
                                    class="text-sm font-medium text-primary-light hover:text-primary-dark">
                                    Lupa password?
                                </a>
                            @endif
                        </div>
                    </div>

                    <div>
                        <button type="submit" :disabled="!isFormValid"
                            :class="{ 'opacity-50 cursor-not-allowed': !isFormValid }"
                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-primary-dark to-primary-light hover:from-primary-dark/90 hover:to-primary-light/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-light transition-all duration-150">
                            Masuk ke Akun
                        </button>
                    </div>
                </form>

                <!-- Register Link -->
                <div class="text-center">
                    <p class="text-sm text-gray-600">
                        Belum punya akun?
                        <a href="{{ route('register') }}"
                            class="font-medium text-primary-light hover:text-primary-dark">
                            Daftar sekarang
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function loginForm() {
            return {
                email: '{{ old('email') }}',
                password: '',
                emailError: '',
                passwordError: '',

                validateEmail() {
                    if (!this.email) {
                        this.emailError = 'Email wajib diisi';
                    } else if (!this.isValidEmail(this.email)) {
                        this.emailError = 'Format email tidak valid';
                    } else {
                        this.emailError = '';
                    }
                },

                validatePassword() {
                    if (!this.password) {
                        this.passwordError = 'Password wajib diisi';
                    } else if (this.password.length < 8) {
                        this.passwordError = 'Password minimal 8 karakter';
                    } else {
                        this.passwordError = '';
                    }
                },

                isValidEmail(email) {
                    const re =
                        /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                    return re.test(String(email).toLowerCase());
                },

                get isFormValid() {
                    return this.email && !this.emailError && this.password && !this.passwordError;
                }
            };
        }
    </script>
</body>

</html>
