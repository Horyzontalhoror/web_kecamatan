<!DOCTYPE html>
<html>
<head>
    <title>Lihat Arsip</title>
    <style> body, html { margin: 0; padding: 0; height: 100%; overflow: hidden; } iframe { position:absolute; top:0; left:0; width:100%; height:100%; border:none; } </style>
</head>
<body>
    <iframe src="{{ Storage::url($path) }}"></iframe>
</body>
</html>
