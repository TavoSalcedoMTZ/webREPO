<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Datos del Usuario</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>


    <h1>Bienvenido</h1>

    @foreach($data as $clave => $valor)
        <p><strong>{{ $clave }}:</strong> {{ $valor }}</p>
    @endforeach

    <p><a href="{{ route('update') }}">Actualiza tu informacion</a></p>

    <form action="{{ route('logout') }}" method="POST" class="logout-form">
        @csrf
        <button type="submit" class="btn-logout">Logout</button>
    </form>

</body>
</html>
