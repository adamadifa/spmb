<x-dashboard-layout>
    <x-slot name="header">
        Dashboard
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        <!-- Statistik Card 1 -->
        <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-primary-dark">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-primary-light/10 text-primary-dark">
                    <i class="fas fa-user-graduate text-2xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Total Pendaftar</p>
                    <p class="text-2xl font-semibold text-gray-800">1,234</p>
                </div>
            </div>
            <div class="mt-4">
                <span class="text-xs text-green-500 font-medium">
                    <i class="fas fa-arrow-up"></i> 12% dari bulan lalu
                </span>
            </div>
        </div>

        <!-- Statistik Card 2 -->
        <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-blue-500">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-blue-100 text-blue-500">
                    <i class="fas fa-file-alt text-2xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Berkas Lengkap</p>
                    <p class="text-2xl font-semibold text-gray-800">987</p>
                </div>
            </div>
            <div class="mt-4">
                <span class="text-xs text-green-500 font-medium">
                    <i class="fas fa-arrow-up"></i> 8% dari bulan lalu
                </span>
            </div>
        </div>

        <!-- Statistik Card 3 -->
        <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-yellow-500">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-yellow-100 text-yellow-500">
                    <i class="fas fa-clock text-2xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Menunggu Verifikasi</p>
                    <p class="text-2xl font-semibold text-gray-800">156</p>
                </div>
            </div>
            <div class="mt-4">
                <span class="text-xs text-red-500 font-medium">
                    <i class="fas fa-arrow-down"></i> 3% dari bulan lalu
                </span>
            </div>
        </div>

        <!-- Statistik Card 4 -->
        <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-green-500">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-green-100 text-green-500">
                    <i class="fas fa-check-circle text-2xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Terverifikasi</p>
                    <p class="text-2xl font-semibold text-gray-800">789</p>
                </div>
            </div>
            <div class="mt-4">
                <span class="text-xs text-green-500 font-medium">
                    <i class="fas fa-arrow-up"></i> 15% dari bulan lalu
                </span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Grafik Pendaftaran -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Grafik Pendaftaran</h3>
                <div class="flex space-x-2">
                    <button
                        class="px-3 py-1 text-xs font-medium text-gray-600 bg-gray-100 rounded-md hover:bg-gray-200">Minggu</button>
                    <button class="px-3 py-1 text-xs font-medium text-white bg-primary-dark rounded-md">Bulan</button>
                    <button
                        class="px-3 py-1 text-xs font-medium text-gray-600 bg-gray-100 rounded-md hover:bg-gray-200">Tahun</button>
                </div>
            </div>
            <div class="h-80 bg-gray-50 rounded-lg flex items-center justify-center">
                <p class="text-gray-500">Grafik akan ditampilkan di sini</p>
            </div>
        </div>

        <!-- Aktivitas Terbaru -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Aktivitas Terbaru</h3>
                <a href="#" class="text-sm text-primary-dark hover:text-primary-light">Lihat Semua</a>
            </div>
            <div class="space-y-4">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <div
                            class="w-8 h-8 rounded-full bg-primary-light/10 text-primary-dark flex items-center justify-center">
                            <i class="fas fa-user-plus"></i>
                        </div>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-800">Ahmad Fadillah mendaftar</p>
                        <p class="text-xs text-gray-500">2 jam yang lalu</p>
                    </div>
                </div>

                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-500 flex items-center justify-center">
                            <i class="fas fa-file-upload"></i>
                        </div>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-800">Siti Nurhaliza mengunggah berkas</p>
                        <p class="text-xs text-gray-500">4 jam yang lalu</p>
                    </div>
                </div>

                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 rounded-full bg-green-100 text-green-500 flex items-center justify-center">
                            <i class="fas fa-check"></i>
                        </div>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-800">Berkas Rudi Hartono diverifikasi</p>
                        <p class="text-xs text-gray-500">5 jam yang lalu</p>
                    </div>
                </div>

                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <div
                            class="w-8 h-8 rounded-full bg-yellow-100 text-yellow-500 flex items-center justify-center">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-800">Berkas Dewi Sartika perlu revisi</p>
                        <p class="text-xs text-gray-500">1 hari yang lalu</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Pendaftar Terbaru -->
    <div class="mt-6 bg-white rounded-lg shadow-sm p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-800">Pendaftar Terbaru</h3>
            <a href="#" class="text-sm text-primary-dark hover:text-primary-light">Lihat Semua</a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No.
                            Register</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Program Studi</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Tanggal Daftar</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">OL12345</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Ahmad Fadillah</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Teknik Informatika</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Menunggu</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">12 Juni 2023</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="#" class="text-primary-dark hover:text-primary-light mr-3">Detail</a>
                            <a href="#" class="text-red-600 hover:text-red-900">Hapus</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">OL12344</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Siti Nurhaliza</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Manajemen</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Lengkap</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">11 Juni 2023</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="#" class="text-primary-dark hover:text-primary-light mr-3">Detail</a>
                            <a href="#" class="text-red-600 hover:text-red-900">Hapus</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">OL12343</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Rudi Hartono</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Akuntansi</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Diterima</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">10 Juni 2023</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="#" class="text-primary-dark hover:text-primary-light mr-3">Detail</a>
                            <a href="#" class="text-red-600 hover:text-red-900">Hapus</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">OL12342</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Dewi Sartika</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Psikologi</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Revisi</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">9 Juni 2023</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="#" class="text-primary-dark hover:text-primary-light mr-3">Detail</a>
                            <a href="#" class="text-red-600 hover:text-red-900">Hapus</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-dashboard-layout>
