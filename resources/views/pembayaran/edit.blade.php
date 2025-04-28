@extends('layouts.dashboard')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-10">
                    <div class="mb-10">
                        <h2 class="text-3xl font-extrabold text-gray-900">Edit Pembayaran</h2>
                        <p class="mt-3 text-base text-gray-600">Silakan edit data pembayaran dengan data yang benar</p>
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

                    <form action="{{ route('pembayaran.update', $pembayaran->id) }}" method="POST"
                        enctype="multipart/form-data" class="space-y-4" x-data="formValidation()">
                        @csrf
                        @method('PUT')
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
                                            id="no_register" name="no_register" value="{{ $pembayaran->no_register }}"
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
                                            value="{{ old('tanggal_pembayaran', $pembayaran->tanggal_pembayaran instanceof \Carbon\Carbon ? $pembayaran->tanggal_pembayaran->format('Y-m-d') : $pembayaran->tanggal_pembayaran) }}"
                                            required>
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
                                        <input type="text"
                                            class="pl-20 block w-full rounded-md border border-gray-300 bg-gray-50 shadow-sm focus:border-primary-500 focus:ring-1 focus:ring-primary-500 focus:ring-opacity-50 py-3"
                                            value="Rp {{ number_format($pembayaran->jumlah_pembayaran, 0, ',', '.') }}"
                                            readonly>
                                        <input type="hidden" name="jumlah_pembayaran"
                                            value="{{ $pembayaran->jumlah_pembayaran }}">
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
                                                {{ old('metode_pembayaran', $pembayaran->metode_pembayaran) == 'transfer' ? 'selected' : '' }}>
                                                Transfer Bank</option>
                                            <option value="tunai"
                                                {{ old('metode_pembayaran', $pembayaran->metode_pembayaran) == 'tunai' ? 'selected' : '' }}>
                                                Tunai</option>
                                            <option value="qris"
                                                {{ old('metode_pembayaran', $pembayaran->metode_pembayaran) == 'qris' ? 'selected' : '' }}>
                                                QRIS</option>
                                            <option value="edc"
                                                {{ old('metode_pembayaran', $pembayaran->metode_pembayaran) == 'edc' ? 'selected' : '' }}>
                                                EDC/Kartu Kredit</option>
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
                                        class="block text-sm font-semibold text-gray-700 mb-3">Bukti Pembayaran</label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <i data-lucide="file-text" class="h-5 w-5 text-gray-400"></i>
                                        </div>
                                        <input type="file"
                                            class="pl-12 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100"
                                            id="bukti_pembayaran" name="bukti_pembayaran"
                                            @change="validateField('bukti_pembayaran')" accept=".jpg,.jpeg,.png,.pdf">
                                    </div>
                                    <template x-if="errors.bukti_pembayaran">
                                        <p class="mt-2 text-sm text-red-600" x-text="errors.bukti_pembayaran"></p>
                                    </template>
                                    @error('bukti_pembayaran')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                    <p class="mt-1 text-sm text-gray-500">Format: JPG, PNG, PDF. Maksimal 2MB.</p>
                                    @if ($pembayaran->bukti_pembayaran)
                                        <div class="mt-2">
                                            <button type="button" onclick="openModal()"
                                                class="inline-flex items-center px-4 py-2 bg-primary-50 text-primary-700 rounded-md hover:bg-primary-100 transition-colors duration-200">
                                                <i data-lucide="eye" class="h-5 w-5 mr-2"></i>
                                                Lihat Bukti Pembayaran Saat Ini
                                            </button>
                                        </div>
                                    @endif
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
                                            id="keterangan" name="keterangan" x-model="formData.keterangan" rows="3">{{ old('keterangan', $pembayaran->keterangan) }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 flex space-x-3">
                            <a href="{{ route('pembayaran.show', $pembayaran->id) }}"
                                class="flex-1 px-4 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors duration-200 font-semibold text-center">
                                Kembali
                            </a>
                            <button type="submit"
                                class="flex-1 px-4 py-3 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors duration-200 font-semibold">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Bukti Pembayaran -->
    <div id="buktiPembayaranModal"
        class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-md bg-white">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-900">Bukti Pembayaran</h3>
                <button type="button" onclick="closeModal()" class="text-gray-400 hover:text-gray-500">
                    <i data-lucide="x" class="h-6 w-6"></i>
                </button>
            </div>
            <div class="mt-2">
                @php
                    $fileExtension = pathinfo($pembayaran->bukti_pembayaran, PATHINFO_EXTENSION);
                    $isImage = in_array(strtolower($fileExtension), ['jpg', 'jpeg', 'png']);
                    $isPdf = strtolower($fileExtension) === 'pdf';
                    $filePath = asset('storage/' . str_replace('public/', '', $pembayaran->bukti_pembayaran));
                @endphp

                @if ($isImage)
                    <img src="{{ $filePath }}" alt="Bukti Pembayaran" class="w-full h-auto rounded-lg">
                @elseif($isPdf)
                    <iframe src="{{ $filePath }}" class="w-full h-96 rounded-lg"></iframe>
                @else
                    <div class="p-4 bg-gray-100 rounded-lg text-center">
                        <p class="text-gray-700">File tidak dapat ditampilkan langsung.</p>
                        <a href="{{ $filePath }}" target="_blank"
                            class="mt-2 inline-flex items-center px-4 py-2 bg-primary-500 text-white rounded-md hover:bg-primary-600 transition-colors duration-200">
                            <i data-lucide="download" class="h-5 w-5 mr-2"></i>
                            Download File
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('buktiPembayaranModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            document.getElementById('buktiPembayaranModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking outside
        document.getElementById('buktiPembayaranModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModal();
            }
        });
    </script>

    <!-- Flatpickr -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr("#tanggal_pembayaran", {
                dateFormat: "Y-m-d",
                defaultDate: "{{ old('tanggal_pembayaran', $pembayaran->tanggal_pembayaran instanceof \Carbon\Carbon ? $pembayaran->tanggal_pembayaran->format('Y-m-d') : $pembayaran->tanggal_pembayaran) }}",
                locale: "id",
                allowInput: true
            });
        });
    </script>

    <script>
        function formValidation() {
            return {
                formData: {
                    tanggal_pembayaran: "{{ old('tanggal_pembayaran', $pembayaran->tanggal_pembayaran instanceof \Carbon\Carbon ? $pembayaran->tanggal_pembayaran->format('Y-m-d') : $pembayaran->tanggal_pembayaran) }}",
                    metode_pembayaran: "{{ old('metode_pembayaran', $pembayaran->metode_pembayaran) }}",
                    bukti_pembayaran: null,
                    keterangan: "{{ old('keterangan', $pembayaran->keterangan) }}"
                },
                errors: {},
                validateField(field) {
                    this.errors[field] = '';
                    switch (field) {
                        case 'tanggal_pembayaran':
                            if (!this.formData.tanggal_pembayaran) {
                                this.errors.tanggal_pembayaran = 'Tanggal pembayaran harus diisi';
                            }
                            break;
                        case 'metode_pembayaran':
                            if (!this.formData.metode_pembayaran) {
                                this.errors.metode_pembayaran = 'Metode pembayaran harus dipilih';
                            }
                            break;
                        case 'bukti_pembayaran':
                            const fileInput = document.getElementById('bukti_pembayaran');
                            if (fileInput.files.length > 0) {
                                const file = fileInput.files[0];
                                const validTypes = ['image/jpeg', 'image/png', 'application/pdf'];
                                const maxSize = 2 * 1024 * 1024; // 2MB

                                if (!validTypes.includes(file.type)) {
                                    this.errors.bukti_pembayaran = 'Format file harus JPG, PNG, atau PDF';
                                } else if (file.size > maxSize) {
                                    this.errors.bukti_pembayaran = 'Ukuran file maksimal 2MB';
                                }
                            }
                            break;
                    }
                },
                validate() {
                    this.validateField('tanggal_pembayaran');
                    this.validateField('metode_pembayaran');
                    this.validateField('bukti_pembayaran');
                    return Object.keys(this.errors).length === 0;
                }
            }
        }
    </script>
@endsection
