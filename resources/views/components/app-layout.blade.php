<!DOCTYPE html>
<html lang="en" data-theme="retro">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="min-h-screen flex flex-col">

    <!-- Menú de navegación -->

    <header>
        <div class="navbar bg-base-100 shadow-sm">
            <div class="navbar-start">
                <div class="dropdown">
                    <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h7" />
                        </svg>
                    </div>
                    <ul tabindex="0"
                        class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                        <li><a href="#"><i class="fas fa-city mr-2"></i> Ciudades</a></li>
                        <li><a href="#"><i class="fas fa-route mr-2"></i> Rutas</a></li>
                        <li><a href="#"><i class="fa-solid fa-landmark"></i> Clases</a></li>
                    </ul>
                </div>
            </div>
            <div class="navbar-center">
                <a class="btn btn-ghost text-xl" href="#">Finca el suspiro</a>
            </div>
            <div class="navbar-end">
            </div>
        </div>
    </header>

    <!-- Cuerpo de la pagina -->

    <main class="flex-grow container mx-auto px-4 py-6">
        {{ $slot }}
    </main>

    <!-- Pie de pagina -->

    <footer
        class="footer flex flex-col items-center bg-neutral text-neutral-content p-1 sm:footer sm:footer-horizontal sm:bg-neutral sm:text-neutral-content">
        <aside class="flex justify-center sm:ps-60">
            <figure>
                <img src="{{ asset('img/sing_ranch_white.png') }}" alt="imagen de icono"
                    class="w-25 h-25 sm:w-60 sm:h-60">
            </figure>
        </aside>
        <nav class="text-center sm:mt-9">
            <h6 class="text-xl font-bold mb-2 sm:text-xl font-bold">Contacto</h6>
            <div class="flex justify-center sm:grid sm:grid-flow-col sm:gap-4">
                <a href="https://github.com/Raul-OXRI" target="_blank">
                    <i class="fa-brands fa-square-github fa-4x sm:fa-3x"></i>
                </a>
            </div>
        </nav>
    </footer>
</body>

</html>
