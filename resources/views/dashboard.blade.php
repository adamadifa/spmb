@extends('layouts.dashboard')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Greeting Section -->
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-800">
                    {{ $greeting }}, {{ $pendaftar->nama_lengkap ?? 'Pendaftar' }}! 👋
                </h2>
                <p class="text-gray-600 mt-1">Selamat datang kembali di dashboard pendaftaran</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Profile Grid -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Profil Pendaftar</h2>
                        <div class="space-y-6">
                            <!-- Profile Header -->
                            <div class="flex items-center space-x-4">
                                <div class="h-20 w-20 rounded-full bg-gray-200 flex items-center justify-center">
                                    <i data-lucide="user" class="h-10 w-10 text-gray-400"></i>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900">
                                        {{ $pendaftar->nama_lengkap ?? 'Nama Pendaftar' }}</h3>
                                    <p class="text-sm text-gray-500">{{ $pendaftar->email ?? 'email@example.com' }}</p>
                                </div>
                            </div>

                            <!-- Profile Details -->
                            <div class="border-t border-gray-200 pt-6">
                                <dl class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">No. Registrasi</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $pendaftar->no_register ?? '-' }}</dd>
                                    </div>
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Alamat</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $pendaftar->alamat ?? 'Belum diisi' }}
                                        </dd>
                                    </div>
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Nama Ayah</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $pendaftar->nama_ayah ?? 'Belum diisi' }}
                                        </dd>
                                    </div>
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Nama Ibu</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $pendaftar->nama_ibu ?? 'Belum diisi' }}
                                        </dd>
                                    </div>
                                    <div class="sm:col-span-2">
                                        <dt class="text-sm font-medium text-gray-500">Unit</dt>
                                        <dd class="mt-1 text-sm text-gray-900">
                                            {{ $pendaftar->nama_unit ?? 'Belum dipilih' }}</dd>
                                    </div>

                                    <div class="sm:col-span-2">
                                        <dt class="text-sm font-medium text-gray-500">Asal Sekolah</dt>
                                        <dd class="mt-1 text-sm text-gray-900">
                                            {{ $pendaftar->asal_sekolah }}</dd>
                                    </div>
                                    <div class="sm:col-span-2">
                                        <dt class="text-sm font-medium text-gray-500">No. HP</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $pendaftar->no_hp ?? 'Belum diisi' }}
                                        </dd>
                                    </div>
                                </dl>
                            </div>

                            <!-- Action Buttons -->
                            <div class="border-t border-gray-200 pt-6">
                                <div class="flex flex-col space-y-3">
                                    <a href="{{ route('pendaftar.create') }}"
                                        class="inline-flex items-center justify-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                                        <i data-lucide="file-text" class="h-4 w-4 mr-2"></i>
                                        Lengkapi Formulir
                                    </a>
                                    <a href="{{ route('pembayaran.index') }}"
                                        class="inline-flex items-center justify-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                                        <i data-lucide="credit-card" class="h-4 w-4 mr-2"></i>
                                        Konfirmasi Pembayaran
                                    </a>
                                    <a href="#"
                                        class="inline-flex items-center justify-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500"
                                        x-data @click="$dispatch('open-modal', 'preview-formulir')">
                                        <i data-lucide="printer" class="h-4 w-4 mr-2"></i>
                                        Cetak Formulir
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Timeline Grid -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Timeline Pendaftaran</h2>
                        <div class="relative">
                            <!-- Timeline Line -->
                            <div class="absolute left-4 top-0 h-full w-0.5 bg-gray-200"></div>

                            <!-- Timeline Items -->
                            <div class="space-y-8">
                                @foreach ($registrationStatus as $key => $item)
                                    <div class="relative flex items-center">
                                        <div
                                            class="absolute left-4 -translate-x-1/2 w-4 h-4 rounded-full 
                                            @if ($item['status'] === 'selesai') bg-primary-500
                                            @elseif($item['status'] === 'dalam_proses') bg-yellow-500
                                            @else bg-gray-300 @endif ring-4 ring-white">
                                        </div>
                                        <div class="ml-12">
                                            <div class="flex items-center">
                                                <h4 class="text-base font-semibold text-gray-800">
                                                    {{ ucfirst(str_replace('_', ' ', $key)) }}
                                                </h4>
                                                <span
                                                    class="ml-2 px-2 py-1 text-xs font-medium rounded-full
                                                    @if ($item['status'] === 'selesai') text-green-800 bg-green-100
                                                    @elseif($item['status'] === 'dalam_proses') text-yellow-800 bg-yellow-100
                                                    @else text-gray-800 bg-gray-100 @endif">
                                                    @if ($item['status'] === 'selesai')
                                                        Selesai
                                                    @elseif($item['status'] === 'dalam_proses')
                                                        Dalam Proses
                                                    @else
                                                        Menunggu
                                                    @endif
                                                </span>
                                            </div>
                                            <p class="mt-1 text-sm text-gray-500">{{ $item['message'] }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Preview Formulir -->
    <div x-data="{ show: false }" x-show="show"
        x-on:open-modal.window="if ($event.detail === 'preview-formulir') show = true"
        x-on:close-modal.window="show = false" x-on:keydown.escape.window="show = false"
        class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div x-show="show" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div x-show="show" x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                            <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4 text-center">
                                FORMULIR PENDAFTARAN ONLINE
                            </h3>
                            <div class="mt-2 space-y-4">
                                <!-- Data Pribadi -->
                                <div class="border-b border-gray-200 pb-4">
                                    <h4 class="font-medium text-gray-700 mb-4">A. DATA PRIBADI</h4>
                                    <div class="grid grid-cols-12 gap-2 text-sm">
                                        <div class="col-span-3 font-medium">Nama Lengkap</div>
                                        <div class="col-span-9">: {{ $pendaftar->nama_lengkap }}</div>

                                        <div class="col-span-3 font-medium">NISN</div>
                                        <div class="col-span-9">: {{ $pendaftar->nisn }}</div>

                                        <div class="col-span-3 font-medium">Jenis Kelamin</div>
                                        <div class="col-span-9">:
                                            {{ $pendaftar->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</div>

                                        <div class="col-span-3 font-medium">Tempat, Tgl Lahir</div>
                                        <div class="col-span-9">: {{ $pendaftar->tempat_lahir }},
                                            {{ $pendaftar->tanggal_lahir }}</div>

                                        <div class="col-span-3 font-medium">Anak Ke</div>
                                        <div class="col-span-9">: {{ $pendaftar->anak_ke }}</div>

                                        <div class="col-span-3 font-medium">Jumlah Saudara</div>
                                        <div class="col-span-9">: {{ $pendaftar->jumlah_saudara }}</div>
                                    </div>
                                </div>

                                <!-- Data Orang Tua -->
                                <div class="border-b border-gray-200 pb-4">
                                    <h4 class="font-medium text-gray-700 mb-4">B. DATA ORANG TUA</h4>
                                    <div class="grid grid-cols-12 gap-2 text-sm">
                                        <div class="col-span-12 font-medium mb-2">Data Ayah:</div>
                                        <div class="col-span-3 font-medium">Nama Ayah</div>
                                        <div class="col-span-9">: {{ $pendaftar->nama_ayah }}</div>

                                        <div class="col-span-3 font-medium">NIK Ayah</div>
                                        <div class="col-span-9">: {{ $pendaftar->nik_ayah }}</div>

                                        <div class="col-span-3 font-medium">Pendidikan</div>
                                        <div class="col-span-9">: {{ $pendaftar->pendidikan_ayah }}</div>

                                        <div class="col-span-3 font-medium">Pekerjaan</div>
                                        <div class="col-span-9">: {{ $pendaftar->pekerjaan_ayah }}</div>

                                        <div class="col-span-12 font-medium mb-2 mt-4">Data Ibu:</div>
                                        <div class="col-span-3 font-medium">Nama Ibu</div>
                                        <div class="col-span-9">: {{ $pendaftar->nama_ibu }}</div>

                                        <div class="col-span-3 font-medium">NIK Ibu</div>
                                        <div class="col-span-9">: {{ $pendaftar->nik_ibu }}</div>

                                        <div class="col-span-3 font-medium">Pendidikan</div>
                                        <div class="col-span-9">: {{ $pendaftar->pendidikan_ibu }}</div>

                                        <div class="col-span-3 font-medium">Pekerjaan</div>
                                        <div class="col-span-9">: {{ $pendaftar->pekerjaan_ibu }}</div>
                                    </div>
                                </div>

                                <!-- Data Alamat & Kontak -->
                                <div class="border-b border-gray-200 pb-4">
                                    <h4 class="font-medium text-gray-700 mb-4">C. DATA ALAMAT & KONTAK</h4>
                                    <div class="grid grid-cols-12 gap-2 text-sm">
                                        <div class="col-span-3 font-medium">Alamat</div>
                                        <div class="col-span-9">: {{ $pendaftar->alamat }}</div>

                                        <div class="col-span-3 font-medium">Kode Pos</div>
                                        <div class="col-span-9">: {{ $pendaftar->kode_pos }}</div>

                                        <div class="col-span-3 font-medium">No. HP</div>
                                        <div class="col-span-9">: {{ $pendaftar->no_hp }}</div>
                                    </div>
                                </div>

                                <!-- Data Akademik -->
                                <div class="border-b border-gray-200 pb-4">
                                    <h4 class="font-medium text-gray-700 mb-4">D. DATA AKADEMIK</h4>
                                    <div class="grid grid-cols-12 gap-2 text-sm">
                                        <div class="col-span-3 font-medium">Asal Sekolah</div>
                                        <div class="col-span-9">: {{ $pendaftar->asal_sekolah }}</div>

                                        <div class="col-span-3 font-medium">Unit</div>
                                        <div class="col-span-9">: {{ $pendaftar->nama_unit }}</div>

                                        <div class="col-span-3 font-medium">Jalur Pendaftaran</div>
                                        <div class="col-span-9">: {{ $pendaftar->jalur_pendaftaran }}</div>

                                        <div class="col-span-3 font-medium">No. Registrasi</div>
                                        <div class="col-span-9">: {{ $pendaftar->no_register }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <a href="{{ route('pendaftar.cetak-pdf', $pendaftar->no_register) }}"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-primary-600 text-base font-medium text-white hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Cetak PDF
                    </a>
                    <button type="button"
                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                        x-on:click="show = false">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
