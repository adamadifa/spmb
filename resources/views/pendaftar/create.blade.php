@extends('layouts.dashboard')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-10">
                    <div class="mb-10">
                        <h2 class="text-2xl font-bold text-gray-800">Form Pendaftaran</h2>
                        <p class="mt-2 text-sm text-gray-600">Silakan isi form pendaftaran dengan data yang benar</p>
                    </div>

                    <form action="{{ route('pendaftar.store') }}" method="POST" class="space-y-12">
                        @csrf

                        <!-- Data Pribadi -->
                        <div class="bg-white rounded-lg border border-gray-200 p-10">
                            <h3 class="text-lg font-medium text-gray-900 mb-8">Data Pribadi</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                                <div>
                                    <label for="nisn" class="block text-sm font-medium text-gray-700 mb-2">NISN</label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <i data-lucide="credit-card" class="h-5 w-5 text-gray-400"></i>
                                        </div>
                                        <input type="text" name="nisn" id="nisn" value="{{ old('nisn') }}"
                                            class="pl-12 block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-300 focus:ring-1 focus:ring-primary-300 focus:ring-opacity-50 py-3">
                                    </div>
                                    @error('nisn')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="nama_lengkap" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <i data-lucide="user" class="h-5 w-5 text-gray-400"></i>
                                        </div>
                                        <input type="text" name="nama_lengkap" id="nama_lengkap" value="{{ old('nama_lengkap') }}" required
                                            class="pl-12 block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-300 focus:ring-1 focus:ring-primary-300 focus:ring-opacity-50 py-3">
                                    </div>
                                    @error('nama_lengkap')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700 mb-2">Jenis Kelamin</label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <i data-lucide="users" class="h-5 w-5 text-gray-400"></i>
                                        </div>
                                        <select name="jenis_kelamin" id="jenis_kelamin" required
                                            class="pl-12 block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-300 focus:ring-1 focus:ring-primary-300 focus:ring-opacity-50 py-3">
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                            <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                                        </select>
                                    </div>
                                    @error('jenis_kelamin')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="tempat_lahir" class="block text-sm font-medium text-gray-700 mb-2">Tempat Lahir</label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <i data-lucide="map-pin" class="h-5 w-5 text-gray-400"></i>
                                        </div>
                                        <input type="text" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir') }}"
                                            class="pl-12 block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-300 focus:ring-1 focus:ring-primary-300 focus:ring-opacity-50 py-3">
                                    </div>
                                    @error('tempat_lahir')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Lahir</label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <i data-lucide="calendar" class="h-5 w-5 text-gray-400"></i>
                                        </div>
                                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                                            class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-300 focus:ring-1 focus:ring-primary-300 focus:ring-opacity-50">
                                    </div>
                                    @error('tanggal_lahir')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="anak_ke" class="block text-sm font-medium text-gray-700">Anak Ke</label>
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i data-lucide="hash" class="h-5 w-5 text-gray-400"></i>
                                        </div>
                                        <input type="number" name="anak_ke" id="anak_ke" value="{{ old('anak_ke') }}" min="1"
                                            class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-300 focus:ring-1 focus:ring-primary-300 focus:ring-opacity-50">
                                    </div>
                                    @error('anak_ke')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="jumlah_saudara" class="block text-sm font-medium text-gray-700">Jumlah Saudara</label>
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i data-lucide="users" class="h-5 w-5 text-gray-400"></i>
                                        </div>
                                        <input type="number" name="jumlah_saudara" id="jumlah_saudara" value="{{ old('jumlah_saudara') }}"
                                            min="0"
                                            class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-300 focus:ring-1 focus:ring-primary-300 focus:ring-opacity-50">
                                    </div>
                                    @error('jumlah_saudara')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="md:col-span-2">
                                    <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat Lengkap</label>
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <div class="absolute top-3 left-0 pl-3 flex items-center pointer-events-none">
                                            <i data-lucide="map" class="h-5 w-5 text-gray-400"></i>
                                        </div>
                                        <textarea name="alamat" id="alamat" rows="3"
                                            class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-300 focus:ring-1 focus:ring-primary-300 focus:ring-opacity-50">{{ old('alamat') }}</textarea>
                                    </div>
                                    @error('alamat')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="kode_pos" class="block text-sm font-medium text-gray-700">Kode Pos</label>
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i data-lucide="mail" class="h-5 w-5 text-gray-400"></i>
                                        </div>
                                        <input type="text" name="kode_pos" id="kode_pos" value="{{ old('kode_pos') }}" maxlength="5"
                                            class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-300 focus:ring-1 focus:ring-primary-300 focus:ring-opacity-50">
                                    </div>
                                    @error('kode_pos')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="no_kk" class="block text-sm font-medium text-gray-700">Nomor Kartu Keluarga</label>
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i data-lucide="credit-card" class="h-5 w-5 text-gray-400"></i>
                                        </div>
                                        <input type="text" name="no_kk" id="no_kk" value="{{ old('no_kk') }}" maxlength="16"
                                            class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-300 focus:ring-1 focus:ring-primary-300 focus:ring-opacity-50">
                                    </div>
                                    @error('no_kk')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Data Orang Tua -->
                        <div class="bg-white rounded-lg border border-gray-200 p-8">
                            <h3 class="text-lg font-medium text-gray-900 mb-6">Data Orang Tua</h3>

                            <!-- Data Ayah -->
                            <div class="mb-8">
                                <h4 class="text-md font-medium text-gray-800 mb-6">Data Ayah</h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                    <div>
                                        <label for="nik_ayah" class="block text-sm font-medium text-gray-700">NIK Ayah</label>
                                        <div class="mt-1 relative rounded-md shadow-sm">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <i data-lucide="credit-card" class="h-5 w-5 text-gray-400"></i>
                                            </div>
                                            <input type="text" name="nik_ayah" id="nik_ayah" value="{{ old('nik_ayah') }}" maxlength="16"
                                                class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-300 focus:ring-1 focus:ring-primary-300 focus:ring-opacity-50">
                                        </div>
                                        @error('nik_ayah')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="nama_ayah" class="block text-sm font-medium text-gray-700">Nama Ayah</label>
                                        <div class="mt-1 relative rounded-md shadow-sm">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <i data-lucide="user" class="h-5 w-5 text-gray-400"></i>
                                            </div>
                                            <input type="text" name="nama_ayah" id="nama_ayah" value="{{ old('nama_ayah') }}"
                                                class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-300 focus:ring-1 focus:ring-primary-300 focus:ring-opacity-50">
                                        </div>
                                        @error('nama_ayah')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="pendidikan_ayah" class="block text-sm font-medium text-gray-700">Pendidikan Ayah</label>
                                        <div class="mt-1 relative rounded-md shadow-sm">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <i data-lucide="graduation-cap" class="h-5 w-5 text-gray-400"></i>
                                            </div>
                                            <select name="pendidikan_ayah" id="pendidikan_ayah"
                                                class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-300 focus:ring-1 focus:ring-primary-300 focus:ring-opacity-50">
                                                <option value="">Pilih Pendidikan</option>
                                                <option value="SD" {{ old('pendidikan_ayah') == 'SD' ? 'selected' : '' }}>SD</option>
                                                <option value="SMP" {{ old('pendidikan_ayah') == 'SMP' ? 'selected' : '' }}>SMP</option>
                                                <option value="SMA" {{ old('pendidikan_ayah') == 'SMA' ? 'selected' : '' }}>SMA</option>
                                                <option value="D3" {{ old('pendidikan_ayah') == 'D3' ? 'selected' : '' }}>D3</option>
                                                <option value="S1" {{ old('pendidikan_ayah') == 'S1' ? 'selected' : '' }}>S1</option>
                                                <option value="S2" {{ old('pendidikan_ayah') == 'S2' ? 'selected' : '' }}>S2</option>
                                                <option value="S3" {{ old('pendidikan_ayah') == 'S3' ? 'selected' : '' }}>S3</option>
                                            </select>
                                        </div>
                                        @error('pendidikan_ayah')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="pekerjaan_ayah" class="block text-sm font-medium text-gray-700">Pekerjaan Ayah</label>
                                        <div class="mt-1 relative rounded-md shadow-sm">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <i data-lucide="briefcase" class="h-5 w-5 text-gray-400"></i>
                                            </div>
                                            <input type="text" name="pekerjaan_ayah" id="pekerjaan_ayah" value="{{ old('pekerjaan_ayah') }}"
                                                class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-300 focus:ring-1 focus:ring-primary-300 focus:ring-opacity-50">
                                        </div>
                                        @error('pekerjaan_ayah')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Data Ibu -->
                            <div>
                                <h4 class="text-md font-medium text-gray-800 mb-6">Data Ibu</h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                    <div>
                                        <label for="nik_ibu" class="block text-sm font-medium text-gray-700">NIK Ibu</label>
                                        <div class="mt-1 relative rounded-md shadow-sm">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <i data-lucide="credit-card" class="h-5 w-5 text-gray-400"></i>
                                            </div>
                                            <input type="text" name="nik_ibu" id="nik_ibu" value="{{ old('nik_ibu') }}" maxlength="16"
                                                class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-300 focus:ring-1 focus:ring-primary-300 focus:ring-opacity-50">
                                        </div>
                                        @error('nik_ibu')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="nama_ibu" class="block text-sm font-medium text-gray-700">Nama Ibu</label>
                                        <div class="mt-1 relative rounded-md shadow-sm">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <i data-lucide="user" class="h-5 w-5 text-gray-400"></i>
                                            </div>
                                            <input type="text" name="nama_ibu" id="nama_ibu" value="{{ old('nama_ibu') }}"
                                                class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-300 focus:ring-1 focus:ring-primary-300 focus:ring-opacity-50">
                                        </div>
                                        @error('nama_ibu')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="pendidikan_ibu" class="block text-sm font-medium text-gray-700">Pendidikan Ibu</label>
                                        <div class="mt-1 relative rounded-md shadow-sm">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <i data-lucide="graduation-cap" class="h-5 w-5 text-gray-400"></i>
                                            </div>
                                            <select name="pendidikan_ibu" id="pendidikan_ibu"
                                                class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-300 focus:ring-1 focus:ring-primary-300 focus:ring-opacity-50">
                                                <option value="">Pilih Pendidikan</option>
                                                <option value="SD" {{ old('pendidikan_ibu') == 'SD' ? 'selected' : '' }}>SD</option>
                                                <option value="SMP" {{ old('pendidikan_ibu') == 'SMP' ? 'selected' : '' }}>SMP</option>
                                                <option value="SMA" {{ old('pendidikan_ibu') == 'SMA' ? 'selected' : '' }}>SMA</option>
                                                <option value="D3" {{ old('pendidikan_ibu') == 'D3' ? 'selected' : '' }}>D3</option>
                                                <option value="S1" {{ old('pendidikan_ibu') == 'S1' ? 'selected' : '' }}>S1</option>
                                                <option value="S2" {{ old('pendidikan_ibu') == 'S2' ? 'selected' : '' }}>S2</option>
                                                <option value="S3" {{ old('pendidikan_ibu') == 'S3' ? 'selected' : '' }}>S3</option>
                                            </select>
                                        </div>
                                        @error('pendidikan_ibu')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="pekerjaan_ibu" class="block text-sm font-medium text-gray-700">Pekerjaan Ibu</label>
                                        <div class="mt-1 relative rounded-md shadow-sm">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <i data-lucide="briefcase" class="h-5 w-5 text-gray-400"></i>
                                            </div>
                                            <input type="text" name="pekerjaan_ibu" id="pekerjaan_ibu" value="{{ old('pekerjaan_ibu') }}"
                                                class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-300 focus:ring-1 focus:ring-primary-300 focus:ring-opacity-50">
                                        </div>
                                        @error('pekerjaan_ibu')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Data Kontak -->
                        <div class="bg-white rounded-lg border border-gray-200 p-8">
                            <h3 class="text-lg font-medium text-gray-900 mb-6">Data Kontak & Sekolah</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div>
                                    <label for="no_hp" class="block text-sm font-medium text-gray-700">Nomor HP</label>
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i data-lucide="phone" class="h-5 w-5 text-gray-400"></i>
                                        </div>
                                        <input type="text" name="no_hp" id="no_hp" value="{{ old('no_hp') }}" maxlength="15"
                                            class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-300 focus:ring-1 focus:ring-primary-300 focus:ring-opacity-50">
                                    </div>
                                    @error('no_hp')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="asal_sekolah" class="block text-sm font-medium text-gray-700">Asal Sekolah</label>
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i data-lucide="building" class="h-5 w-5 text-gray-400"></i>
                                        </div>
                                        <input type="text" name="asal_sekolah" id="asal_sekolah" value="{{ old('asal_sekolah') }}"
                                            class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-300 focus:ring-1 focus:ring-primary-300 focus:ring-opacity-50">
                                    </div>
                                    @error('asal_sekolah')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="flex justify-end space-x-4 pt-4">
                            <button type="reset"
                                class="inline-flex items-center px-6 py-2.5 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-1 focus:ring-primary-300 focus:ring-opacity-50">
                                <i data-lucide="refresh-ccw" class="w-5 h-5 mr-2"></i>
                                Reset
                            </button>
                            <button type="submit"
                                class="inline-flex items-center px-6 py-2.5 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-1 focus:ring-primary-300 focus:ring-opacity-50">
                                <i data-lucide="save" class="w-5 h-5 mr-2"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
