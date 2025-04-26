<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register - {{ config('app.name', 'Laravel') }}</title>

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
        /* Custom styles for register page */
        .bg-register-pattern {
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

<body class="bg-register-pattern">
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
                        <h1 class="text-4xl font-bold text-white mb-6">Bergabung dengan SPMB</h1>
                        <p class="text-lg text-white/90">
                            Daftar sekarang untuk menjadi bagian dari kami. Bersama kita wujudkan masa depan yang lebih
                            cerah.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column - Register Form -->
        <div class="w-full lg:w-1/3 flex items-center justify-center p-8 lg:p-16 bg-white">
            <div class="w-full max-w-md space-y-8">
                <!-- Logo -->
                <div class="text-center">
                    <div
                        class="mx-auto w-16 h-16 bg-gradient-to-r from-primary-dark to-primary-light rounded-full flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                    </div>
                    <h2 class="mt-6 text-3xl font-bold text-gray-900">Buat Akun Baru</h2>
                    <p class="mt-2 text-sm text-gray-600">Isi data diri Anda untuk mendaftar</p>
                </div>

                <!-- Register Form -->
                <form method="POST" action="{{ route('register') }}" class="mt-6 space-y-4" x-data="registerForm()">
                    @csrf
                    <div class="space-y-3">
                        <!-- Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                            <div class="mt-1 relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <input id="name" name="name" type="text" required value="{{ old('name') }}"
                                    x-model="name" @input="validateName" @blur="validateName"
                                    :class="{ 'input-error': nameError }"
                                    class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-light focus:border-primary-light sm:text-sm @error('name') input-error @enderror"
                                    placeholder="Masukkan nama lengkap">
                            </div>
                            <template x-if="nameError">
                                <div class="error-message text-xs">
                                    <svg class="h-4 w-4 error-icon" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span x-text="nameError"></span>
                                </div>
                            </template>
                            @error('name')
                                <div class="error-message text-xs">
                                    <svg class="h-4 w-4 error-icon" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <!-- Jenis Kelamin -->
                        <div>
                            <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis
                                Kelamin</label>
                            <div class="mt-1 relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <select id="jenis_kelamin" name="jenis_kelamin" required x-model="jenis_kelamin"
                                    @change="validateJenisKelamin" :class="{ 'input-error': jenisKelaminError }"
                                    class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-light focus:border-primary-light sm:text-sm @error('jenis_kelamin') input-error @enderror">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>
                                        Laki-laki</option>
                                    <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>
                                        Perempuan</option>
                                </select>
                            </div>
                            <template x-if="jenisKelaminError">
                                <div class="error-message text-xs">
                                    <svg class="h-4 w-4 error-icon" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span x-text="jenisKelaminError"></span>
                                </div>
                            </template>
                            @error('jenis_kelamin')
                                <div class="error-message text-xs">
                                    <svg class="h-4 w-4 error-icon" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <!-- Nomor HP -->
                        <div>
                            <label for="no_hp" class="block text-sm font-medium text-gray-700">Nomor HP</label>
                            <div class="mt-1 relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </div>
                                <input id="no_hp" name="no_hp" type="text" required
                                    value="{{ old('no_hp') }}" x-model="no_hp" @input="validateNoHp"
                                    @blur="validateNoHp" :class="{ 'input-error': noHpError }"
                                    class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-light focus:border-primary-light sm:text-sm @error('no_hp') input-error @enderror"
                                    placeholder="Contoh: 081234567890">
                            </div>
                            <template x-if="noHpError">
                                <div class="error-message text-xs">
                                    <svg class="h-4 w-4 error-icon" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span x-text="noHpError"></span>
                                </div>
                            </template>
                            @error('no_hp')
                                <div class="error-message text-xs">
                                    <svg class="h-4 w-4 error-icon" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <!-- Unit -->
                        <div>
                            <label for="unit" class="block text-sm font-medium text-gray-700">Unit/Jenjang
                                Pendidikan</label>
                            <div class="mt-1 relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                </div>
                                <select id="unit" name="kode_unit" required x-model="unit"
                                    @change="validateUnit" :class="{ 'input-error': unitError }"
                                    class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-light focus:border-primary-light sm:text-sm @error('unit') input-error @enderror">
                                    <option value="">Pilih Unit / Jenjang Pendidikan</option>
                                    @foreach ($unit as $u)
                                        <option value="{{ $u->kode_unit }}"
                                            {{ old('unit') == $u->kode_unit ? 'selected' : '' }}>
                                            {{ $u->nama_unit }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <template x-if="unitError">
                                <div class="error-message text-xs">
                                    <svg class="h-4 w-4 error-icon" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span x-text="unitError"></span>
                                </div>
                            </template>
                            @error('unit')
                                <div class="error-message text-xs">
                                    <svg class="h-4 w-4 error-icon" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

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
                                <div class="error-message text-xs">
                                    <svg class="h-4 w-4 error-icon" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span x-text="emailError"></span>
                                </div>
                            </template>
                            @error('email')
                                <div class="error-message text-xs">
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
                                <div class="error-message text-xs">
                                    <svg class="h-4 w-4 error-icon" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span x-text="passwordError"></span>
                                </div>
                            </template>
                            @error('password')
                                <div class="error-message text-xs">
                                    <svg class="h-4 w-4 error-icon" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <label for="password_confirmation"
                                class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                            <div class="mt-1 relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>
                                <input id="password_confirmation" name="password_confirmation" type="password"
                                    required x-model="passwordConfirmation" @input="validatePasswordConfirmation"
                                    @blur="validatePasswordConfirmation"
                                    :class="{ 'input-error': passwordConfirmationError }"
                                    class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-light focus:border-primary-light sm:text-sm"
                                    placeholder="••••••••">
                            </div>
                            <template x-if="passwordConfirmationError">
                                <div class="error-message text-xs">
                                    <svg class="h-4 w-4 error-icon" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span x-text="passwordConfirmationError"></span>
                                </div>
                            </template>
                        </div>
                    </div>

                    <div>
                        <button type="submit" :disabled="!isFormValid"
                            :class="{ 'opacity-50 cursor-not-allowed': !isFormValid }"
                            class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-primary-dark to-primary-light hover:from-primary-dark/90 hover:to-primary-light/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-light transition-all duration-150">
                            Daftar Sekarang
                        </button>
                    </div>
                </form>

                <!-- Login Link -->
                <div class="text-center mt-4">
                    <p class="text-sm text-gray-600">
                        Sudah punya akun?
                        <a href="{{ route('login') }}"
                            class="font-medium text-primary-light hover:text-primary-dark">
                            Login di sini
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function registerForm() {
            return {
                name: '{{ old('name') }}',
                email: '{{ old('email') }}',
                password: '',
                passwordConfirmation: '',
                jenis_kelamin: '{{ old('jenis_kelamin') }}',
                no_hp: '{{ old('no_hp') }}',
                unit: '{{ old('unit') }}',
                nameError: '',
                emailError: '',
                passwordError: '',
                passwordConfirmationError: '',
                jenisKelaminError: '',
                noHpError: '',
                unitError: '',

                validateName() {
                    if (!this.name) {
                        this.nameError = 'Nama wajib diisi';
                    } else if (this.name.length < 3) {
                        this.nameError = 'Nama minimal 3 karakter';
                    } else {
                        this.nameError = '';
                    }
                },

                validateJenisKelamin() {
                    if (!this.jenis_kelamin) {
                        this.jenisKelaminError = 'Jenis kelamin wajib dipilih';
                    } else {
                        this.jenisKelaminError = '';
                    }
                },

                validateNoHp() {
                    if (!this.no_hp) {
                        this.noHpError = 'Nomor HP wajib diisi';
                    } else if (!this.isValidPhone(this.no_hp)) {
                        this.noHpError = 'Format nomor HP tidak valid';
                    } else {
                        this.noHpError = '';
                    }
                },

                validateUnit() {
                    if (!this.unit) {
                        this.unitError = 'Unit/Jenjang pendidikan wajib dipilih';
                    } else {
                        this.unitError = '';
                    }
                },

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
                    this.validatePasswordConfirmation();
                },

                validatePasswordConfirmation() {
                    if (!this.passwordConfirmation) {
                        this.passwordConfirmationError = 'Konfirmasi password wajib diisi';
                    } else if (this.passwordConfirmation !== this.password) {
                        this.passwordConfirmationError = 'Konfirmasi password tidak cocok';
                    } else {
                        this.passwordConfirmationError = '';
                    }
                },

                isValidEmail(email) {
                    const re =
                        /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                    return re.test(String(email).toLowerCase());
                },

                isValidPhone(phone) {
                    const re = /^[0-9]{10,13}$/;
                    return re.test(String(phone));
                },

                get isFormValid() {
                    return this.name && !this.nameError &&
                        this.email && !this.emailError &&
                        this.password && !this.passwordError &&
                        this.passwordConfirmation && !this.passwordConfirmationError &&
                        this.jenis_kelamin && !this.jenisKelaminError &&
                        this.no_hp && !this.noHpError &&
                        this.unit && !this.unitError;
                }
            }
        }
    </script>
</body>

</html>
