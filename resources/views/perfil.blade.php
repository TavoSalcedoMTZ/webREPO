@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Editar Perfil</h2>

    @if (session('success'))
        <div class="text-green-600 mb-2">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('perfil.update') }}" class="space-y-4">
        @csrf

        <div>
            <label for="name" class="block mb-1">Nombre</label>
            <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}" required class="w-full border px-3 py-2 rounded">
            @error('name') <div class="text-red-500">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="email" class="block mb-1">Correo</label>
            <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" required class="w-full border px-3 py-2 rounded">
            @error('email') <div class="text-red-500">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="password" class="block mb-1">Nueva Contraseña (opcional)</label>
            <input id="password" type="password" name="password" class="w-full border px-3 py-2 rounded">
            @error('password') <div class="text-red-500">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="password_confirmation" class="block mb-1">Confirmar Contraseña</label>
            <input id="password_confirmation" type="password" name="password_confirmation" class="w-full border px-3 py-2 rounded">
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded w-full hover:bg-blue-700">Actualizar</button>
    </form>
</div>
@endsection
