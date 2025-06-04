@extends('layout.main')

@section('title', 'Crear Nuevo Post')

@section('content')
<h1>Editar Post</h1>
<form action="{{ route('posts.update', $post->id) }}" method="POST">
    @csrf
    @method('PUT')
  <div class="post">
    <label>Título:</label>
    <input type="text" name="title" value="{{ $post->title }}" required><br>

    <label>Contenido:</label>
    <textarea name="content" required>{{ $post->content }}</textarea><br>

    <button type="submit">Actualizar</button>
</div>
</form>
@endsection
