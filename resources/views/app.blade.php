<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Proyecto</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
    <!-- Menú -->
    <nav class="bg-white border-b shadow-md">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center h-16">
            <div class="text-xl font-bold">GamePost</div>
            <div class="hidden md:flex gap-4">
                <a href="/" class="hover:text-blue-600">Home</a>
                <a href="/posts" class="hover:text-blue-600">Posts</a>
                <a href="/contacto" class="hover:text-blue-600">Contacto</a>

                @auth
                    <a href="/perfil" class="hover:text-blue-600">Perfil</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="hover:text-red-600">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="hover:text-blue-600">Login</a>
                    <a href="{{ route('register') }}" class="hover:text-blue-600">Registro</a>
                @endauth
            </div>

            <!-- Botón menú móvil -->
            <div class="md:hidden">
                <button id="menu-btn" class="focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Menú móvil -->
        <div id="mobile-menu" class="md:hidden hidden flex-col px-4 pb-4 bg-white border-t">
            <a href="/" class="py-1">Home</a>
            <a href="/posts" class="py-1">Posts</a>
            <a href="/contacto" class="py-1">Contacto</a>

            @auth
                <a href="/perfil" class="py-1">Perfil</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="py-1 text-red-600">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="py-1">Login</a>
                <a href="{{ route('register') }}" class="py-1">Registro</a>
            @endauth
        </div>
    </nav>

    <!-- Contenido -->
    <main class="flex-grow p-4">
        @yield('content')
    </main>

    <script>
        const btn = document.getElementById('menu-btn');
        const menu = document.getElementById('mobile-menu');
        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
