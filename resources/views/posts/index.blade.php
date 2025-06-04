@extends('layout.main')
@section('title', 'Ver Post')
@section('content')
<h1>Listado de Posts</h1>
@foreach ($posts as $post)
<img src="{{ asset('slim.jpg') }}" alt="Banner Slime" class="banner">
    <div class="post">
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->content }}</p>
        <a href="{{ route('posts.edit', $post->id) }}">Editar</a>
    </div>
@endforeach

@endsection
