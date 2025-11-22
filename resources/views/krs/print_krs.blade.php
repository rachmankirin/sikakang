<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Kartu Rencana Studi</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        .table th,
        .table td {
            border: 1px solid #000;
            padding: 5px;
            text-align: center;
        }

        .header-text {
            text-align: center;
        }

        .info-table td {
            padding: 3px 5px;
        }
    </style>
</head>

<body>

    <table width="100%">
        <tr>
            <td width="80" align="left">
                <img src="{{ public_path('images/untirta.png') }}" width="75">
            </td>
            <td class="header-text">
                <strong style="font-size: 16px;">UNIVERSITAS SULTAN AGENG TIRTAYASA</strong><br>
                <strong style="font-size: 14px;">KARTU RENCANA STUDI (KRS)</strong><br>
                Tahun Akademik: {{ date('Y') }}/{{ date('Y') + 1 }} <br>
            </td>
        </tr>
    </table>

    <br>

    <table class="info-table">
        <tr>
            <td><strong>Nama</strong></td>
            <td>: {{ $mahasiswaDetail->user->nama_lengkap ?? '-' }}</td>
        </tr>
        <tr>
            <td><strong>NIM</strong></td>
            <td>: {{ $mahasiswaDetail->nim ?? '-' }}</td>
        </tr>
        <tr>
            <td><strong>Program Studi</strong></td>
            <td>: {{ $mahasiswaDetail->program_studi ?? '-' }}</td>
        </tr>
        <tr>
            <td><strong>Semester</strong></td>
            <td>: {{ $krsList->first()->kelas->mataKuliah->semester ?? '1' }}</td>
        </tr>
    </table>

    <br>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode MK</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
                <th>Kelas</th>
                <th>Hari</th>
                <th>Waktu</th>
                <th>Dosen Pengampu</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($krsList as $i => $k)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $k->kelas->mataKuliah->kode_mk ?? '-' }}</td>
                    <td>{{ $k->kelas->mataKuliah->nama_mk ?? '-' }}</td>
                    <td>{{ $k->kelas->mataKuliah->sks ?? '-' }}</td>
                    <td>{{ $k->kelas->nama_kelas ?? '-' }}</td>
                    <td>{{ $k->kelas->hari ?? '-' }}</td>
                    <td>{{ $k->kelas->jam_mulai }} - {{ $k->kelas->jam_selesai }}</td>
                    <td>{{ $k->kelas->dosenPengampu->nama_lengkap ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br><br>

    <table width="100%">
        <tr>
            <td width="50%" align="center">
                Mengetahui<br>
                Dosen Pembimbing Akademik<br><br><br><br>
                (____________________)
            </td>
            <td width="50%" align="center">
                Serang, {{ date('d-m-Y') }}<br>
                Mahasiswa<br><br><br><br>
                ({{ $mahasiswaDetail->user->name ?? '-' }})
            </td>
        </tr>
    </table>

</body>

</html>
