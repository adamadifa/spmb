@extends('layouts.dashboard')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-10">
                    <div class="mb-10">
                        <h2 class="text-3xl font-extrabold text-gray-900">Form Pembayaran</h2>
                        <p class="mt-3 text-base text-gray-600">Silakan isi form pembayaran dengan data yang benar</p>
                    </div>

                    @if ($errors->any())
                        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('pembayaran.store') }}" method="POST" enctype="multipart/form-data"
                        class="space-y-4" x-data="formValidation()" @submit.prevent="validate() && $el.submit()">
                        @csrf
                        <div class="bg-white rounded-lg border border-gray-300 p-10 shadow-sm">
                            <h3 class="text-xl font-semibold text-gray-900 mb-10 border-b border-gray-200 pb-4">Data
                                Pembayaran</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="no_register" class="block text-sm font-semibold text-gray-700 mb-3">No.
                                        Register</label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <i data-lucide="hash" class="h-5 w-5 text-gray-400"></i>
                                        </div>
                                        <input type="text"
                                            class="pl-12 block w-full rounded-md border border-gray-300 bg-gray-50 shadow-sm focus:border-primary-500 focus:ring-1 focus:ring-primary-500 focus:ring-opacity-50 py-3"
                                            id="no_register" name="no_register" value="{{ Auth::user()->no_register }}"
                                            disabled>
                                    </div>
                                </div>

                                <div>
                                    <label for="tanggal_pembayaran"
                                        class="block text-sm font-semibold text-gray-700 mb-3">Tanggal Pembayaran <span
                                            class="text-red-500">*</span></label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <i data-lucide="calendar" class="h-5 w-5 text-gray-400"></i>
                                        </div>
                                        <input type="text"
                                            class="pl-12 block w-full rounded-md border border-gray-300 shadow-sm focus:border-primary-500 focus:ring-1 focus:ring-primary-500 focus:ring-opacity-50 py-3"
                                            id="tanggal_pembayaran" name="tanggal_pembayaran"
                                            x-model="formData.tanggal_pembayaran"
                                            @input="validateField('tanggal_pembayaran')"
                                            :class="{
                                                'border-red-600': errors.tanggal_pembayaran,
                                                'border-green-500': !errors.tanggal_pembayaran && formData
                                                    .tanggal_pembayaran
                                            }"
                                            value="{{ old('tanggal_pembayaran', date('Y-m-d')) }}" required>
                                    </div>
                                    <template x-if="errors.tanggal_pembayaran">
                                        <p class="mt-2 text-sm text-red-600" x-text="errors.tanggal_pembayaran"></p>
                                    </template>
                                    @error('tanggal_pembayaran')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="jumlah_pembayaran"
                                        class="block text-sm font-semibold text-gray-700 mb-3">Jumlah Pembayaran <span
                                            class="text-red-500">*</span></label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <i data-lucide="credit-card" class="h-5 w-5 text-gray-400"></i>
                                        </div>
                                        <div class="absolute inset-y-0 left-12 pl-3 flex items-center pointer-events-none">
                                            <span class="text-gray-500 sm:text-sm">Rp</span>
                                        </div>
                                        <input type="number"
                                            class="pl-20 block w-full rounded-md border border-gray-300 bg-gray-50 shadow-sm focus:border-primary-500 focus:ring-1 focus:ring-primary-500 focus:ring-opacity-50 py-3"
                                            id="jumlah_pembayaran" name="jumlah_pembayaran"
                                            x-model="formData.jumlah_pembayaran"
                                            value="{{ old('jumlah_pembayaran', 300000) }}" readonly required>
                                    </div>
                                </div>

                                <div>
                                    <label for="metode_pembayaran"
                                        class="block text-sm font-semibold text-gray-700 mb-3">Metode Pembayaran <span
                                            class="text-red-500">*</span></label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <i data-lucide="wallet" class="h-5 w-5 text-gray-400"></i>
                                        </div>
                                        <select
                                            class="pl-12 block w-full rounded-md border border-gray-300 shadow-sm focus:border-primary-500 focus:ring-1 focus:ring-primary-500 focus:ring-opacity-50 py-3"
                                            id="metode_pembayaran" name="metode_pembayaran"
                                            x-model="formData.metode_pembayaran"
                                            @change="validateField('metode_pembayaran')"
                                            :class="{
                                                'border-red-600': errors.metode_pembayaran,
                                                'border-green-500': !errors.metode_pembayaran && formData
                                                    .metode_pembayaran
                                            }"
                                            required>
                                            <option value="">Pilih metode pembayaran</option>
                                            <option value="transfer"
                                                {{ old('metode_pembayaran') == 'transfer' ? 'selected' : '' }}>Transfer Bank
                                            </option>
                                            <option value="tunai"
                                                {{ old('metode_pembayaran') == 'tunai' ? 'selected' : '' }}>Tunai</option>
                                            <option value="qris"
                                                {{ old('metode_pembayaran') == 'qris' ? 'selected' : '' }}>QRIS</option>
                                            <option value="edc"
                                                {{ old('metode_pembayaran') == 'edc' ? 'selected' : '' }}>EDC/Kartu Kredit
                                            </option>
                                        </select>
                                    </div>
                                    <template x-if="errors.metode_pembayaran">
                                        <p class="mt-2 text-sm text-red-600" x-text="errors.metode_pembayaran"></p>
                                    </template>
                                    @error('metode_pembayaran')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="bukti_pembayaran"
                                        class="block text-sm font-semibold text-gray-700 mb-3">Bukti Pembayaran <span
                                            class="text-red-500">*</span></label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <i data-lucide="file-text" class="h-5 w-5 text-gray-400"></i>
                                        </div>
                                        <input type="file"
                                            class="pl-12 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100"
                                            id="bukti_pembayaran" name="bukti_pembayaran"
                                            @change="validateField('bukti_pembayaran')" accept=".jpg,.jpeg,.png,.pdf"
                                            required>
                                    </div>
                                    <template x-if="errors.bukti_pembayaran">
                                        <p class="mt-2 text-sm text-red-600" x-text="errors.bukti_pembayaran"></p>
                                    </template>
                                    @error('bukti_pembayaran')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                    <p class="mt-1 text-sm text-gray-500">Format: JPG, PNG, PDF. Maksimal 2MB.</p>
                                </div>

                                <div>
                                    <label for="keterangan"
                                        class="block text-sm font-semibold text-gray-700 mb-3">Keterangan</label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div class="absolute top-3 left-0 pl-4 flex items-center pointer-events-none">
                                            <i data-lucide="message-square" class="h-5 w-5 text-gray-400"></i>
                                        </div>
                                        <textarea
                                            class="pl-12 block w-full rounded-md border border-gray-300 shadow-sm focus:border-primary-500 focus:ring-1 focus:ring-primary-500 focus:ring-opacity-50"
                                            id="keterangan" name="keterangan" x-model="formData.keterangan" rows="3">{{ old('keterangan') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6">
                            <button type="submit"
                                class="w-full px-4 py-3 bg-primary-500 text-white rounded-lg hover:bg-primary-600 transition-colors duration-200 font-semibold">
                                Simpan Pembayaran
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr("#tanggal_pembayaran", {
                dateFormat: "Y-m-d",
                defaultDate: "{{ old('tanggal_pembayaran', date('Y-m-d')) }}",
                locale: "id",
                allowInput: true
            });
        });
    </script>

    <script>
        function formValidation() {
            return {
                formData: {
                    tanggal_pembayaran: "{{ old('tanggal_pembayaran', date('Y-m-d')) }}",
                    jumlah_pembayaran: "{{ old('jumlah_pembayaran', 300000) }}",
                    metode_pembayaran: "{{ old('metode_pembayaran', '') }}",
                    bukti_pembayaran: null,
                    keterangan: "{{ old('keterangan', '') }}"
                },
                errors: {
                    tanggal_pembayaran: '',
                    metode_pembayaran: '',
                    bukti_pembayaran: ''
                },
                validateField(field) {
                    this.errors[field] = '';

                    switch (field) {
                        case 'tanggal_pembayaran':
                            if (!this.formData.tanggal_pembayaran) {
                                this.errors.tanggal_pembayaran = 'Tanggal pembayaran wajib diisi';
                            }
                            break;
                        case 'metode_pembayaran':
                            if (!this.formData.metode_pembayaran) {
                                this.errors.metode_pembayaran = 'Metode pembayaran wajib dipilih';
                            }
                            break;
                        case 'bukti_pembayaran':
                            const fileInput = document.getElementById('bukti_pembayaran');
                            if (!fileInput.files.length) {
                                this.errors.bukti_pembayaran = 'Bukti pembayaran wajib diunggah';
                            } else {
                                const file = fileInput.files[0];
                                const fileSize = file.size / 1024 / 1024; // Convert to MB
                                const allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];

                                if (!allowedTypes.includes(file.type)) {
                                    this.errors.bukti_pembayaran = 'Format file harus JPG, PNG, atau PDF';
                                } else if (fileSize > 2) {
                                    this.errors.bukti_pembayaran = 'Ukuran file maksimal 2MB';
                                }
                            }
                            break;
                    }
                },
                validate() {
                    // Validasi semua field
                    this.validateField('tanggal_pembayaran');
                    this.validateField('metode_pembayaran');
                    this.validateField('bukti_pembayaran');

                    // Cek apakah ada error
                    return Object.values(this.errors).every(error => !error);
                },
                init() {
                    // Jalankan validasi awal untuk semua field
                    this.validateField('tanggal_pembayaran');
                    this.validateField('metode_pembayaran');
                    this.validateField('bukti_pembayaran');
                }
            }
        }
    </script>
@endsection
