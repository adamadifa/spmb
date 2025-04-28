@extends('layouts.dashboard')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-10">
                    <div class="mb-10">
                        <h2 class="text-3xl font-extrabold text-gray-900">Form Pendaftaran</h2>
                        <p class="mt-3 text-base text-gray-600">Silakan isi form pendaftaran dengan data yang benar</p>
                    </div>

                    <form id="formPendaftaran" action="{{ route('pendaftar.update', $user->no_register) }}" method="POST"
                        class="space-y-4" x-data="formValidation()" @submit.prevent="validate() && $el.submit()">
                        @csrf
                        @method('PUT')

                        <!-- Data Pribadi -->
                        <div class="bg-white rounded-lg border border-gray-300 p-10 shadow-sm">
                            <h3 class="text-xl font-semibold text-gray-900 mb-10 border-b border-gray-200 pb-4">Data Pribadi
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="nisn"
                                        class="block text-sm font-semibold text-gray-700 mb-3">NISN</label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <i data-lucide="credit-card" class="h-5 w-5 text-gray-400"></i>
                                        </div>
                                        <input type="text" name="nisn" id="nisn" x-model="formData.nisn"
                                            @input="validateField('nisn')"
                                            :class="{
                                                'border-red-600': errors.nisn,
                                                'border-green-500': !errors.nisn &&
                                                    formData.nisn
                                            }"
                                            placeholder="Masukkan NISN"
                                            class="pl-12 block w-full rounded-md border border-gray-300 shadow-sm focus:outline-none focus:ring-0 py-3">
                                    </div>
                                    <template x-if="errors.nisn">
                                        <p class="mt-2 text-sm text-red-600" x-text="errors.nisn"></p>
                                    </template>
                                    @error('nisn')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="nama_lengkap" class="block text-sm font-semibold text-gray-700 mb-3">Nama
                                        Lengkap <span class="text-red-500">*</span></label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <i data-lucide="user" class="h-5 w-5 text-gray-400"></i>
                                        </div>
                                        <input type="text" name="nama_lengkap" id="nama_lengkap"
                                            x-model="formData.nama_lengkap" @input="validateField('nama_lengkap')"
                                            :class="{
                                                'border-red-600': errors.nama_lengkap,
                                                'border-green-500': !errors
                                                    .nama_lengkap && formData.nama_lengkap
                                            }"
                                            placeholder="Masukkan Nama Lengkap"
                                            class="pl-12 block w-full rounded-md border border-gray-300 shadow-sm focus:outline-none focus:ring-0 py-3">
                                    </div>
                                    <template x-if="errors.nama_lengkap">
                                        <p class="mt-2 text-sm text-red-600" x-text="errors.nama_lengkap"></p>
                                    </template>
                                    @error('nama_lengkap')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="jenis_kelamin" class="block text-sm font-semibold text-gray-700 mb-3">Jenis
                                        Kelamin <span class="text-red-500">*</span></label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <i data-lucide="users" class="h-5 w-5 text-gray-400"></i>
                                        </div>
                                        <select name="jenis_kelamin" id="jenis_kelamin" x-model="formData.jenis_kelamin"
                                            @change="validateField('jenis_kelamin')"
                                            :class="{
                                                'border-red-600': errors.jenis_kelamin,
                                                'border-green-500': !errors.jenis_kelamin && formData.jenis_kelamin
                                            }"
                                            class="pl-12 block w-full rounded-md border border-gray-300 shadow-sm focus:border-primary-500 focus:ring-1 focus:ring-primary-500 focus:ring-opacity-50 py-3">
                                            <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                            <option value="L" {{ $user->jenis_kelamin == 'L' ? 'selected' : '' }}>
                                                Laki-laki</option>
                                            <option value="P" {{ $user->jenis_kelamin == 'P' ? 'selected' : '' }}>
                                                Perempuan</option>
                                        </select>
                                    </div>
                                    <template x-if="errors.jenis_kelamin">
                                        <p class="mt-2 text-sm text-red-600" x-text="errors.jenis_kelamin"></p>
                                    </template>
                                    @error('jenis_kelamin')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="tempat_lahir" class="block text-sm font-semibold text-gray-700 mb-3">Tempat
                                        Lahir <span class="text-red-500">*</span></label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <i data-lucide="map-pin" class="h-5 w-5 text-gray-400"></i>
                                        </div>
                                        <input type="text" name="tempat_lahir" id="tempat_lahir"
                                            x-model="formData.tempat_lahir" @input="validateField('tempat_lahir')"
                                            :class="{
                                                'border-red-600': errors.tempat_lahir,
                                                'border-green-500': !errors.tempat_lahir && formData.tempat_lahir
                                            }"
                                            placeholder="Masukkan Tempat Lahir"
                                            class="pl-12 block w-full rounded-md border border-gray-300 shadow-sm focus:border-primary-500 focus:ring-1 focus:ring-primary-500 focus:ring-opacity-50 py-3">
                                    </div>
                                    <template x-if="errors.tempat_lahir">
                                        <p class="mt-2 text-sm text-red-600" x-text="errors.tempat_lahir"></p>
                                    </template>
                                    @error('tempat_lahir')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="tanggal_lahir"
                                        class="block text-sm font-semibold text-gray-700 mb-3">Tanggal Lahir <span
                                            class="text-red-500">*</span></label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i data-lucide="calendar" class="h-5 w-5 text-gray-400"></i>
                                        </div>
                                        <input type="text" name="tanggal_lahir" id="tanggal_lahir"
                                            x-model="formData.tanggal_lahir" @input="validateField('tanggal_lahir')"
                                            :class="{
                                                'border-red-600': errors.tanggal_lahir,
                                                'border-green-500': !errors.tanggal_lahir && formData.tanggal_lahir
                                            }"
                                            placeholder="YYYY-MM-DD"
                                            class="pl-10 block w-full rounded-md border border-gray-300 shadow-sm focus:border-primary-500 focus:ring-1 focus:ring-primary-500 focus:ring-opacity-50 py-3">
                                    </div>
                                    <template x-if="errors.tanggal_lahir">
                                        <p class="mt-2 text-sm text-red-600" x-text="errors.tanggal_lahir"></p>
                                    </template>
                                    @error('tanggal_lahir')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="anak_ke" class="block text-sm font-semibold text-gray-700 mb-3">Anak
                                        Ke <span class="text-red-500">*</span></label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i data-lucide="hash" class="h-5 w-5 text-gray-400"></i>
                                        </div>
                                        <input type="number" name="anak_ke" id="anak_ke" x-model="formData.anak_ke"
                                            @input="validateField('anak_ke')"
                                            :class="{
                                                'border-red-600': errors.anak_ke,
                                                'border-green-500': !errors.anak_ke && formData.anak_ke
                                            }"
                                            min="1" placeholder="Masukkan Anak Ke"
                                            class="pl-10 block w-full rounded-md border border-gray-300 shadow-sm focus:border-primary-500 focus:ring-1 focus:ring-primary-500 focus:ring-opacity-50 py-3">
                                    </div>
                                    <template x-if="errors.anak_ke">
                                        <p class="mt-2 text-sm text-red-600" x-text="errors.anak_ke"></p>
                                    </template>
                                    @error('anak_ke')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="jumlah_saudara"
                                        class="block text-sm font-semibold text-gray-700 mb-3">Jumlah Saudara <span
                                            class="text-red-500">*</span></label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i data-lucide="users" class="h-5 w-5 text-gray-400"></i>
                                        </div>
                                        <input type="number" name="jumlah_saudara" id="jumlah_saudara"
                                            x-model="formData.jumlah_saudara" @input="validateField('jumlah_saudara')"
                                            :class="{
                                                'border-red-600': errors.jumlah_saudara,
                                                'border-green-500': !errors.jumlah_saudara && formData.jumlah_saudara
                                            }"
                                            min="0" placeholder="Masukkan Jumlah Saudara"
                                            class="pl-10 block w-full rounded-md border border-gray-300 shadow-sm focus:border-primary-500 focus:ring-1 focus:ring-primary-500 focus:ring-opacity-50 py-3">
                                    </div>
                                    <template x-if="errors.jumlah_saudara">
                                        <p class="mt-2 text-sm text-red-600" x-text="errors.jumlah_saudara"></p>
                                    </template>
                                    @error('jumlah_saudara')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="md:col-span-2">
                                    <label for="alamat" class="block text-sm font-semibold text-gray-700 mb-3">Alamat
                                        Lengkap <span class="text-red-500">*</span></label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div class="absolute top-3 left-0 pl-3 flex items-center pointer-events-none">
                                            <i data-lucide="map" class="h-5 w-5 text-gray-400"></i>
                                        </div>
                                        <textarea name="alamat" id="alamat" rows="3" x-model="formData.alamat" @input="validateField('alamat')"
                                            :class="{
                                                'border-red-600': errors.alamat,
                                                'border-green-500': !errors.alamat && formData.alamat
                                            }"
                                            placeholder="Masukkan Alamat Lengkap"
                                            class="pl-10 block w-full rounded-md border border-gray-300 shadow-sm focus:border-primary-500 focus:ring-1 focus:ring-primary-500 focus:ring-opacity-50">{{ $user->alamat ?? old('alamat') }}</textarea>
                                    </div>
                                    <template x-if="errors.alamat">
                                        <p class="mt-2 text-sm text-red-600" x-text="errors.alamat"></p>
                                    </template>
                                    @error('alamat')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="kode_pos" class="block text-sm font-semibold text-gray-700 mb-3">Kode
                                        Pos <span class="text-red-500">*</span></label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i data-lucide="mail" class="h-5 w-5 text-gray-400"></i>
                                        </div>
                                        <input type="text" name="kode_pos" id="kode_pos" x-model="formData.kode_pos"
                                            @input="validateField('kode_pos')"
                                            :class="{
                                                'border-red-600': errors.kode_pos,
                                                'border-green-500': !errors.kode_pos && formData.kode_pos
                                            }"
                                            maxlength="5" placeholder="Masukkan Kode Pos"
                                            class="pl-10 block w-full rounded-md border border-gray-300 shadow-sm focus:border-primary-500 focus:ring-1 focus:ring-primary-500 focus:ring-opacity-50 py-3">
                                    </div>
                                    <template x-if="errors.kode_pos">
                                        <p class="mt-2 text-sm text-red-600" x-text="errors.kode_pos"></p>
                                    </template>
                                    @error('kode_pos')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="no_kk" class="block text-sm font-semibold text-gray-700 mb-3">Nomor
                                        Kartu Keluarga <span class="text-red-500">*</span></label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i data-lucide="credit-card" class="h-5 w-5 text-gray-400"></i>
                                        </div>
                                        <input type="text" name="no_kk" id="no_kk" x-model="formData.no_kk"
                                            @input="validateField('no_kk')"
                                            :class="{
                                                'border-red-600': errors.no_kk,
                                                'border-green-500': !errors.no_kk && formData.no_kk
                                            }"
                                            maxlength="16" placeholder="Masukkan Nomor Kartu Keluarga"
                                            class="pl-10 block w-full rounded-md border border-gray-300 shadow-sm focus:border-primary-500 focus:ring-1 focus:ring-primary-500 focus:ring-opacity-50 py-3">
                                    </div>
                                    <template x-if="errors.no_kk">
                                        <p class="mt-2 text-sm text-red-600" x-text="errors.no_kk"></p>
                                    </template>
                                    @error('no_kk')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Data Orang Tua -->
                        <div class="bg-white rounded-lg border border-gray-300 p-8 shadow-sm">
                            <h3 class="text-xl font-semibold text-gray-900 mb-8 border-b border-gray-200 pb-3">Data Orang
                                Tua</h3>

                            <!-- Data Ayah -->
                            <div class="mb-8">
                                <h4 class="text-lg font-semibold text-gray-800 mb-6">Data Ayah</h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                    <div>
                                        <label for="nik_ayah" class="block text-sm font-semibold text-gray-700 mb-3">NIK
                                            Ayah <span class="text-red-500">*</span></label>
                                        <div class="relative rounded-md shadow-sm">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <i data-lucide="credit-card" class="h-5 w-5 text-gray-400"></i>
                                            </div>
                                            <input type="text" name="nik_ayah" id="nik_ayah"
                                                x-model="formData.nik_ayah" @input="validateField('nik_ayah')"
                                                :class="{
                                                    'border-red-600': errors.nik_ayah,
                                                    'border-green-500': !errors.nik_ayah && formData.nik_ayah
                                                }"
                                                maxlength="16" placeholder="Masukkan NIK Ayah"
                                                class="pl-10 block w-full rounded-md border border-gray-300 shadow-sm focus:border-primary-500 focus:ring-1 focus:ring-primary-500 focus:ring-opacity-50 py-3">
                                        </div>
                                        <template x-if="errors.nik_ayah">
                                            <p class="mt-2 text-sm text-red-600" x-text="errors.nik_ayah"></p>
                                        </template>
                                        @error('nik_ayah')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="nama_ayah" class="block text-sm font-semibold text-gray-700 mb-3">Nama
                                            Ayah <span class="text-red-500">*</span></label>
                                        <div class="relative rounded-md shadow-sm">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <i data-lucide="user" class="h-5 w-5 text-gray-400"></i>
                                            </div>
                                            <input type="text" name="nama_ayah" id="nama_ayah"
                                                x-model="formData.nama_ayah" @input="validateField('nama_ayah')"
                                                :class="{
                                                    'border-red-600': errors.nama_ayah,
                                                    'border-green-500': !errors.nama_ayah && formData.nama_ayah
                                                }"
                                                placeholder="Masukkan Nama Ayah"
                                                class="pl-10 block w-full rounded-md border border-gray-300 shadow-sm focus:border-primary-500 focus:ring-1 focus:ring-primary-500 focus:ring-opacity-50 py-3">
                                        </div>
                                        <template x-if="errors.nama_ayah">
                                            <p class="mt-2 text-sm text-red-600" x-text="errors.nama_ayah"></p>
                                        </template>
                                        @error('nama_ayah')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="pendidikan_ayah"
                                            class="block text-sm font-semibold text-gray-700 mb-3">Pendidikan Ayah <span
                                                class="text-red-500">*</span></label>
                                        <div class="relative rounded-md shadow-sm">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <i data-lucide="graduation-cap" class="h-5 w-5 text-gray-400"></i>
                                            </div>
                                            <select name="pendidikan_ayah" id="pendidikan_ayah"
                                                x-model="formData.pendidikan_ayah"
                                                @change="validateField('pendidikan_ayah')"
                                                :class="{
                                                    'border-red-600': errors.pendidikan_ayah,
                                                    'border-green-500': !errors.pendidikan_ayah && formData
                                                        .pendidikan_ayah
                                                }"
                                                class="pl-10 block w-full rounded-md border border-gray-300 shadow-sm focus:border-primary-500 focus:ring-1 focus:ring-primary-500 focus:ring-opacity-50 py-3">
                                                <option value="" disabled selected>Pilih Pendidikan</option>
                                                <option value="SD"
                                                    {{ $user->pendidikan_ayah == 'SD' ? 'selected' : '' }}>SD</option>
                                                <option value="SMP"
                                                    {{ $user->pendidikan_ayah == 'SMP' ? 'selected' : '' }}>SMP</option>
                                                <option value="SMA"
                                                    {{ $user->pendidikan_ayah == 'SMA' ? 'selected' : '' }}>SMA</option>
                                                <option value="D3"
                                                    {{ $user->pendidikan_ayah == 'D3' ? 'selected' : '' }}>D3</option>
                                                <option value="S1"
                                                    {{ $user->pendidikan_ayah == 'S1' ? 'selected' : '' }}>S1</option>
                                                <option value="S2"
                                                    {{ $user->pendidikan_ayah == 'S2' ? 'selected' : '' }}>S2</option>
                                                <option value="S3"
                                                    {{ $user->pendidikan_ayah == 'S3' ? 'selected' : '' }}>S3</option>
                                            </select>
                                        </div>
                                        <template x-if="errors.pendidikan_ayah">
                                            <p class="mt-2 text-sm text-red-600" x-text="errors.pendidikan_ayah"></p>
                                        </template>
                                        @error('pendidikan_ayah')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="pekerjaan_ayah"
                                            class="block text-sm font-semibold text-gray-700 mb-3">Pekerjaan Ayah <span
                                                class="text-red-500">*</span></label>
                                        <div class="relative rounded-md shadow-sm">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <i data-lucide="briefcase" class="h-5 w-5 text-gray-400"></i>
                                            </div>
                                            <input type="text" name="pekerjaan_ayah" id="pekerjaan_ayah"
                                                x-model="formData.pekerjaan_ayah" @input="validateField('pekerjaan_ayah')"
                                                :class="{
                                                    'border-red-600': errors.pekerjaan_ayah,
                                                    'border-green-500': !errors.pekerjaan_ayah && formData
                                                        .pekerjaan_ayah
                                                }"
                                                placeholder="Masukkan Pekerjaan Ayah"
                                                class="pl-10 block w-full rounded-md border border-gray-300 shadow-sm focus:border-primary-500 focus:ring-1 focus:ring-primary-500 focus:ring-opacity-50 py-3">
                                        </div>
                                        <template x-if="errors.pekerjaan_ayah">
                                            <p class="mt-2 text-sm text-red-600" x-text="errors.pekerjaan_ayah"></p>
                                        </template>
                                        @error('pekerjaan_ayah')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Data Ibu -->
                            <div>
                                <h4 class="text-lg font-semibold text-gray-800 mb-6">Data Ibu</h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                    <div>
                                        <label for="nik_ibu" class="block text-sm font-semibold text-gray-700 mb-3">NIK
                                            Ibu <span class="text-red-500">*</span></label>
                                        <div class="relative rounded-md shadow-sm">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <i data-lucide="credit-card" class="h-5 w-5 text-gray-400"></i>
                                            </div>
                                            <input type="text" name="nik_ibu" id="nik_ibu"
                                                x-model="formData.nik_ibu" @input="validateField('nik_ibu')"
                                                :class="{
                                                    'border-red-600': errors.nik_ibu,
                                                    'border-green-500': !errors.nik_ibu && formData.nik_ibu
                                                }"
                                                maxlength="16" placeholder="Masukkan NIK Ibu"
                                                class="pl-10 block w-full rounded-md border border-gray-300 shadow-sm focus:border-primary-500 focus:ring-1 focus:ring-primary-500 focus:ring-opacity-50 py-3">
                                        </div>
                                        <template x-if="errors.nik_ibu">
                                            <p class="mt-2 text-sm text-red-600" x-text="errors.nik_ibu"></p>
                                        </template>
                                        @error('nik_ibu')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="nama_ibu" class="block text-sm font-semibold text-gray-700 mb-3">Nama
                                            Ibu <span class="text-red-500">*</span></label>
                                        <div class="relative rounded-md shadow-sm">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <i data-lucide="user" class="h-5 w-5 text-gray-400"></i>
                                            </div>
                                            <input type="text" name="nama_ibu" id="nama_ibu"
                                                x-model="formData.nama_ibu" @input="validateField('nama_ibu')"
                                                :class="{
                                                    'border-red-600': errors.nama_ibu,
                                                    'border-green-500': !errors.nama_ibu && formData.nama_ibu
                                                }"
                                                placeholder="Masukkan Nama Ibu"
                                                class="pl-10 block w-full rounded-md border border-gray-300 shadow-sm focus:border-primary-500 focus:ring-1 focus:ring-primary-500 focus:ring-opacity-50 py-3">
                                        </div>
                                        <template x-if="errors.nama_ibu">
                                            <p class="mt-2 text-sm text-red-600" x-text="errors.nama_ibu"></p>
                                        </template>
                                        @error('nama_ibu')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="pendidikan_ibu"
                                            class="block text-sm font-semibold text-gray-700 mb-3">Pendidikan Ibu <span
                                                class="text-red-500">*</span></label>
                                        <div class="relative rounded-md shadow-sm">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <i data-lucide="graduation-cap" class="h-5 w-5 text-gray-400"></i>
                                            </div>
                                            <select name="pendidikan_ibu" id="pendidikan_ibu"
                                                x-model="formData.pendidikan_ibu"
                                                @change="validateField('pendidikan_ibu')"
                                                :class="{
                                                    'border-red-600': errors.pendidikan_ibu,
                                                    'border-green-500': !errors.pendidikan_ibu && formData
                                                        .pendidikan_ibu
                                                }"
                                                class="pl-10 block w-full rounded-md border border-gray-300 shadow-sm focus:border-primary-500 focus:ring-1 focus:ring-primary-500 focus:ring-opacity-50 py-3">
                                                <option value="" disabled selected>Pilih Pendidikan</option>
                                                <option value="SD"
                                                    {{ $user->pendidikan_ibu == 'SD' ? 'selected' : '' }}>SD</option>
                                                <option value="SMP"
                                                    {{ $user->pendidikan_ibu == 'SMP' ? 'selected' : '' }}>SMP</option>
                                                <option value="SMA"
                                                    {{ $user->pendidikan_ibu == 'SMA' ? 'selected' : '' }}>SMA</option>
                                                <option value="D3"
                                                    {{ $user->pendidikan_ibu == 'D3' ? 'selected' : '' }}>D3</option>
                                                <option value="S1"
                                                    {{ $user->pendidikan_ibu == 'S1' ? 'selected' : '' }}>S1</option>
                                                <option value="S2"
                                                    {{ $user->pendidikan_ibu == 'S2' ? 'selected' : '' }}>S2</option>
                                                <option value="S3"
                                                    {{ $user->pendidikan_ibu == 'S3' ? 'selected' : '' }}>S3</option>
                                            </select>
                                        </div>
                                        <template x-if="errors.pendidikan_ibu">
                                            <p class="mt-2 text-sm text-red-600" x-text="errors.pendidikan_ibu"></p>
                                        </template>
                                        @error('pendidikan_ibu')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="pekerjaan_ibu"
                                            class="block text-sm font-semibold text-gray-700 mb-3">Pekerjaan Ibu <span
                                                class="text-red-500">*</span></label>
                                        <div class="relative rounded-md shadow-sm">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <i data-lucide="briefcase" class="h-5 w-5 text-gray-400"></i>
                                            </div>
                                            <input type="text" name="pekerjaan_ibu" id="pekerjaan_ibu"
                                                x-model="formData.pekerjaan_ibu" @input="validateField('pekerjaan_ibu')"
                                                :class="{
                                                    'border-red-600': errors.pekerjaan_ibu,
                                                    'border-green-500': !errors.pekerjaan_ibu && formData.pekerjaan_ibu
                                                }"
                                                placeholder="Masukkan Pekerjaan Ibu"
                                                class="pl-10 block w-full rounded-md border border-gray-300 shadow-sm focus:border-primary-500 focus:ring-1 focus:ring-primary-500 focus:ring-opacity-50 py-3">
                                        </div>
                                        <template x-if="errors.pekerjaan_ibu">
                                            <p class="mt-2 text-sm text-red-600" x-text="errors.pekerjaan_ibu"></p>
                                        </template>
                                        @error('pekerjaan_ibu')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Data Kontak -->
                        <div class="bg-white rounded-lg border border-gray-300 p-8 shadow-sm">
                            <h3 class="text-xl font-semibold text-gray-900 mb-8 border-b border-gray-200 pb-3">Data Kontak
                                & Sekolah</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div>
                                    <label for="no_hp" class="block text-sm font-semibold text-gray-700 mb-3">Nomor
                                        HP <span class="text-red-500">*</span></label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i data-lucide="phone" class="h-5 w-5 text-gray-400"></i>
                                        </div>
                                        <input type="text" name="no_hp" id="no_hp" x-model="formData.no_hp"
                                            @input="validateField('no_hp')"
                                            :class="{
                                                'border-red-600': errors.no_hp,
                                                'border-green-500': !errors.no_hp && formData.no_hp
                                            }"
                                            maxlength="15" placeholder="Masukkan Nomor HP"
                                            class="pl-10 block w-full rounded-md border border-gray-300 shadow-sm focus:border-primary-500 focus:ring-1 focus:ring-primary-500 focus:ring-opacity-50 py-3">
                                    </div>
                                    <template x-if="errors.no_hp">
                                        <p class="mt-2 text-sm text-red-600" x-text="errors.no_hp"></p>
                                    </template>
                                    @error('no_hp')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="asal_sekolah" class="block text-sm font-semibold text-gray-700 mb-3">Asal
                                        Sekolah <span class="text-red-500">*</span></label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i data-lucide="building" class="h-5 w-5 text-gray-400"></i>
                                        </div>
                                        <input type="text" name="asal_sekolah" id="asal_sekolah"
                                            x-model="formData.asal_sekolah" @input="validateField('asal_sekolah')"
                                            :class="{
                                                'border-red-600': errors.asal_sekolah,
                                                'border-green-500': !errors.asal_sekolah && formData.asal_sekolah
                                            }"
                                            placeholder="Masukkan Asal Sekolah"
                                            class="pl-10 block w-full rounded-md border border-gray-300 shadow-sm focus:border-primary-500 focus:ring-1 focus:ring-primary-500 focus:ring-opacity-50 py-3">
                                    </div>
                                    <template x-if="errors.asal_sekolah">
                                        <p class="mt-2 text-sm text-red-600" x-text="errors.asal_sekolah"></p>
                                    </template>
                                    @error('asal_sekolah')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="flex justify-end space-x-6 pt-6">
                            <button type="reset"
                                class="inline-flex items-center px-7 py-3 border border-gray-300 rounded-md text-sm font-semibold text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-opacity-50">
                                <i data-lucide="refresh-ccw" class="w-5 h-5 mr-2"></i>
                                Reset
                            </button>
                            <button type="submit"
                                class="inline-flex items-center px-7 py-3 border border-transparent rounded-md shadow-sm text-sm font-semibold text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-opacity-50">
                                <i data-lucide="save" class="w-5 h-5 mr-2"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Flatpickr -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

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
                },
                validateField(field) {
                    this.errors[field] = '';

                    switch (field) {
                        case 'nisn':
                            if (this.formData.nisn && !/^\d{10}$/.test(this.formData.nisn)) {
                                this.errors.nisn = 'NISN harus 10 digit angka';
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
                validate() {
                    // Validasi semua field
                    const fields = [
                        'nisn', 'nama_lengkap', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir',
                        'anak_ke', 'jumlah_saudara', 'alamat', 'kode_pos', 'no_kk',
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
