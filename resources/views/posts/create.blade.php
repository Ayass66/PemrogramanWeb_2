<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Buat post-an hari ini</h1>
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="Judul"><br>
        <textarea name="content" placeholder="Isi"></textarea><br>
        <input type="file" name="gambar"><br>
        <button type="submit">Simpan</button>
    </form>
</body> 
</html>