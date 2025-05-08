@extends('layouts.dashboard')

@section('content')
    <div class="py-6 sm:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 sm:p-10">
                    <div class="mb-6 sm:mb-10 flex justify-between items-center">
                        <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900">Detail Pembayaran</h2>
                        <div class="flex space-x-2 sm:space-x-3">
                            @if ($pembayaran->status == 'pending')
                                <a href="{{ route('pembayaran.edit', $pembayaran->id) }}"
                                    class="inline-flex items-center px-3 sm:px-4 py-2 bg-primary-600 text-white rounded-md hover:bg-primary-700 transition-colors duration-200">
                                    <i data-lucide="edit" class="h-5 w-5"></i>
                                    <span class="ml-2 hidden sm:inline">Edit Pembayaran</span>
                                </a>
                            @endif
                            <a href="{{ route('pembayaran.index') }}"
                                class="inline-flex items-center px-3 sm:px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 transition-colors duration-200">
                                <i data-lucide="arrow-left" class="h-5 w-5"></i>
                                <span class="ml-2 hidden sm:inline">Kembali</span>
                            </a>
                        </div>
                    </div>

                    @if (session('success'))
                        <div class="mb-4 sm:mb-6 p-3 sm:p-4 bg-green-100 text-green-700 rounded-lg text-sm sm:text-base">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="mb-4 sm:mb-6 p-3 sm:p-4 bg-red-100 text-red-700 rounded-lg text-sm sm:text-base">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="bg-white rounded-lg border border-gray-300 p-4 sm:p-10 shadow-sm">
                        <!-- Header Invoice -->
                        <div
                            class="flex flex-col sm:flex-row sm:justify-between sm:items-start mb-6 sm:mb-10 pb-6 sm:pb-10 border-b border-gray-200">
                            <div class="mb-4 sm:mb-0">
                                <h3 class="text-xl sm:text-2xl font-bold text-gray-900">INVOICE PEMBAYARAN</h3>
                                <p class="text-sm sm:text-base text-gray-600 mt-1">No. Register:
                                    {{ $pembayaran->no_register }}</p>
                            </div>
                            <div class="text-left sm:text-right">
                                <p class="text-sm sm:text-base text-gray-600">Tanggal:
                                    {{ \Carbon\Carbon::parse($pembayaran->tanggal_pembayaran)->format('d/m/Y') }}</p>
                                <p class="text-sm sm:text-base text-gray-600">Status:
                                    @if ($pembayaran->status == 'pending')
                                        <span
                                            class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                            Pending
                                        </span>
                                    @elseif ($pembayaran->status == 'approved')
                                        <span
                                            class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            Disetujui
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                            Ditolak
                                        </span>
                                    @endif
                                </p>
                            </div>
                        </div>

                        <!-- Detail Pembayaran -->
                        <div class="mb-6 sm:mb-10">
                            <h4 class="text-base sm:text-lg font-semibold text-gray-900 mb-3 sm:mb-4">Detail Pembayaran</h4>
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="py-3 pl-3 pr-2 sm:pl-6 sm:pr-3 text-left text-xs sm:text-sm font-semibold text-gray-900">
                                                Item</th>
                                            <th scope="col"
                                                class="px-2 sm:px-3 py-3 text-left text-xs sm:text-sm font-semibold text-gray-900">
                                                Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                        <tr>
                                            <td
                                                class="whitespace-nowrap py-3 pl-3 pr-2 sm:pl-6 sm:pr-3 text-xs sm:text-sm font-medium text-gray-900">
                                                Jumlah Pembayaran</td>
                                            <td
                                                class="whitespace-nowrap px-2 sm:px-3 py-3 text-xs sm:text-sm text-gray-500">
                                                Rp
                                                {{ number_format($pembayaran->jumlah_pembayaran, 0, ',', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="whitespace-nowrap py-3 pl-3 pr-2 sm:pl-6 sm:pr-3 text-xs sm:text-sm font-medium text-gray-900">
                                                Metode Pembayaran</td>
                                            <td
                                                class="whitespace-nowrap px-2 sm:px-3 py-3 text-xs sm:text-sm text-gray-500">
                                                {{ ucfirst($pembayaran->metode_pembayaran) }}</td>
                                        </tr>
                                        @if ($pembayaran->keterangan)
                                            <tr>
                                                <td
                                                    class="whitespace-nowrap py-3 pl-3 pr-2 sm:pl-6 sm:pr-3 text-xs sm:text-sm font-medium text-gray-900">
                                                    Keterangan</td>
                                                <td
                                                    class="whitespace-nowrap px-2 sm:px-3 py-3 text-xs sm:text-sm text-gray-500">
                                                    {{ $pembayaran->keterangan }}</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Bukti Pembayaran -->
                        <div class="mb-6 sm:mb-10">
                            <h4 class="text-base sm:text-lg font-semibold text-gray-900 mb-3 sm:mb-4">Bukti Pembayaran</h4>
                            @if ($pembayaran->bukti_pembayaran)
                                <div class="mt-2">
                                    <button type="button" onclick="openModal()"
                                        class="inline-flex items-center px-3 sm:px-4 py-2 bg-primary-600 text-white rounded-md hover:bg-primary-700 transition-colors duration-200 text-sm sm:text-base">
                                        <i data-lucide="file-text" class="h-5 w-5"></i>
                                        <span class="ml-2">Lihat Bukti Pembayaran</span>
                                    </button>
                                </div>
                            @else
                                <p class="text-sm sm:text-base text-gray-500">Tidak ada bukti pembayaran</p>
                            @endif
                        </div>

                        <!-- Tombol Aksi untuk Admin -->
                        @if ($pembayaran->status == 'pending' && Auth::user()->role === 'admin')
                            <div class="mt-6 sm:mt-10 pt-4 sm:pt-6 border-t border-gray-200">
                                <h4 class="text-base sm:text-lg font-semibold text-gray-900 mb-3 sm:mb-4">Aksi Admin</h4>
                                <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-4">
                                    <form action="{{ route('pembayaran.approve', $pembayaran->id) }}" method="POST"
                                        class="w-full sm:w-auto">
                                        @csrf
                                        <button type="submit"
                                            class="w-full sm:w-auto inline-flex items-center justify-center px-3 sm:px-4 py-2 bg-primary-600 text-white rounded-md hover:bg-primary-700 transition-colors duration-200 text-sm sm:text-base"
                                            onclick="return confirm('Apakah Anda yakin ingin menyetujui pembayaran ini?')">
                                            <i data-lucide="check-circle" class="h-5 w-5"></i>
                                            <span class="ml-2">Setujui Pembayaran</span>
                                        </button>
                                    </form>

                                    <form action="{{ route('pembayaran.reject', $pembayaran->id) }}" method="POST"
                                        class="w-full sm:w-auto">
                                        @csrf
                                        <button type="submit"
                                            class="w-full sm:w-auto inline-flex items-center justify-center px-3 sm:px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition-colors duration-200 text-sm sm:text-base"
                                            onclick="return confirm('Apakah Anda yakin ingin menolak pembayaran ini?')">
                                            <i data-lucide="x-circle" class="h-5 w-5"></i>
                                            <span class="ml-2">Tolak Pembayaran</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Bukti Pembayaran -->
    <div id="buktiPembayaranModal"
        class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div
            class="relative top-10 sm:top-20 mx-auto p-4 sm:p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-md bg-white">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-base sm:text-lg font-semibold text-gray-900">Bukti Pembayaran</h3>
                <button type="button" onclick="closeModal()" class="text-gray-400 hover:text-gray-500">
                    <i data-lucide="x" class="h-5 w-5 sm:h-6 sm:w-6"></i>
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
                    <iframe src="{{ $filePath }}" class="w-full h-64 sm:h-96 rounded-lg"></iframe>
                @else
                    <div class="p-3 sm:p-4 bg-gray-100 rounded-lg text-center">
                        <p class="text-sm sm:text-base text-gray-700">File tidak dapat ditampilkan langsung.</p>
                        <a href="{{ $filePath }}" target="_blank"
                            class="mt-2 inline-flex items-center px-3 sm:px-4 py-2 bg-primary-600 text-white rounded-md hover:bg-primary-700 transition-colors duration-200 text-sm sm:text-base">
                            <i data-lucide="download" class="h-5 w-5"></i>
                            <span class="ml-2">Download File</span>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('buktiPembayaranModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden'; // Prevent scrolling when modal is open
        }

        function closeModal() {
            document.getElementById('buktiPembayaranModal').classList.add('hidden');
            document.body.style.overflow = 'auto'; // Re-enable scrolling when modal is closed
        }

        // Close modal when clicking outside of it
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
@endsection
