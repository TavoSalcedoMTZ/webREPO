@extends('layout.main')

@section('title', 'Crear Nuevo Post')

@section('content')
<link rel="stylesheet" href="{{ asset('css/post.css') }}">

<h1>Crear Nuevo Post</h1>

<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    <div class="post">
        <label>Título:</label>
        <input type="text" name="title" required><br>

        <label>Contenido:</label>
        <textarea name="content" required></textarea><br>

        <button type="submit">Guardar</button>
    </div>
</form>
@endsection
