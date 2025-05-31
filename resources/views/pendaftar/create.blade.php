@extends('layouts.dashboard')

@section('content')
    <div class="py-6 sm:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Flash Messages -->
            @if (session('success'))
                <div class="mb-4 rounded-md bg-green-50 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-green-800">
                                {{ session('success') }}
                            </p>
                        </div>
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="mb-4 rounded-md bg-red-50 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-red-800">
                                {{ session('error') }}
                            </p>
                        </div>
                    </div>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 sm:p-10">
                    <!-- Form Header -->
                    <div class="mb-8 text-center">
                        <div class="flex flex-col items-center justify-center space-y-4">
                            <div class="w-24 h-24">
                                <img src="{{ asset('assets/image/logo.png') }}" alt="Logo"
                                    class="w-full h-full object-contain">
                            </div>
                            <div class="space-y-1">
                                <h1 class="text-2xl font-bold text-gray-900">FORMULIR PENDAFTARAN</h1>
                                <h2 class="text-xl font-semibold text-gray-800">PESANTREN PERSATUAN ISLAM 80 AL AMIN</h2>
                                <p class="text-lg text-gray-700">SINDANGKASIH - CIAMIS</p>
                            </div>
                        </div>
                    </div>

                    <!-- Form Content -->
                    <div class="bg-white rounded-lg shadow-sm p-4">
                        <form id="formPendaftaran" action="{{ route('pendaftar.update', $user->no_register) }}"
                            method="POST" class="space-y-2" x-data="formValidation()"
                            @submit.prevent="validate() && $el.submit()">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                <!-- Data Pribadi -->
                                <div>
                                    <label for="nisn"
                                        class="block text-xs sm:text-sm font-semibold text-gray-700 mb-2 sm:mb-3">NISN</label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 sm:pl-4 flex items-center pointer-events-none">
                                            <i data-lucide="credit-card" class="h-4 w-4 sm:h-5 sm:w-5 text-gray-400"></i>
                                        </div>
                                        <input type="text" name="nisn" id="nisn" x-model="formData.nisn"
                                            @input="validateField('nisn')"
                                            :class="{
                                                'border-red-600': errors.nisn,
                                                'border-green-500': !errors.nisn && formData.nisn
                                            }"
                                            placeholder="Masukkan NISN"
                                            class="pl-10 sm:pl-12 block w-full rounded-md border border-gray-300 shadow-sm focus:outline-none focus:ring-0 py-2.5 sm:py-3 text-sm">
                                    </div>
                                    <template x-if="errors.nisn">
                                        <p class="mt-1 sm:mt-2 text-xs sm:text-sm text-red-600" x-text="errors.nisn"></p>
                                    </template>
                                    @error('nisn')
                                        <p class="mt-1 sm:mt-2 text-xs sm:text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="nama_lengkap"
                                        class="block text-xs sm:text-sm font-semibold text-gray-700 mb-2 sm:mb-3">Nama
                                        Lengkap <span class="text-red-500">*</span></label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 sm:pl-4 flex items-center pointer-events-none">
                                            <i data-lucide="user" class="h-4 w-4 sm:h-5 sm:w-5 text-gray-400"></i>
                                        </div>
                                        <input type="text" name="nama_lengkap" id="nama_lengkap"
                                            x-model="formData.nama_lengkap" @input="validateField('nama_lengkap')"
                                            :class="{
                                                'border-red-600': errors.nama_lengkap,
                                                'border-green-500': !errors.nama_lengkap && formData.nama_lengkap
                                            }"
                                            placeholder="Masukkan Nama Lengkap"
                                            class="pl-10 sm:pl-12 block w-full rounded-md border border-gray-300 shadow-sm focus:outline-none focus:ring-0 py-2.5 sm:py-3 text-sm">
                                    </div>
                                    <template x-if="errors.nama_lengkap">
                                        <p class="mt-1 sm:mt-2 text-xs sm:text-sm text-red-600"
                                            x-text="errors.nama_lengkap"></p>
                                    </template>
                                    @error('nama_lengkap')
                                        <p class="mt-1 sm:mt-2 text-xs sm:text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="jenis_kelamin"
                                        class="block text-xs sm:text-sm font-semibold text-gray-700 mb-2 sm:mb-3">Jenis
                                        Kelamin <span class="text-red-500">*</span></label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 sm:pl-4 flex items-center pointer-events-none">
                                            <i data-lucide="users" class="h-4 w-4 sm:h-5 sm:w-5 text-gray-400"></i>
                                        </div>
                                        <select name="jenis_kelamin" id="jenis_kelamin" x-model="formData.jenis_kelamin"
                                            @change="validateField('jenis_kelamin')"
                                            :class="{
                                                'border-red-600': errors.jenis_kelamin,
                                                'border-green-500': !errors.jenis_kelamin && formData.jenis_kelamin
                                            }"
                                            class="pl-10 sm:pl-12 block w-full rounded-md border border-gray-300 shadow-sm focus:border-primary-500 focus:ring-1 focus:ring-primary-500 focus:ring-opacity-50 py-2.5 sm:py-3 text-sm">
                                            <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                            <option value="L" {{ $user->jenis_kelamin == 'L' ? 'selected' : '' }}>
                                                Laki-laki</option>
                                            <option value="P" {{ $user->jenis_kelamin == 'P' ? 'selected' : '' }}>
                                                Perempuan</option>
                                        </select>
                                    </div>
                                    <template x-if="errors.jenis_kelamin">
                                        <p class="mt-1 sm:mt-2 text-xs sm:text-sm text-red-600"
                                            x-text="errors.jenis_kelamin"></p>
                                    </template>
                                    @error('jenis_kelamin')
                                        <p class="mt-1 sm:mt-2 text-xs sm:text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="tempat_lahir"
                                        class="block text-xs sm:text-sm font-semibold text-gray-700 mb-2 sm:mb-3">Tempat
                                        Lahir <span class="text-red-500">*</span></label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 sm:pl-4 flex items-center pointer-events-none">
                                            <i data-lucide="map-pin" class="h-4 w-4 sm:h-5 sm:w-5 text-gray-400"></i>
                                        </div>
                                        <input type="text" name="tempat_lahir" id="tempat_lahir"
                                            x-model="formData.tempat_lahir" @input="validateField('tempat_lahir')"
                                            :class="{
                                                'border-red-600': errors.tempat_lahir,
                                                'border-green-500': !errors.tempat_lahir && formData.tempat_lahir
                                            }"
                                            placeholder="Masukkan Tempat Lahir"
                                            class="pl-10 sm:pl-12 block w-full rounded-md border border-gray-300 shadow-sm focus:outline-none focus:ring-0 py-2.5 sm:py-3 text-sm">
                                    </div>
                                    <template x-if="errors.tempat_lahir">
                                        <p class="mt-1 sm:mt-2 text-xs sm:text-sm text-red-600"
                                            x-text="errors.tempat_lahir"></p>
                                    </template>
                                    @error('tempat_lahir')
                                        <p class="mt-1 sm:mt-2 text-xs sm:text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="tanggal_lahir"
                                        class="block text-xs sm:text-sm font-semibold text-gray-700 mb-2 sm:mb-3">Tanggal
                                        Lahir <span class="text-red-500">*</span></label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 sm:pl-4 flex items-center pointer-events-none">
                                            <i data-lucide="calendar" class="h-4 w-4 sm:h-5 sm:w-5 text-gray-400"></i>
                                        </div>
                                        <input type="text" name="tanggal_lahir" id="tanggal_lahir"
                                            x-model="formData.tanggal_lahir" @input="validateField('tanggal_lahir')"
                                            :class="{
                                                'border-red-600': errors.tanggal_lahir,
                                                'border-green-500': !errors.tanggal_lahir && formData.tanggal_lahir
                                            }"
                                            placeholder="YYYY-MM-DD"
                                            class="pl-10 sm:pl-12 block w-full rounded-md border border-gray-300 shadow-sm focus:outline-none focus:ring-0 py-2.5 sm:py-3 text-sm">
                                    </div>
                                    <template x-if="errors.tanggal_lahir">
                                        <p class="mt-1 sm:mt-2 text-xs sm:text-sm text-red-600"
                                            x-text="errors.tanggal_lahir"></p>
                                    </template>
                                    @error('tanggal_lahir')
                                        <p class="mt-1 sm:mt-2 text-xs sm:text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="anak_ke"
                                        class="block text-xs sm:text-sm font-semibold text-gray-700 mb-2 sm:mb-3">Anak Ke
                                        <span class="text-red-500">*</span></label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 sm:pl-4 flex items-center pointer-events-none">
                                            <i data-lucide="hash" class="h-4 w-4 sm:h-5 sm:w-5 text-gray-400"></i>
                                        </div>
                                        <input type="number" name="anak_ke" id="anak_ke" x-model="formData.anak_ke"
                                            @input="validateField('anak_ke')"
                                            :class="{
                                                'border-red-600': errors.anak_ke,
                                                'border-green-500': !errors.anak_ke && formData.anak_ke
                                            }"
                                            min="1" placeholder="Masukkan Anak Ke"
                                            class="pl-10 sm:pl-12 block w-full rounded-md border border-gray-300 shadow-sm focus:outline-none focus:ring-0 py-2.5 sm:py-3 text-sm">
                                    </div>
                                    <template x-if="errors.anak_ke">
                                        <p class="mt-1 sm:mt-2 text-xs sm:text-sm text-red-600" x-text="errors.anak_ke">
                                        </p>
                                    </template>
                                    @error('anak_ke')
                                        <p class="mt-1 sm:mt-2 text-xs sm:text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="jumlah_saudara"
                                        class="block text-xs sm:text-sm font-semibold text-gray-700 mb-2 sm:mb-3">Jumlah
                                        Saudara <span class="text-red-500">*</span></label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 sm:pl-4 flex items-center pointer-events-none">
                                            <i data-lucide="users" class="h-4 w-4 sm:h-5 sm:w-5 text-gray-400"></i>
                                        </div>
                                        <input type="number" name="jumlah_saudara" id="jumlah_saudara"
                                            x-model="formData.jumlah_saudara" @input="validateField('jumlah_saudara')"
                                            :class="{
                                                'border-red-600': errors.jumlah_saudara,
                                                'border-green-500': !errors.jumlah_saudara && formData.jumlah_saudara
                                            }"
                                            min="0" placeholder="Masukkan Jumlah Saudara"
                                            class="pl-10 sm:pl-12 block w-full rounded-md border border-gray-300 shadow-sm focus:outline-none focus:ring-0 py-2.5 sm:py-3 text-sm">
                                    </div>
                                    <template x-if="errors.jumlah_saudara">
                                        <p class="mt-1 sm:mt-2 text-xs sm:text-sm text-red-600"
                                            x-text="errors.jumlah_saudara"></p>
                                    </template>
                                    @error('jumlah_saudara')
                                        <p class="mt-1 sm:mt-2 text-xs sm:text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Provinsi -->
                                <div>
                                    <label for="provinsi_id"
                                        class="block text-xs sm:text-sm font-semibold text-gray-700 mb-2 sm:mb-3">
                                        Provinsi <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 sm:pl-4 flex items-center pointer-events-none">
                                            <i data-lucide="map-pin" class="h-4 w-4 sm:h-5 sm:w-5 text-gray-400"></i>
                                        </div>
                                        <select name="provinsi_id" id="provinsi_id"
                                            x-model="formData.provinsi_id" @change="loadKabupaten(); validateField('provinsi_id')"
                                            :class="{
                                                'border-red-600': errors.provinsi_id,
                                                'border-green-500': !errors.provinsi_id && formData.provinsi_id
                                            }"
                                            class="provinsi-select pl-10 sm:pl-12 block w-full rounded-md border border-gray-300 shadow-sm focus:outline-none focus:ring-0 py-2.5 sm:py-3 text-sm">
                                            <option value="" disabled selected>Pilih Provinsi</option>
                                            @foreach($provinces as $province)
                                            <option value="{{ $province->id }}" {{ (old('provinsi_id') == $province->id || ($user->provinsi_id ?? '') == $province->id) ? 'selected' : '' }}>
                                                {{ $province->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <template x-if="errors.provinsi_id">
                                        <p class="mt-1 sm:mt-2 text-xs sm:text-sm text-red-600" x-text="errors.provinsi_id"></p>
                                    </template>
                                    @error('provinsi_id')
                                        <p class="mt-1 sm:mt-2 text-xs sm:text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Kabupaten/Kota -->
                                <div>
                                    <label for="kabupaten_id"
                                        class="block text-xs sm:text-sm font-semibold text-gray-700 mb-2 sm:mb-3">
                                        Kabupaten/Kota <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 sm:pl-4 flex items-center pointer-events-none">
                                            <i data-lucide="landmark" class="h-4 w-4 sm:h-5 sm:w-5 text-gray-400"></i>
                                        </div>
                                        <select name="kabupaten_id" id="kabupaten_id"
                                            x-model="formData.kabupaten_id" @change="loadKecamatan(); validateField('kabupaten_id')"
                                            :class="{
                                                'border-red-600': errors.kabupaten_id,
                                                'border-green-500': !errors.kabupaten_id && formData.kabupaten_id
                                            }"
                                            :disabled="!formData.provinsi_id"
                                            class="kabupaten-select pl-10 sm:pl-12 block w-full rounded-md border border-gray-300 shadow-sm focus:outline-none focus:ring-0 py-2.5 sm:py-3 text-sm">
                                            <option value="" disabled selected>Pilih Kabupaten/Kota</option>
                                        </select>
                                    </div>
                                    <template x-if="errors.kabupaten_id">
                                        <p class="mt-1 sm:mt-2 text-xs sm:text-sm text-red-600" x-text="errors.kabupaten_id"></p>
                                    </template>
                                    @error('kabupaten_id')
                                        <p class="mt-1 sm:mt-2 text-xs sm:text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Kecamatan -->
                                <div>
                                    <label for="kecamatan_id"
                                        class="block text-xs sm:text-sm font-semibold text-gray-700 mb-2 sm:mb-3">
                                        Kecamatan <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 sm:pl-4 flex items-center pointer-events-none">
                                            <i data-lucide="map" class="h-4 w-4 sm:h-5 sm:w-5 text-gray-400"></i>
                                        </div>
                                        <select name="kecamatan_id" id="kecamatan_id"
                                            x-model="formData.kecamatan_id" @change="loadDesa(); validateField('kecamatan_id')"
                                            :class="{
                                                'border-red-600': errors.kecamatan_id,
                                                'border-green-500': !errors.kecamatan_id && formData.kecamatan_id
                                            }"
                                            :disabled="!formData.kabupaten_id"
                                            class="kecamatan-select pl-10 sm:pl-12 block w-full rounded-md border border-gray-300 shadow-sm focus:outline-none focus:ring-0 py-2.5 sm:py-3 text-sm">
                                            <option value="" disabled selected>Pilih Kecamatan</option>
                                        </select>
                                    </div>
                                    <template x-if="errors.kecamatan_id">
                                        <p class="mt-1 sm:mt-2 text-xs sm:text-sm text-red-600" x-text="errors.kecamatan_id"></p>
                                    </template>
                                    @error('kecamatan_id')
                                        <p class="mt-1 sm:mt-2 text-xs sm:text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Desa/Kelurahan -->
                                <div>
                                    <label for="desa_id"
                                        class="block text-xs sm:text-sm font-semibold text-gray-700 mb-2 sm:mb-3">
                                        Desa/Kelurahan <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 sm:pl-4 flex items-center pointer-events-none">
                                            <i data-lucide="home" class="h-4 w-4 sm:h-5 sm:w-5 text-gray-400"></i>
                                        </div>
                                        <select name="desa_id" id="desa_id"
                                            x-model="formData.desa_id" @change="validateField('desa_id')"
                                            :class="{
                                                'border-red-600': errors.desa_id,
                                                'border-green-500': !errors.desa_id && formData.desa_id
                                            }"
                                            :disabled="!formData.kecamatan_id"
                                            class="desa-select pl-10 sm:pl-12 block w-full rounded-md border border-gray-300 shadow-sm focus:outline-none focus:ring-0 py-2.5 sm:py-3 text-sm">
                                            <option value="" disabled selected>Pilih Desa/Kelurahan</option>
                                        </select>
                                    </div>
                                    <template x-if="errors.desa_id">
                                        <p class="mt-1 sm:mt-2 text-xs sm:text-sm text-red-600" x-text="errors.desa_id"></p>
                                    </template>
                                    @error('desa_id')
                                        <p class="mt-1 sm:mt-2 text-xs sm:text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Alamat Lengkap -->
                                <div class="md:col-span-2">
                                    <label for="alamat"
                                        class="block text-xs sm:text-sm font-semibold text-gray-700 mb-2 sm:mb-3">Alamat
                                        Lengkap <span class="text-red-500">*</span></label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div
                                            class="absolute top-3 left-0 pl-3 sm:pl-4 flex items-center pointer-events-none">
                                            <i data-lucide="map" class="h-4 w-4 sm:h-5 sm:w-5 text-gray-400"></i>
                                        </div>
                                        <textarea name="alamat" id="alamat" rows="3" x-model="formData.alamat" @input="validateField('alamat')"
                                            :class="{
                                                'border-red-600': errors.alamat,
                                                'border-green-500': !errors.alamat && formData.alamat
                                            }"
                                            placeholder="Masukkan Alamat Lengkap"
                                            class="pl-10 sm:pl-12 block w-full rounded-md border border-gray-300 shadow-sm focus:outline-none focus:ring-0 py-2.5 sm:py-3 text-sm">{{ $user->alamat ?? old('alamat') }}</textarea>
                                    </div>
                                    <template x-if="errors.alamat">
                                        <p class="mt-1 sm:mt-2 text-xs sm:text-sm text-red-600" x-text="errors.alamat">
                                        </p>
                                    </template>
                                    @error('alamat')
                                        <p class="mt-1 sm:mt-2 text-xs sm:text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="kode_pos"
                                        class="block text-xs sm:text-sm font-semibold text-gray-700 mb-2 sm:mb-3">Kode Pos
                                        <span class="text-red-500">*</span></label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 sm:pl-4 flex items-center pointer-events-none">
                                            <i data-lucide="mail" class="h-4 w-4 sm:h-5 sm:w-5 text-gray-400"></i>
                                        </div>
                                        <input type="text" name="kode_pos" id="kode_pos" x-model="formData.kode_pos"
                                            @input="validateField('kode_pos')"
                                            :class="{
                                                'border-red-600': errors.kode_pos,
                                                'border-green-500': !errors.kode_pos && formData.kode_pos
                                            }"
                                            maxlength="5" placeholder="Masukkan Kode Pos"
                                            class="pl-10 sm:pl-12 block w-full rounded-md border border-gray-300 shadow-sm focus:outline-none focus:ring-0 py-2.5 sm:py-3 text-sm">
                                    </div>
                                    <template x-if="errors.kode_pos">
                                        <p class="mt-1 sm:mt-2 text-xs sm:text-sm text-red-600" x-text="errors.kode_pos">
                                        </p>
                                    </template>
                                    @error('kode_pos')
                                        <p class="mt-1 sm:mt-2 text-xs sm:text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="no_kk"
                                        class="block text-xs sm:text-sm font-semibold text-gray-700 mb-2 sm:mb-3">Nomor
                                        Kartu Keluarga <span class="text-red-500">*</span></label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 sm:pl-4 flex items-center pointer-events-none">
                                            <i data-lucide="credit-card" class="h-4 w-4 sm:h-5 sm:w-5 text-gray-400"></i>
                                        </div>
                                        <input type="text" name="no_kk" id="no_kk" x-model="formData.no_kk"
                                            @input="validateField('no_kk')"
                                            :class="{
                                                'border-red-600': errors.no_kk,
                                                'border-green-500': !errors.no_kk && formData.no_kk
                                            }"
                                            maxlength="16" placeholder="Masukkan Nomor Kartu Keluarga"
                                            class="pl-10 sm:pl-12 block w-full rounded-md border border-gray-300 shadow-sm focus:outline-none focus:ring-0 py-2.5 sm:py-3 text-sm">
                                    </div>
                                    <template x-if="errors.no_kk">
                                        <p class="mt-1 sm:mt-2 text-xs sm:text-sm text-red-600" x-text="errors.no_kk"></p>
                                    </template>
                                    @error('no_kk')
                                        <p class="mt-1 sm:mt-2 text-xs sm:text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Divider -->
                            <div class="my-6 border-t border-gray-200"></div>

                            <!-- Data Orang Tua -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                <div>
                                    <label for="nik_ayah"
                                        class="block text-xs sm:text-sm font-semibold text-gray-700 mb-2 sm:mb-3">NIK
                                        Ayah <span class="text-red-500">*</span></label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 sm:pl-4 flex items-center pointer-events-none">
                                            <i data-lucide="credit-card" class="h-4 w-4 sm:h-5 sm:w-5 text-gray-400"></i>
                                        </div>
                                        <input type="text" name="nik_ayah" id="nik_ayah" x-model="formData.nik_ayah"
                                            @input="validateField('nik_ayah')"
                                            :class="{
                                                'border-red-600': errors.nik_ayah,
                                                'border-green-500': !errors.nik_ayah && formData.nik_ayah
                                            }"
                                            maxlength="16" placeholder="Masukkan NIK Ayah"
                                            class="pl-10 sm:pl-12 block w-full rounded-md border border-gray-300 shadow-sm focus:border-primary-500 focus:ring-1 focus:ring-primary-500 focus:ring-opacity-50 py-2.5 sm:py-3 text-sm">
                                    </div>
                                    <template x-if="errors.nik_ayah">
                                        <p class="mt-1 sm:mt-2 text-xs sm:text-sm text-red-600" x-text="errors.nik_ayah">
                                        </p>
                                    </template>
                                    @error('nik_ayah')
                                        <p class="mt-1 sm:mt-2 text-xs sm:text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="nama_ayah"
                                        class="block text-xs sm:text-sm font-semibold text-gray-700 mb-2 sm:mb-3">Nama
                                        Ayah <span class="text-red-500">*</span></label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 sm:pl-4 flex items-center pointer-events-none">
                                            <i data-lucide="user" class="h-4 w-4 sm:h-5 sm:w-5 text-gray-400"></i>
                                        </div>
                                        <input type="text" name="nama_ayah" id="nama_ayah"
                                            x-model="formData.nama_ayah" @input="validateField('nama_ayah')"
                                            :class="{
                                                'border-red-600': errors.nama_ayah,
                                                'border-green-500': !errors.nama_ayah && formData.nama_ayah
                                            }"
                                            placeholder="Masukkan Nama Ayah"
                                            class="pl-10 sm:pl-12 block w-full rounded-md border border-gray-300 shadow-sm focus:border-primary-500 focus:ring-1 focus:ring-primary-500 focus:ring-opacity-50 py-2.5 sm:py-3 text-sm">
                                    </div>
                                    <template x-if="errors.nama_ayah">
                                        <p class="mt-1 sm:mt-2 text-xs sm:text-sm text-red-600" x-text="errors.nama_ayah">
                                        </p>
                                    </template>
                                    @error('nama_ayah')
                                        <p class="mt-1 sm:mt-2 text-xs sm:text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="pendidikan_ayah"
                                        class="block text-xs sm:text-sm font-semibold text-gray-700 mb-2 sm:mb-3">Pendidikan
                                        Ayah <span class="text-red-500">*</span></label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 sm:pl-4 flex items-center pointer-events-none">
                                            <i data-lucide="graduation-cap"
                                                class="h-4 w-4 sm:h-5 sm:w-5 text-gray-400"></i>
                                        </div>
                                        <select name="pendidikan_ayah" id="pendidikan_ayah"
                                            x-model="formData.pendidikan_ayah" @change="validateField('pendidikan_ayah')"
                                            :class="{
                                                'border-red-600': errors.pendidikan_ayah,
                                                'border-green-500': !errors.pendidikan_ayah && formData.pendidikan_ayah
                                            }"
                                            class="pl-10 sm:pl-12 block w-full rounded-md border border-gray-300 shadow-sm focus:border-primary-500 focus:ring-1 focus:ring-primary-500 focus:ring-opacity-50 py-2.5 sm:py-3 text-sm">
                                            <option value="" disabled selected>Pilih Pendidikan</option>
                                            <option value="SD" {{ $user->pendidikan_ayah == 'SD' ? 'selected' : '' }}>
                                                SD</option>
                                            <option value="SMP"
                                                {{ $user->pendidikan_ayah == 'SMP' ? 'selected' : '' }}>SMP</option>
                                            <option value="SMA"
                                                {{ $user->pendidikan_ayah == 'SMA' ? 'selected' : '' }}>SMA</option>
                                            <option value="D3" {{ $user->pendidikan_ayah == 'D3' ? 'selected' : '' }}>
                                                D3</option>
                                            <option value="S1" {{ $user->pendidikan_ayah == 'S1' ? 'selected' : '' }}>
                                                S1</option>
                                            <option value="S2" {{ $user->pendidikan_ayah == 'S2' ? 'selected' : '' }}>
                                                S2</option>
                                            <option value="S3" {{ $user->pendidikan_ayah == 'S3' ? 'selected' : '' }}>
                                                S3</option>
                                        </select>
                                    </div>
                                    <template x-if="errors.pendidikan_ayah">
                                        <p class="mt-1 sm:mt-2 text-xs sm:text-sm text-red-600"
                                            x-text="errors.pendidikan_ayah"></p>
                                    </template>
                                    @error('pendidikan_ayah')
                                        <p class="mt-1 sm:mt-2 text-xs sm:text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="pekerjaan_ayah"
                                        class="block text-xs sm:text-sm font-semibold text-gray-700 mb-2 sm:mb-3">Pekerjaan
                                        Ayah <span class="text-red-500">*</span></label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 sm:pl-4 flex items-center pointer-events-none">
                                            <i data-lucide="briefcase" class="h-4 w-4 sm:h-5 sm:w-5 text-gray-400"></i>
                                        </div>
                                        <input type="text" name="pekerjaan_ayah" id="pekerjaan_ayah"
                                            x-model="formData.pekerjaan_ayah" @input="validateField('pekerjaan_ayah')"
                                            :class="{
                                                'border-red-600': errors.pekerjaan_ayah,
                                                'border-green-500': !errors.pekerjaan_ayah && formData.pekerjaan_ayah
                                            }"
                                            placeholder="Masukkan Pekerjaan Ayah"
                                            class="pl-10 sm:pl-12 block w-full rounded-md border border-gray-300 shadow-sm focus:border-primary-500 focus:ring-1 focus:ring-primary-500 focus:ring-opacity-50 py-2.5 sm:py-3 text-sm">
                                    </div>
                                    <template x-if="errors.pekerjaan_ayah">
                                        <p class="mt-1 sm:mt-2 text-xs sm:text-sm text-red-600"
                                            x-text="errors.pekerjaan_ayah"></p>
                                    </template>
                                    @error('pekerjaan_ayah')
                                        <p class="mt-1 sm:mt-2 text-xs sm:text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="nik_ibu"
                                        class="block text-xs sm:text-sm font-semibold text-gray-700 mb-2 sm:mb-3">NIK
                                        Ibu <span class="text-red-500">*</span></label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 sm:pl-4 flex items-center pointer-events-none">
                                            <i data-lucide="credit-card" class="h-4 w-4 sm:h-5 sm:w-5 text-gray-400"></i>
                                        </div>
                                        <input type="text" name="nik_ibu" id="nik_ibu" x-model="formData.nik_ibu"
                                            @input="validateField('nik_ibu')"
                                            :class="{
                                                'border-red-600': errors.nik_ibu,
                                                'border-green-500': !errors.nik_ibu && formData.nik_ibu
                                            }"
                                            maxlength="16" placeholder="Masukkan NIK Ibu"
                                            class="pl-10 sm:pl-12 block w-full rounded-md border border-gray-300 shadow-sm focus:border-primary-500 focus:ring-1 focus:ring-primary-500 focus:ring-opacity-50 py-2.5 sm:py-3 text-sm">
                                    </div>
                                    <template x-if="errors.nik_ibu">
                                        <p class="mt-1 sm:mt-2 text-xs sm:text-sm text-red-600" x-text="errors.nik_ibu">
                                        </p>
                                    </template>
                                    @error('nik_ibu')
                                        <p class="mt-1 sm:mt-2 text-xs sm:text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="nama_ibu"
                                        class="block text-xs sm:text-sm font-semibold text-gray-700 mb-2 sm:mb-3">Nama
                                        Ibu <span class="text-red-500">*</span></label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 sm:pl-4 flex items-center pointer-events-none">
                                            <i data-lucide="user" class="h-4 w-4 sm:h-5 sm:w-5 text-gray-400"></i>
                                        </div>
                                        <input type="text" name="nama_ibu" id="nama_ibu" x-model="formData.nama_ibu"
                                            @input="validateField('nama_ibu')"
                                            :class="{
                                                'border-red-600': errors.nama_ibu,
                                                'border-green-500': !errors.nama_ibu && formData.nama_ibu
                                            }"
                                            placeholder="Masukkan Nama Ibu"
                                            class="pl-10 sm:pl-12 block w-full rounded-md border border-gray-300 shadow-sm focus:border-primary-500 focus:ring-1 focus:ring-primary-500 focus:ring-opacity-50 py-2.5 sm:py-3 text-sm">
                                    </div>
                                    <template x-if="errors.nama_ibu">
                                        <p class="mt-1 sm:mt-2 text-xs sm:text-sm text-red-600" x-text="errors.nama_ibu">
                                        </p>
                                    </template>
                                    @error('nama_ibu')
                                        <p class="mt-1 sm:mt-2 text-xs sm:text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="pendidikan_ibu"
                                        class="block text-xs sm:text-sm font-semibold text-gray-700 mb-2 sm:mb-3">Pendidikan
                                        Ibu <span class="text-red-500">*</span></label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 sm:pl-4 flex items-center pointer-events-none">
                                            <i data-lucide="graduation-cap"
                                                class="h-4 w-4 sm:h-5 sm:w-5 text-gray-400"></i>
                                        </div>
                                        <select name="pendidikan_ibu" id="pendidikan_ibu"
                                            x-model="formData.pendidikan_ibu" @change="validateField('pendidikan_ibu')"
                                            :class="{
                                                'border-red-600': errors.pendidikan_ibu,
                                                'border-green-500': !errors.pendidikan_ibu && formData.pendidikan_ibu
                                            }"
                                            class="pl-10 sm:pl-12 block w-full rounded-md border border-gray-300 shadow-sm focus:border-primary-500 focus:ring-1 focus:ring-primary-500 focus:ring-opacity-50 py-2.5 sm:py-3 text-sm">
                                            <option value="" disabled selected>Pilih Pendidikan</option>
                                            <option value="SD" {{ $user->pendidikan_ibu == 'SD' ? 'selected' : '' }}>
                                                SD</option>
                                            <option value="SMP" {{ $user->pendidikan_ibu == 'SMP' ? 'selected' : '' }}>
                                                SMP</option>
                                            <option value="SMA" {{ $user->pendidikan_ibu == 'SMA' ? 'selected' : '' }}>
                                                SMA</option>
                                            <option value="D3" {{ $user->pendidikan_ibu == 'D3' ? 'selected' : '' }}>
                                                D3</option>
                                            <option value="S1" {{ $user->pendidikan_ibu == 'S1' ? 'selected' : '' }}>
                                                S1</option>
                                            <option value="S2" {{ $user->pendidikan_ibu == 'S2' ? 'selected' : '' }}>
                                                S2</option>
                                            <option value="S3" {{ $user->pendidikan_ibu == 'S3' ? 'selected' : '' }}>
                                                S3</option>
                                        </select>
                                    </div>
                                    <template x-if="errors.pendidikan_ibu">
                                        <p class="mt-1 sm:mt-2 text-xs sm:text-sm text-red-600"
                                            x-text="errors.pendidikan_ibu"></p>
                                    </template>
                                    @error('pendidikan_ibu')
                                        <p class="mt-1 sm:mt-2 text-xs sm:text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="pekerjaan_ibu"
                                        class="block text-xs sm:text-sm font-semibold text-gray-700 mb-2 sm:mb-3">Pekerjaan
                                        Ibu <span class="text-red-500">*</span></label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 sm:pl-4 flex items-center pointer-events-none">
                                            <i data-lucide="briefcase" class="h-4 w-4 sm:h-5 sm:w-5 text-gray-400"></i>
                                        </div>
                                        <input type="text" name="pekerjaan_ibu" id="pekerjaan_ibu"
                                            x-model="formData.pekerjaan_ibu" @input="validateField('pekerjaan_ibu')"
                                            :class="{
                                                'border-red-600': errors.pekerjaan_ibu,
                                                'border-green-500': !errors.pekerjaan_ibu && formData.pekerjaan_ibu
                                            }"
                                            placeholder="Masukkan Pekerjaan Ibu"
                                            class="pl-10 sm:pl-12 block w-full rounded-md border border-gray-300 shadow-sm focus:border-primary-500 focus:ring-1 focus:ring-primary-500 focus:ring-opacity-50 py-2.5 sm:py-3 text-sm">
                                    </div>
                                    <template x-if="errors.pekerjaan_ibu">
                                        <p class="mt-1 sm:mt-2 text-xs sm:text-sm text-red-600"
                                            x-text="errors.pekerjaan_ibu"></p>
                                    </template>
                                    @error('pekerjaan_ibu')
                                        <p class="mt-1 sm:mt-2 text-xs sm:text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Divider -->
                            <div class="my-6 border-t border-gray-200"></div>

                            <!-- Data Kontak & Sekolah -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                <div>
                                    <label for="no_hp"
                                        class="block text-xs sm:text-sm font-semibold text-gray-700 mb-2 sm:mb-3">Nomor HP
                                        <span class="text-red-500">*</span></label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 sm:pl-4 flex items-center pointer-events-none">
                                            <i data-lucide="phone" class="h-4 w-4 sm:h-5 sm:w-5 text-gray-400"></i>
                                        </div>
                                        <input type="text" name="no_hp" id="no_hp" x-model="formData.no_hp"
                                            @input="validateField('no_hp')"
                                            :class="{
                                                'border-red-600': errors.no_hp,
                                                'border-green-500': !errors.no_hp && formData.no_hp
                                            }"
                                            maxlength="15" placeholder="Masukkan Nomor HP"
                                            class="pl-10 sm:pl-12 block w-full rounded-md border border-gray-300 shadow-sm focus:border-primary-500 focus:ring-1 focus:ring-primary-500 focus:ring-opacity-50 py-2.5 sm:py-3 text-sm">
                                    </div>
                                    <template x-if="errors.no_hp">
                                        <p class="mt-1 sm:mt-2 text-xs sm:text-sm text-red-600" x-text="errors.no_hp"></p>
                                    </template>
                                    @error('no_hp')
                                        <p class="mt-1 sm:mt-2 text-xs sm:text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="asal_sekolah"
                                        class="block text-xs sm:text-sm font-semibold text-gray-700 mb-2 sm:mb-3">Asal
                                        Sekolah <span class="text-red-500">*</span></label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 sm:pl-4 flex items-center pointer-events-none">
                                            <i data-lucide="building" class="h-4 w-4 sm:h-5 sm:w-5 text-gray-400"></i>
                                        </div>
                                        <input type="text" name="asal_sekolah" id="asal_sekolah"
                                            x-model="formData.asal_sekolah" @input="validateField('asal_sekolah')"
                                            :class="{
                                                'border-red-600': errors.asal_sekolah,
                                                'border-green-500': !errors.asal_sekolah && formData.asal_sekolah
                                            }"
                                            placeholder="Masukkan Asal Sekolah"
                                            class="pl-10 sm:pl-12 block w-full rounded-md border border-gray-300 shadow-sm focus:border-primary-500 focus:ring-1 focus:ring-primary-500 focus:ring-opacity-50 py-2.5 sm:py-3 text-sm">
                                    </div>
                                    <template x-if="errors.asal_sekolah">
                                        <p class="mt-1 sm:mt-2 text-xs sm:text-sm text-red-600"
                                            x-text="errors.asal_sekolah">
                                        </p>
                                    </template>
                                    @error('asal_sekolah')
                                        <p class="mt-1 sm:mt-2 text-xs sm:text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Tombol Submit -->
                            <div
                                class="flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-6 pt-4 sm:pt-6">
                                <button type="reset"
                                    class="w-full sm:w-auto inline-flex items-center justify-center px-4 sm:px-7 py-2.5 sm:py-3 border border-gray-300 rounded-md text-xs sm:text-sm font-semibold text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-opacity-50">
                                    <i data-lucide="refresh-ccw" class="w-4 h-4 sm:w-5 sm:h-5 mr-2"></i>
                                    Reset
                                </button>
                                <button type="submit"
                                    class="w-full sm:w-auto inline-flex items-center justify-center px-4 sm:px-7 py-2.5 sm:py-3 border border-transparent rounded-md shadow-sm text-xs sm:text-sm font-semibold text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-opacity-50">
                                    <i data-lucide="save" class="w-4 h-4 sm:w-5 sm:h-5 mr-2"></i>
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Flatpickr -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
    <style>
        /* Select2 styling */
        .select2-container--open {
            z-index: 9999;
        }
        
        .select2-container {
            display: block;
            width: 100% !important;
        }
        
        .select2-container--default .select2-selection--single {
            height: 42px;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            background-color: white;
            padding-left: 45px;
        }
        
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #000;
            line-height: 42px;
        }
        
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 40px;
        }
        
        .select2-dropdown {
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        
        .select2-container--default .select2-results__option--highlighted.select2-results__option--selectable {
            background-color: #2563eb;
        }
        
        .select2-container--default.select2-container--disabled .select2-selection--single {
            background-color: #f9fafb;
            opacity: 0.7;
        }
        
        /* Error and success states */
        .border-red-600 ~ .select2-container--default .select2-selection--single {
            border-color: #dc2626 !important;
        }
        
        .border-green-500 ~ .select2-container--default .select2-selection--single {
            border-color: #10b981 !important;
        }
    </style>

    <style>
        /* Hapus outline dan ring saat focus */
        input:focus,
        select:focus,
        textarea:focus {
            outline: none !important;
            box-shadow: none !important;
            --tw-ring-offset-shadow: none !important;
            --tw-ring-shadow: none !important;
        }

        /* Style untuk input yang valid */
        input.border-green-500,
        select.border-green-500,
        textarea.border-green-500 {
            border-color: #10B981 !important;
        }

        /* Style untuk input yang tidak valid */
        input.border-red-600,
        select.border-red-600,
        textarea.border-red-600 {
            border-color: #DC2626 !important;
        }

        /* Transisi untuk perubahan border */
        input,
        select,
        textarea {
            transition: border-color 0.2s ease-in-out;
        }
    </style>

    <script>
        function formValidation() {
            return {
                formData: {
                    nisn: '{{ $user->nisn ?? old('nisn') }}',
                    nama_lengkap: '{{ $user->nama_lengkap ?? old('nama_lengkap') }}',
                    jenis_kelamin: '{{ $user->jenis_kelamin ?? old('jenis_kelamin') }}',
                    provinsi_id: '{{ $user->provinsi_id ?? old('provinsi_id') }}',
                    kabupaten_id: '{{ $user->kabupaten_id ?? old('kabupaten_id') }}',
                    kecamatan_id: '{{ $user->kecamatan_id ?? old('kecamatan_id') }}',
                    desa_id: '{{ $user->desa_id ?? old('desa_id') }}',
                    tempat_lahir: '{{ $user->tempat_lahir ?? old('tempat_lahir') }}',
                    tanggal_lahir: '{{ $user->tanggal_lahir ?? old('tanggal_lahir') }}',
                    anak_ke: '{{ $user->anak_ke ?? old('anak_ke') }}',
                    jumlah_saudara: '{{ $user->jumlah_saudara ?? old('jumlah_saudara') }}',
                    alamat: '{{ $user->alamat ?? old('alamat') }}',
                    kode_pos: '{{ $user->kode_pos ?? old('kode_pos') }}',
                    no_kk: '{{ $user->no_kk ?? old('no_kk') }}',
                    nik_ayah: '{{ $user->nik_ayah ?? old('nik_ayah') }}',
                    nama_ayah: '{{ $user->nama_ayah ?? old('nama_ayah') }}',
                    pendidikan_ayah: '{{ $user->pendidikan_ayah ?? old('pendidikan_ayah') }}',
                    pekerjaan_ayah: '{{ $user->pekerjaan_ayah ?? old('pekerjaan_ayah') }}',
                    nik_ibu: '{{ $user->nik_ibu ?? old('nik_ibu') }}',
                    nama_ibu: '{{ $user->nama_ibu ?? old('nama_ibu') }}',
                    pendidikan_ibu: '{{ $user->pendidikan_ibu ?? old('pendidikan_ibu') }}',
                    pekerjaan_ibu: '{{ $user->pekerjaan_ibu ?? old('pekerjaan_ibu') }}',
                    no_hp: '{{ $user->no_hp ?? old('no_hp') }}',
                    asal_sekolah: '{{ $user->asal_sekolah ?? old('asal_sekolah') }}'
                },
                errors: {},
                init() {
                    // Definisikan fields yang perlu divalidasi
                    const fields = [
                        'nama_lengkap', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir',
                        'anak_ke', 'jumlah_saudara', 'provinsi_id', 'kabupaten_id', 
                        'kecamatan_id', 'desa_id', 'alamat', 'kode_pos', 'no_kk',
                        'nik_ayah', 'nama_ayah', 'pendidikan_ayah', 'pekerjaan_ayah',
                        'nik_ibu', 'nama_ibu', 'pendidikan_ibu', 'pekerjaan_ibu',
                        'no_hp', 'asal_sekolah'
                    ];
                    
                    // Initialize Select2 for dropdowns
                    $(document).ready(function() {
                        // Initialize provinsi select2
                        $('.provinsi-select').select2({
                            placeholder: 'Pilih Provinsi',
                            width: '100%',
                            dropdownParent: $('body'),
                        });
                        
                        // Handle provinsi change
                        $('.provinsi-select').on('select2:select', function(e) {
                            const value = e.params.data.id;
                            // Trigger Alpine.js model update
                            document.getElementById('provinsi_id').value = value;
                            document.getElementById('provinsi_id').dispatchEvent(new Event('change', { bubbles: true }));
                        });
                        
                        // Initialize other dropdowns if values exist
                        if (this.formData.provinsi_id) {
                            this.loadKabupaten();
                            if (this.formData.kabupaten_id) {
                                this.loadKecamatan();
                                if (this.formData.kecamatan_id) {
                                    this.loadDesa();
                                }
                            }
                        }
                    }.bind(this));
                    fields.forEach(field => this.errors[field] = '');

                    // Inisialisasi date picker
                    flatpickr("#tanggal_lahir", {
                        dateFormat: "Y-m-d",
                        maxDate: "today",
                        allowInput: false,
                        disableMobile: true,
                        onChange: (selectedDates, dateStr) => {
                            this.formData.tanggal_lahir = dateStr;
                            this.validateField('tanggal_lahir');
                        }
                    });

                    // Mencegah input manual pada field tanggal lahir
                    document.getElementById('tanggal_lahir').addEventListener('keydown', (e) => {
                        e.preventDefault();
                        return false;
                    });

                    // Validasi awal untuk semua field
                    fields.forEach(field => this.validateField(field));
                    
                    // Additional Select2 CSS fix for mobile
                    document.querySelector('head').insertAdjacentHTML('beforeend', `
                        <style>
                            @media (max-width: 768px) {
                                .select2-container {
                                    width: 100% !important;
                                }
                            }
                        </style>
                    `);
                },
                validateField(field) {
                    this.errors[field] = '';

                    switch (field) {
                        case 'provinsi_id':
                            if (!this.formData.provinsi_id) {
                                this.errors.provinsi_id = 'Provinsi wajib dipilih';
                            }
                            break;
                            
                        case 'kabupaten_id':
                            if (!this.formData.kabupaten_id) {
                                this.errors.kabupaten_id = 'Kabupaten/Kota wajib dipilih';
                            }
                            break;
                            
                        case 'kecamatan_id':
                            if (!this.formData.kecamatan_id) {
                                this.errors.kecamatan_id = 'Kecamatan wajib dipilih';
                            }
                            break;
                            
                        case 'desa_id':
                            if (!this.formData.desa_id) {
                                this.errors.desa_id = 'Desa/Kelurahan wajib dipilih';
                            }
                            break;

                        case 'nama_lengkap':
                            if (!this.formData.nama_lengkap) {
                                this.errors.nama_lengkap = 'Nama Lengkap wajib diisi';
                            } else if (this.formData.nama_lengkap.length < 3) {
                                this.errors.nama_lengkap = 'Nama Lengkap minimal 3 karakter';
                            }
                            break;

                        case 'jenis_kelamin':
                            if (!this.formData.jenis_kelamin) {
                                this.errors.jenis_kelamin = 'Jenis Kelamin wajib dipilih';
                            }
                            break;

                        case 'tempat_lahir':
                            if (!this.formData.tempat_lahir) {
                                this.errors.tempat_lahir = 'Tempat Lahir wajib diisi';
                            } else if (this.formData.tempat_lahir.length < 3) {
                                this.errors.tempat_lahir = 'Tempat Lahir minimal 3 karakter';
                            }
                            break;

                        case 'tanggal_lahir':
                            if (!this.formData.tanggal_lahir) {
                                this.errors.tanggal_lahir = 'Tanggal Lahir wajib diisi';
                            } else {
                                const date = new Date(this.formData.tanggal_lahir);
                                if (isNaN(date.getTime())) {
                                    this.errors.tanggal_lahir = 'Format Tanggal Lahir tidak valid';
                                } else if (date > new Date()) {
                                    this.errors.tanggal_lahir = 'Tanggal Lahir tidak boleh di masa depan';
                                }
                            }
                            break;

                        case 'anak_ke':
                            if (!this.formData.anak_ke) {
                                this.errors.anak_ke = 'Anak Ke wajib diisi';
                            } else if (isNaN(this.formData.anak_ke) || this.formData.anak_ke < 1 || this.formData.anak_ke >
                                20) {
                                this.errors.anak_ke = 'Anak Ke harus antara 1-20';
                            }
                            break;

                        case 'jumlah_saudara':
                            if (!this.formData.jumlah_saudara) {
                                this.errors.jumlah_saudara = 'Jumlah Saudara wajib diisi';
                            } else if (isNaN(this.formData.jumlah_saudara) || this.formData.jumlah_saudara < 0 || this
                                .formData.jumlah_saudara > 20) {
                                this.errors.jumlah_saudara = 'Jumlah Saudara harus antara 0-20';
                            }
                            break;

                        case 'alamat':
                            if (!this.formData.alamat) {
                                this.errors.alamat = 'Alamat wajib diisi';
                            } else if (this.formData.alamat.length < 10) {
                                this.errors.alamat = 'Alamat minimal 10 karakter';
                            }
                            break;

                        case 'kode_pos':
                            if (!this.formData.kode_pos) {
                                this.errors.kode_pos = 'Kode Pos wajib diisi';
                            } else if (!/^\d{5}$/.test(this.formData.kode_pos)) {
                                this.errors.kode_pos = 'Kode Pos harus 5 digit angka';
                            }
                            break;

                        case 'no_kk':
                            if (!this.formData.no_kk) {
                                this.errors.no_kk = 'Nomor Kartu Keluarga wajib diisi';
                            } else if (!/^\d{16}$/.test(this.formData.no_kk)) {
                                this.errors.no_kk = 'Nomor Kartu Keluarga harus 16 digit angka';
                            }
                            break;

                        case 'nik_ayah':
                            if (!this.formData.nik_ayah) {
                                this.errors.nik_ayah = 'NIK Ayah wajib diisi';
                            } else if (!/^\d{16}$/.test(this.formData.nik_ayah)) {
                                this.errors.nik_ayah = 'NIK Ayah harus 16 digit angka';
                            }
                            break;

                        case 'nama_ayah':
                            if (!this.formData.nama_ayah) {
                                this.errors.nama_ayah = 'Nama Ayah wajib diisi';
                            } else if (this.formData.nama_ayah.length < 3) {
                                this.errors.nama_ayah = 'Nama Ayah minimal 3 karakter';
                            }
                            break;

                        case 'pendidikan_ayah':
                            if (!this.formData.pendidikan_ayah) {
                                this.errors.pendidikan_ayah = 'Pendidikan Ayah wajib dipilih';
                            }
                            break;

                        case 'pekerjaan_ayah':
                            if (!this.formData.pekerjaan_ayah) {
                                this.errors.pekerjaan_ayah = 'Pekerjaan Ayah wajib diisi';
                            } else if (this.formData.pekerjaan_ayah.length < 3) {
                                this.errors.pekerjaan_ayah = 'Pekerjaan Ayah minimal 3 karakter';
                            }
                            break;

                        case 'nik_ibu':
                            if (!this.formData.nik_ibu) {
                                this.errors.nik_ibu = 'NIK Ibu wajib diisi';
                            } else if (!/^\d{16}$/.test(this.formData.nik_ibu)) {
                                this.errors.nik_ibu = 'NIK Ibu harus 16 digit angka';
                            }
                            break;

                        case 'nama_ibu':
                            if (!this.formData.nama_ibu) {
                                this.errors.nama_ibu = 'Nama Ibu wajib diisi';
                            } else if (this.formData.nama_ibu.length < 3) {
                                this.errors.nama_ibu = 'Nama Ibu minimal 3 karakter';
                            }
                            break;

                        case 'pendidikan_ibu':
                            if (!this.formData.pendidikan_ibu) {
                                this.errors.pendidikan_ibu = 'Pendidikan Ibu wajib dipilih';
                            }
                            break;

                        case 'pekerjaan_ibu':
                            if (!this.formData.pekerjaan_ibu) {
                                this.errors.pekerjaan_ibu = 'Pekerjaan Ibu wajib diisi';
                            } else if (this.formData.pekerjaan_ibu.length < 3) {
                                this.errors.pekerjaan_ibu = 'Pekerjaan Ibu minimal 3 karakter';
                            }
                            break;

                        case 'no_hp':
                            if (!this.formData.no_hp) {
                                this.errors.no_hp = 'Nomor HP wajib diisi';
                            } else if (!/^(\+62|62|0)8[1-9][0-9]{6,9}$/.test(this.formData.no_hp)) {
                                this.errors.no_hp = 'Format Nomor HP tidak valid (contoh: 08123456789)';
                            }
                            break;

                        case 'asal_sekolah':
                            if (!this.formData.asal_sekolah) {
                                this.errors.asal_sekolah = 'Asal Sekolah wajib diisi';
                            } else if (this.formData.asal_sekolah.length < 3) {
                                this.errors.asal_sekolah = 'Asal Sekolah minimal 3 karakter';
                            }
                            break;
                    }
                },
                // Load Kabupaten/Kota berdasarkan Provinsi yang dipilih
                loadKabupaten() {
                    if (!this.formData.provinsi_id) return;
                    
                    fetch(`/api/provinces/${this.formData.provinsi_id}/regencies`)
                        .then(response => response.json())
                        .then(data => {
                            // Populate select kabupaten
                            const selectKabupaten = document.getElementById('kabupaten_id');
                            selectKabupaten.innerHTML = '<option value="" disabled selected>Pilih Kabupaten/Kota</option>';
                            
                            data.forEach(kabupaten => {
                                const option = document.createElement('option');
                                option.value = kabupaten.id;
                                option.textContent = kabupaten.name;
                                option.selected = kabupaten.id == '{{ $user->kabupaten_id ?? old('kabupaten_id') }}';
                                selectKabupaten.appendChild(option);
                            });
                            
                            // Reset kecamatan dan desa
                            this.formData.kecamatan_id = '';
                            this.formData.desa_id = '';
                            document.getElementById('kecamatan_id').innerHTML = '<option value="" disabled selected>Pilih Kecamatan</option>';
                            document.getElementById('desa_id').innerHTML = '<option value="" disabled selected>Pilih Desa/Kelurahan</option>';
                            
                            // Initialize kabupaten select2
                            $('.kabupaten-select').select2({
                                placeholder: 'Pilih Kabupaten/Kota',
                                width: '100%',
                                dropdownParent: $('body'),
                            });
                            
                            // Handle kabupaten change
                            $('.kabupaten-select').on('select2:select', function(e) {
                                const value = e.params.data.id;
                                // Trigger Alpine.js model update
                                document.getElementById('kabupaten_id').value = value;
                                document.getElementById('kabupaten_id').dispatchEvent(new Event('change', { bubbles: true }));
                            });
                        })
                        .catch(error => console.error('Error:', error));
                },
                
                
                // Load Kecamatan berdasarkan Kabupaten yang dipilih
                loadKecamatan() {
                    if (!this.formData.kabupaten_id) return;
                    
                    fetch(`/api/regencies/${this.formData.kabupaten_id}/districts`)
                        .then(response => response.json())
                        .then(data => {
                            // Populate select kecamatan
                            const selectKecamatan = document.getElementById('kecamatan_id');
                            selectKecamatan.innerHTML = '<option value="" disabled selected>Pilih Kecamatan</option>';
                            
                            data.forEach(kecamatan => {
                                const option = document.createElement('option');
                                option.value = kecamatan.id;
                                option.textContent = kecamatan.name;
                                option.selected = kecamatan.id == '{{ $user->kecamatan_id ?? old('kecamatan_id') }}';
                                selectKecamatan.appendChild(option);
                            });
                            
                            // Reset desa
                            this.formData.desa_id = '';
                            document.getElementById('desa_id').innerHTML = '<option value="" disabled selected>Pilih Desa/Kelurahan</option>';
                            
                            // Initialize kecamatan select2
                            $('.kecamatan-select').select2({
                                placeholder: 'Pilih Kecamatan',
                                width: '100%',
                                dropdownParent: $('body'),
                            });
                            
                            // Handle kecamatan change
                            $('.kecamatan-select').on('select2:select', function(e) {
                                const value = e.params.data.id;
                                // Trigger Alpine.js model update
                                document.getElementById('kecamatan_id').value = value;
                                document.getElementById('kecamatan_id').dispatchEvent(new Event('change', { bubbles: true }));
                            });
                        })
                        .catch(error => console.error('Error:', error));
                },
                
                
                // Load Desa berdasarkan Kecamatan yang dipilih
                loadDesa() {
                    if (!this.formData.kecamatan_id) return;
                    
                    fetch(`/api/districts/${this.formData.kecamatan_id}/villages`)
                        .then(response => response.json())
                        .then(data => {
                            // Populate select desa
                            const selectDesa = document.getElementById('desa_id');
                            selectDesa.innerHTML = '<option value="" disabled selected>Pilih Desa/Kelurahan</option>';
                            
                            data.forEach(desa => {
                                const option = document.createElement('option');
                                option.value = desa.id;
                                option.textContent = desa.name;
                                option.selected = desa.id == '{{ $user->desa_id ?? old('desa_id') }}';
                                selectDesa.appendChild(option);
                            });
                            
                            // Initialize desa select2
                            $('.desa-select').select2({
                                placeholder: 'Pilih Desa/Kelurahan',
                                width: '100%',
                                dropdownParent: $('body'),
                            });
                            
                            // Handle desa change
                            $('.desa-select').on('select2:select', function(e) {
                                const value = e.params.data.id;
                                // Trigger Alpine.js model update
                                document.getElementById('desa_id').value = value;
                                document.getElementById('desa_id').dispatchEvent(new Event('change', { bubbles: true }));
                            });
                        })
                        .catch(error => console.error('Error:', error));
                },
                
                
                validate() {
                    // Validasi semua field
                    const fields = [
                        'nama_lengkap', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir',
                        'anak_ke', 'jumlah_saudara', 'provinsi_id', 'kabupaten_id', 
                        'kecamatan_id', 'desa_id', 'alamat', 'kode_pos', 'no_kk',
                        'nik_ayah', 'nama_ayah', 'pendidikan_ayah', 'pekerjaan_ayah',
                        'nik_ibu', 'nama_ibu', 'pendidikan_ibu', 'pekerjaan_ibu',
                        'no_hp', 'asal_sekolah'
                    ];

                    fields.forEach(field => this.validateField(field));

                    // Cek apakah ada error
                    return Object.values(this.errors).every(error => !error);
                }
            }
        }
    </script>
@endsection
