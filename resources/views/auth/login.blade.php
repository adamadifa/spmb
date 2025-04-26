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
    </style>
</head>

<body class="bg-login-pattern">
    <div class="min-h-screen flex">
        <!-- Left Column - Background & Content -->
        <div class="hidden lg:flex lg:w-2/3 bg-gradient-to-br from-primary-dark to-primary-light relative">
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

            <!-- Welcome Content -->
            <div class="relative w-full flex items-center justify-center p-16">
                <div class="w-full max-w-xl">
                    <div class="backdrop-blur-sm bg-white/10 rounded-2xl p-8">
                        <h1 class="text-4xl font-bold text-white mb-6">Selamat Datang di SPMB</h1>
                        <p class="text-lg text-white/90">
                            Sistem Informasi Penerimaan Mahasiswa Baru - Bergabunglah dengan kami untuk masa depan yang
                            lebih cerah.
                        </p>
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
                        class="mx-auto w-16 h-16 bg-gradient-to-r from-primary-dark to-primary-light rounded-full flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
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
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
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
                                <input id="email" name="email" type="email" required value="{{ old('email') }}"
                                    x-model="email" @input="validateEmail" @blur="validateEmail"
                                    :class="{ 'input-error': emailError }"
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
                                    </svg>
                                    <span x-text="passwordError"></span>
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
            }
        }
    </script>
</body>

</html>
