<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <form method="POST" action="{{ route('login.store') }}">
        @csrf
        <h2>Iniciar Sesión</h2>
        <input type="email" name="email" placeholder="Correo electrónico" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <button type="submit">Entrar</button>
        @if(session('error'))
            <p>{{ session('error') }}</p>
        @endif
        <p><a href="{{ route('register') }}">Regístrate aquí</a></p>
    </form>
</body>
</html>