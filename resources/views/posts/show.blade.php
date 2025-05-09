@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>

    @if($post->gambar)
        <img src="{{ asset('storage/' . $post->gambar) }}" alt="Gambar" style="max-width: 400px;">
    @endif

    <br><br>
    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Kembali</a>
    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>

    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
    </form>
</div>
@endsection
