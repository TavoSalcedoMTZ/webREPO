@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Todos los Posts</h1>

    @auth
        <a href="{{ route('posts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Crear nuevo post</a>
    @endauth

    <div class="space-y-4">
        @foreach($posts as $post)
            <div class="p-4 border rounded shadow bg-white">
                <h2 class="text-xl font-bold">{{ $post->title }}</h2>
                <p class="text-gray-600">{{ $post->content }}</p>
                <p class="text-sm text-gray-400">Autor: {{ $post->user->name }}</p>

                @auth
                    @if ($post->user_id === auth()->id())
                        <a href="{{ route('posts.edit', $post) }}" class="text-blue-500 hover:underline">Editar</a>
                    @endif
                @endauth
            </div>
        @endforeach
    </div>
@endsection
