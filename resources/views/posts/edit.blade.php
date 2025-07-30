@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Editar Post</h1>

    @if ($errors->any())
        <div class="text-red-500 mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('posts.update', $post) }}" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="title" class="block mb-1">Título</label>
            <input type="text" name="title" id="title" class="w-full border px-3 py-2 rounded"
                   value="{{ old('title', $post->title) }}" required>
        </div>

        <div>
            <label for="content" class="block mb-1">Contenido</label>
            <textarea name="content" id="content" rows="5" class="w-full border px-3 py-2 rounded" required>{{ old('content', $post->content) }}</textarea>
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Guardar cambios</button>
    </form>
@endsection
