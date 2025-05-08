<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran - {{ $pendaftar->no_register }}</title>
    <style>
        @page {
            margin: 1cm 1.5cm;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .header {
            text-align: center;
            margin-bottom: 10px;
            padding: 5px 0;
        }

        .header img {
            width: 70px;
            height: 70px;
            margin-bottom: 5px;
        }

        .header h1 {
            font-family: Arial, sans-serif;
            font-size: 18px;
            font-weight: bold;
            margin: 3px 0;
            text-transform: uppercase;
        }

        .header h2 {
            font-family: Arial, sans-serif;
            font-size: 16px;
            font-weight: 600;
            margin: 3px 0;
        }

        .header p {
            font-family: Arial, sans-serif;
            font-size: 14px;
            margin: 3px 0;
        }

        .section {
            margin-bottom: 10px;
        }

        .section-title {
            font-family: Arial, sans-serif;
            font-weight: bold;
            margin-bottom: 5px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 3px;
            font-size: 14px;
        }

        .data-grid {
            display: table;
            width: 100%;
            font-size: 13px;
            font-family: Arial, sans-serif;
        }

        .data-row {
            display: table-row;
        }

        .label {
            display: table-cell;
            width: 140px;
            font-weight: 500;
            padding: 2px 0;
        }

        .value {
            display: table-cell;
            padding: 2px 0;
        }

        .footer {
            margin-top: 15px;
            text-align: right;
        }

        .signature {
            margin-top: 15px;
            font-family: Arial, sans-serif;
            font-size: 13px;
        }

        .signature-line {
            width: 200px;
            border-top: 1px solid #000;
            margin-top: 2px;
        }

        .parent-section {
            margin-bottom: 8px;
        }

        .parent-title {
            font-family: Arial, sans-serif;
            font-weight: bold;
            margin-bottom: 3px;
            font-size: 13px;
        }

        .signature-text {
            margin: 0;
            line-height: 1.2;
        }
    </style>
</head>

<body>
    <!-- Form Header -->
    <div class="header">
        <img src="{{ public_path('assets/image/logo.png') }}" alt="Logo">
        <h1>FORMULIR PENDAFTARAN</h1>
        <h2>PESANTREN PERSATUAN ISLAM 80 AL AMIN</h2>
        <p>SINDANGKASIH - CIAMIS</p>
    </div>

    <!-- Data Pribadi -->
    <div class="section">
        <div class="section-title">A. DATA PRIBADI</div>
        <div class="data-grid">
            <div class="data-row">
                <div class="label">Nama Lengkap</div>
                <div class="value">: {{ $pendaftar->nama_lengkap }}</div>
            </div>
            <div class="data-row">
                <div class="label">NISN</div>
                <div class="value">: {{ $pendaftar->nisn }}</div>
            </div>
            <div class="data-row">
                <div class="label">Jenis Kelamin</div>
                <div class="value">: {{ $pendaftar->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</div>
            </div>
            <div class="data-row">
                <div class="label">Tempat, Tgl Lahir</div>
                <div class="value">: {{ $pendaftar->tempat_lahir }}, {{ $pendaftar->tanggal_lahir }}</div>
            </div>
            <div class="data-row">
                <div class="label">Anak Ke</div>
                <div class="value">: {{ $pendaftar->anak_ke }}</div>
            </div>
            <div class="data-row">
                <div class="label">Jumlah Saudara</div>
                <div class="value">: {{ $pendaftar->jumlah_saudara }}</div>
            </div>
        </div>
    </div>

    <!-- Data Orang Tua -->
    <div class="section">
        <div class="section-title">B. DATA ORANG TUA</div>
        <div class="parent-section">
            <div class="parent-title">Data Ayah:</div>
            <div class="data-grid">
                <div class="data-row">
                    <div class="label">Nama Ayah</div>
                    <div class="value">: {{ $pendaftar->nama_ayah }}</div>
                </div>
                <div class="data-row">
                    <div class="label">NIK Ayah</div>
                    <div class="value">: {{ $pendaftar->nik_ayah }}</div>
                </div>
                <div class="data-row">
                    <div class="label">Pendidikan</div>
                    <div class="value">: {{ $pendaftar->pendidikan_ayah }}</div>
                </div>
                <div class="data-row">
                    <div class="label">Pekerjaan</div>
                    <div class="value">: {{ $pendaftar->pekerjaan_ayah }}</div>
                </div>
            </div>
        </div>
        <div class="parent-section">
            <div class="parent-title">Data Ibu:</div>
            <div class="data-grid">
                <div class="data-row">
                    <div class="label">Nama Ibu</div>
                    <div class="value">: {{ $pendaftar->nama_ibu }}</div>
                </div>
                <div class="data-row">
                    <div class="label">NIK Ibu</div>
                    <div class="value">: {{ $pendaftar->nik_ibu }}</div>
                </div>
                <div class="data-row">
                    <div class="label">Pendidikan</div>
                    <div class="value">: {{ $pendaftar->pendidikan_ibu }}</div>
                </div>
                <div class="data-row">
                    <div class="label">Pekerjaan</div>
                    <div class="value">: {{ $pendaftar->pekerjaan_ibu }}</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Data Alamat & Kontak -->
    <div class="section">
        <div class="section-title">C. DATA ALAMAT & KONTAK</div>
        <div class="data-grid">
            <div class="data-row">
                <div class="label">Alamat</div>
                <div class="value">: {{ $pendaftar->alamat }}</div>
            </div>
            <div class="data-row">
                <div class="label">Kode Pos</div>
                <div class="value">: {{ $pendaftar->kode_pos }}</div>
            </div>
            <div class="data-row">
                <div class="label">No. HP</div>
                <div class="value">: {{ $pendaftar->no_hp }}</div>
            </div>
        </div>
    </div>

    <!-- Data Akademik -->
    <div class="section">
        <div class="section-title">D. DATA AKADEMIK</div>
        <div class="data-grid">
            <div class="data-row">
                <div class="label">Asal Sekolah</div>
                <div class="value">: {{ $pendaftar->asal_sekolah }}</div>
            </div>
            <div class="data-row">
                <div class="label">Unit</div>
                <div class="value">: {{ $pendaftar->nama_unit }}</div>
            </div>
            <div class="data-row">
                <div class="label">Jalur Pendaftaran</div>
                <div class="value">: {{ $pendaftar->jalur_pendaftaran }}</div>
            </div>
            <div class="data-row">
                <div class="label">No. Registrasi</div>
                <div class="value">: {{ $pendaftar->no_register }}</div>
            </div>
        </div>
    </div>

    <!-- Tanda Tangan -->
    <div class="footer">
        <div class="signature">
            <p class="signature-text">Ciamis, {{ \Carbon\Carbon::now()->locale('id')->isoFormat('D MMMM Y') }}</p>
            <p class="signature-text">Pendaftar,</p>
            <p class="signature-text" style="margin-top: 50px;">( {{ $pendaftar->nama_lengkap }} )</p>

        </div>
    </div>
</body>

</html>
