<!DOCTYPE html>
<html>
<head>
    <title>Client Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: url{{ storage_path('public/cret/Templatecret.png') }} no-repeat center center;
            background-size: cover;
            position: relative;
            width: 100%;
            height: 100%;
            /* Ensuring background covers the entire A4 page */
        }

        .content {
            position: relative;
            padding: 50px;
            z-index: 2; /* Ensuring content stays above background */
            background: rgba(255, 255, 255, 0.8); /* Optional: slight white background for readability */
        }

        .header {
            text-align: center;
            margin-bottom: 50px;
        }
    </style>
</head>
<body>
    <div class="content">
        <div class="header">
            <h1>Client Document</h1>
            <p>Generated on: {{ date('Y-m-d') }}</p>
        </div>

        <div class="details">
            <p>Entitas Usaha: {{ $client->entitas_usaha }}</p>
            <p>No Sertifikat: {{ $client->no_sertifikat }}</p>
            <p>Ruang Lingkup: {{ $client->ruang_lingkup }}</p>
            <p>Standar: {{ $client->standar }}</p>
            <p>Status Organisasi: {{ $client->status_organisasi }}</p>
            <p>Masa Berlaku: {{ $client->masa_berlaku }}</p>
            <p>Audit Awal: {{ $client->audit_awal }}</p>
            <p>Pengawasan Audit 1: {{ $client->pengawasan_audit_1 }}</p>
            <p>Pengawasan Audit 2: {{ $client->pengawasan_audit_2 }}</p>
            <p>Status Pengawasan 1: {{ $client->status_pengawasan_1 }}</p>
            <p>Status Pengawasan 2: {{ $client->status_pengawasan_2 }}</p>
            <p>Perpanjangan: {{ $client->perpanjangan }}</p>
            <p>QR Code: {{ $client->qr_code }}</p>
        </div>
    </div>
</body>
</html>
