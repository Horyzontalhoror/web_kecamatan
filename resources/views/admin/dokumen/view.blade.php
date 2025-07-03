<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Dokumen</title>
    <style>
        body, html { margin: 0; padding: 0; height: 100%; overflow: hidden; }
        .responsive-iframe {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            width: 100%;
            height: 100%;
            border: none;
        }
    </style>
</head>
<body>
    <iframe class="responsive-iframe" src="{{ Storage::url($path) }}"></iframe>
</body>
</html>
