<!DOCTYPE html>
<html lang="es" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GamePost Samurai</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

   
    <style>
        body {
            background-color: #808080ff; /* negro */
            color: #000000ff; /* gris claro */
            font-family: 'Poppins', sans-serif;
        }

        .navbar {
            background-color: #111827; /* gris muy oscuro */
        }

        .navbar a {
            color: #f3f4f6;
        }

        .navbar a:hover {
            color: #ef4444; /* rojo */
        }

        .btn-red {
            background-color: #e6c7c7ff;
            color: white;
        }

        .btn-red:hover {
            background-color: #ef4444;
        }

        .card {
            background-color: #1f2937;
            border: 1px solid #374151;
            padding: 1rem;
            border-radius: 1rem;
            box-shadow: 0 4px 10px rgba(255, 0, 0, 0.2);
        }
    </style>
</head>
<body class="min-h-screen flex flex-col">

    <!-- Menú -->
    <nav class="navbar shadow-md border-b px-4 py-3 flex justify-between items-center">
        <div class="text-2xl font-bold text-red-600">GamePost</div>
        <div class="space-x-4 hidden md:flex">
            <a href="/">Inicio</a>
            <a href="/posts">Posts</a>
            <a href="/contacto">Contacto</a>
            @auth
                <a href="/perfil">Perfil</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="btn-red px-3 py-1 rounded">Salir</button>
                </form>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Registro</a>
            @endauth
        </div>
    </nav>

    <!-- Contenido -->
    <main class="flex-grow p-6">
        @yield('content')
    </main>

    <!-- Script del menú móvil -->
    <script>
        const btn = document.getElementById('menu-btn');
        const menu = document.getElementById('mobile-menu');
        btn?.addEventListener('click', () => {
            menu?.classList.toggle('hidden');
        });
    </script>

</body>
</html>
