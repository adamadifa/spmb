<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Formulir Pendaftaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 18px;
            margin: 0;
            padding: 0;
        }

        .header p {
            font-size: 14px;
            margin: 5px 0;
        }

        .section {
            margin-bottom: 20px;
        }

        .section-title {
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 10px;
            border-bottom: 1px solid #000;
            padding-bottom: 5px;
        }

        .data-row {
            margin-bottom: 8px;
            font-size: 12px;
        }

        .label {
            font-weight: bold;
            display: inline-block;
            width: 150px;
        }

        .value {
            display: inline-block;
        }

        .footer {
            margin-top: 50px;
            text-align: right;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>FORMULIR PENDAFTARAN ONLINE</h1>
        <p>TAHUN AJARAN {{ substr($pendaftar->kode_ta, 0, 4) }}/{{ substr($pendaftar->kode_ta, 4, 4) }}</p>
    </div>

    <div class="section">
        <div class="section-title">A. DATA PRIBADI</div>
        <div class="data-row">
            <span class="label">No. Registrasi</span>
            <span class="value">: {{ $pendaftar->no_register }}</span>
        </div>
        <div class="data-row">
            <span class="label">Nama Lengkap</span>
            <span class="value">: {{ $pendaftar->nama_lengkap }}</span>
        </div>
        <div class="data-row">
            <span class="label">NISN</span>
            <span class="value">: {{ $pendaftar->nisn ?? '-' }}</span>
        </div>
        <div class="data-row">
            <span class="label">Jenis Kelamin</span>
            <span class="value">: {{ $pendaftar->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</span>
        </div>
        <div class="data-row">
            <span class="label">Tempat, Tgl Lahir</span>
            <span class="value">: {{ $pendaftar->tempat_lahir }}, {{ $pendaftar->tanggal_lahir }}</span>
        </div>
        <div class="data-row">
            <span class="label">Anak Ke</span>
            <span class="value">: {{ $pendaftar->anak_ke }}</span>
        </div>
        <div class="data-row">
            <span class="label">Jumlah Saudara</span>
            <span class="value">: {{ $pendaftar->jumlah_saudara }}</span>
        </div>
    </div>

    <div class="section">
        <div class="section-title">B. DATA ORANG TUA</div>
        <div class="data-row">
            <span class="label">Nama Ayah</span>
            <span class="value">: {{ $pendaftar->nama_ayah }}</span>
        </div>
        <div class="data-row">
            <span class="label">NIK Ayah</span>
            <span class="value">: {{ $pendaftar->nik_ayah }}</span>
        </div>
        <div class="data-row">
            <span class="label">Pendidikan Ayah</span>
            <span class="value">: {{ $pendaftar->pendidikan_ayah }}</span>
        </div>
        <div class="data-row">
            <span class="label">Pekerjaan Ayah</span>
            <span class="value">: {{ $pendaftar->pekerjaan_ayah }}</span>
        </div>
        <div class="data-row">
            <span class="label">Nama Ibu</span>
            <span class="value">: {{ $pendaftar->nama_ibu }}</span>
        </div>
        <div class="data-row">
            <span class="label">NIK Ibu</span>
            <span class="value">: {{ $pendaftar->nik_ibu }}</span>
        </div>
        <div class="data-row">
            <span class="label">Pendidikan Ibu</span>
            <span class="value">: {{ $pendaftar->pendidikan_ibu }}</span>
        </div>
        <div class="data-row">
            <span class="label">Pekerjaan Ibu</span>
            <span class="value">: {{ $pendaftar->pekerjaan_ibu }}</span>
        </div>
    </div>

    <div class="section">
        <div class="section-title">C. DATA ALAMAT & KONTAK</div>
        <div class="data-row">
            <span class="label">Alamat</span>
            <span class="value">: {{ $pendaftar->alamat }}</span>
        </div>
        <div class="data-row">
            <span class="label">Kode Pos</span>
            <span class="value">: {{ $pendaftar->kode_pos }}</span>
        </div>
        <div class="data-row">
            <span class="label">No. HP</span>
            <span class="value">: {{ $pendaftar->no_hp }}</span>
        </div>
    </div>

    <div class="section">
        <div class="section-title">D. DATA AKADEMIK</div>
        <div class="data-row">
            <span class="label">Asal Sekolah</span>
            <span class="value">: {{ $pendaftar->asal_sekolah }}</span>
        </div>
        <div class="data-row">
            <span class="label">Unit</span>
            <span class="value">: {{ $pendaftar->nama_unit }}</span>
        </div>
        <div class="data-row">
            <span class="label">Jalur Pendaftaran</span>
            <span class="value">: {{ $pendaftar->jalur_pendaftaran }}</span>
        </div>
    </div>

    <div class="footer">
        <p>Dicetak pada: {{ now()->format('d F Y H:i:s') }}</p>
    </div>
</body>

</html>
