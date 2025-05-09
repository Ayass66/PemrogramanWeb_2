<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Post</title>
</head>
<body>
    <h1>Daftar Post</h1>
    <a href="{{ route('posts.create') }}">Tambah Post</a>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>#</th>
            <th>Judul</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>

        @foreach ($posts as $post)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $post->title }}</td>
            <td>
                @if ($post->gambar)
                    <img src="{{ asset('storage/' . $post->gambar) }}" alt="Gambar" width="100">
                @else
                    Tidak ada gambar
                @endif
            </td>
            <td>
                <a href="{{ route('posts.show', $post->id) }}">Lihat</a> |
                <a href="{{ route('posts.edit', $post->id) }}">Edit</a> |
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
