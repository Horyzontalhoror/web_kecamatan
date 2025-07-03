<!DOCTYPE html>
<html>
<head>
    <title>Surat {{ $surat->jenis_surat }}</title>
    <style> body { font-family: 'Times New Roman', Times, serif; } h1, h2 { text-align: center; } p { line-height: 1.5; } </style>
</head>
<body>
    <h1>SURAT KETERANGAN {{ strtoupper($surat->jenis_surat) }}</h1>
    <h2>Nomor: {{ $surat->nomor_surat ?? '________________' }}</h2>
<br>
<p>Yang bertanda tangan di bawah ini, Kepala Desa {{ config('kantor.nama_desa') }}, Kecamatan {{ config('kantor.nama_kecamatan') }}, menerangkan dengan sebenarnya bahwa:</p>
    <table style="width: 100%; margin-left: 20px;">
        <tr>
            <td style="width: 30%;">Nama Lengkap</td>
            <td>: {{ $surat->nama_lengkap }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>: {{ $surat->alamat }}</td>
        </tr>
    </table>
    <br>
    <p>Adalah benar warga kami dan yang bersangkutan saat ini mengajukan permohonan <b>Surat Keterangan {{ $surat->jenis_surat }}</b>.</p>
    <p>Demikian surat keterangan ini dibuat untuk dapat dipergunakan sebagaimana mestinya.</p>
    <br><br><br>
    <div style="width: 30%; margin-left: 70%;">
        <p>[Nama Desa], {{ date('d F Y') }}</p>
        <p>Kepala Desa</p>
        <br><br><br>
        <p><b>( ............................. )</b></p>
    </div>
</body>
</html>
