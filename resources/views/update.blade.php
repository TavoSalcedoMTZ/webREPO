<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Información</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="form-container">
        <form method="POST" action="{{ route('update.store') }}">
            @csrf

            <h2>Actualizar Información</h2>

            <div>
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" value="{{ old('name', auth()->user()->name) }}" required>
                @error('name')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email">Correo electrónico:</label>
                <input type="email" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" required>
                @error('email')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password">Nueva contraseña (opcional):</label>
                <input type="password" id="password" name="password">
            </div>

            <div>
                <label for="password_confirmation">Confirmar contraseña:</label>
                <input type="password" id="password_confirmation" name="password_confirmation">
                @error('password')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit">Actualizar</button>

            @if(session('success'))
                <p class="success">{{ session('success') }}</p>
            @endif
            
        </form>
        <form action="{{ route('logout') }}" method="POST" class="logout-form">
        @csrf
        <button type="submit" class="btn-logout">Logout</button>
    </form>
    </div>
</body>
</html>
