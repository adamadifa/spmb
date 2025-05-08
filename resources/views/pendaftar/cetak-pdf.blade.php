<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran - {{ $pendaftar->no_register }}</title>
    <style>
        @page {
            margin: 2cm;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header img {
            width: 100px;
            height: 100px;
            object-fit: contain;
        }

        .header h1 {
            font-size: 20px;
            font-weight: bold;
            margin: 10px 0 5px;
        }

        .header h2 {
            font-size: 18px;
            font-weight: 600;
            margin: 0 0 5px;
        }

        .header p {
            font-size: 16px;
            margin: 0;
        }

        .section {
            margin-bottom: 20px;
        }

        .section-title {
            font-weight: bold;
            margin-bottom: 10px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
        }

        .data-grid {
            display: grid;
            grid-template-columns: 150px 1fr;
            gap: 5px;
            font-size: 12px;
        }

        .label {
            font-weight: 500;
        }

        .value {
            font-weight: normal;
        }

        .footer {
            margin-top: 50px;
            text-align: right;
        }

        .signature {
            margin-top: 50px;
        }

        .signature-line {
            width: 200px;
            border-top: 1px solid #000;
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <!-- Form Header -->
    <div class="header">
        <div style="display: flex; flex-direction: column; align-items: center; gap: 15px;">
            <div style="width: 100px; height: 100px;">
                <img src="{{ storage_path('app/public/assets/image/logo.png') }}" alt="Logo"
                    style="width: 100%; height: 100%; object-fit: contain;">
            </div>
            <div style="text-align: center;">
                <h1>FORMULIR PENDAFTARAN</h1>
                <h2>PESANTREN PERSATUAN ISLAM 80 AL AMIN</h2>
                <p>SINDANGKASIH - CIAMIS</p>
            </div>
        </div>
    </div>

    <!-- Data Pribadi -->
    <div class="section">
        <div class="section-title">A. DATA PRIBADI</div>
        <div class="data-grid">
            <div class="label">Nama Lengkap</div>
            <div class="value">: {{ $pendaftar->nama_lengkap }}</div>

            <div class="label">NISN</div>
            <div class="value">: {{ $pendaftar->nisn }}</div>

            <div class="label">Jenis Kelamin</div>
            <div class="value">: {{ $pendaftar->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</div>

            <div class="label">Tempat, Tgl Lahir</div>
            <div class="value">: {{ $pendaftar->tempat_lahir }}, {{ $pendaftar->tanggal_lahir }}</div>

            <div class="label">Anak Ke</div>
            <div class="value">: {{ $pendaftar->anak_ke }}</div>

            <div class="label">Jumlah Saudara</div>
            <div class="value">: {{ $pendaftar->jumlah_saudara }}</div>
        </div>
    </div>

    <!-- Data Orang Tua -->
    <div class="section">
        <div class="section-title">B. DATA ORANG TUA</div>
        <div class="data-grid">
            <div class="label" style="grid-column: 1 / -1; font-weight: bold;">Data Ayah:</div>
            <div class="label">Nama Ayah</div>
            <div class="value">: {{ $pendaftar->nama_ayah }}</div>

            <div class="label">NIK Ayah</div>
            <div class="value">: {{ $pendaftar->nik_ayah }}</div>

            <div class="label">Pendidikan</div>
            <div class="value">: {{ $pendaftar->pendidikan_ayah }}</div>

            <div class="label">Pekerjaan</div>
            <div class="value">: {{ $pendaftar->pekerjaan_ayah }}</div>

            <div class="label" style="grid-column: 1 / -1; font-weight: bold; margin-top: 10px;">Data Ibu:</div>
            <div class="label">Nama Ibu</div>
            <div class="value">: {{ $pendaftar->nama_ibu }}</div>

            <div class="label">NIK Ibu</div>
            <div class="value">: {{ $pendaftar->nik_ibu }}</div>

            <div class="label">Pendidikan</div>
            <div class="value">: {{ $pendaftar->pendidikan_ibu }}</div>

            <div class="label">Pekerjaan</div>
            <div class="value">: {{ $pendaftar->pekerjaan_ibu }}</div>
        </div>
    </div>

    <!-- Data Alamat & Kontak -->
    <div class="section">
        <div class="section-title">C. DATA ALAMAT & KONTAK</div>
        <div class="data-grid">
            <div class="label">Alamat</div>
            <div class="value">: {{ $pendaftar->alamat }}</div>

            <div class="label">Kode Pos</div>
            <div class="value">: {{ $pendaftar->kode_pos }}</div>

            <div class="label">No. HP</div>
            <div class="value">: {{ $pendaftar->no_hp }}</div>
        </div>
    </div>

    <!-- Data Akademik -->
    <div class="section">
        <div class="section-title">D. DATA AKADEMIK</div>
        <div class="data-grid">
            <div class="label">Asal Sekolah</div>
            <div class="value">: {{ $pendaftar->asal_sekolah }}</div>

            <div class="label">Unit</div>
            <div class="value">: {{ $pendaftar->nama_unit }}</div>

            <div class="label">Jalur Pendaftaran</div>
            <div class="value">: {{ $pendaftar->jalur_pendaftaran }}</div>

            <div class="label">No. Registrasi</div>
            <div class="value">: {{ $pendaftar->no_register }}</div>
        </div>
    </div>

    <!-- Tanda Tangan -->
    <div class="footer">
        <div class="signature">
            <p>Ciamis, {{ \Carbon\Carbon::now()->locale('id')->isoFormat('D MMMM Y') }}</p>
            <p>Pendaftar,</p>
            <div class="signature-line"></div>
            <p style="margin-top: 5px;">( {{ $pendaftar->nama_lengkap }} )</p>
        </div>
    </div>
</body>

</html>
