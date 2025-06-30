<!DOCTYPE html>
<html lang="en" data-theme="retro">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css'])
    <!-- font awesome  -->
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/all.css">
    <!-- boostrap icons  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="flex items-center justify-center min-h-screen bg-gradient-to-r from-celeste to-white">
        <div class="bg-neutral p-6 w-full max-w-md rounded-lg shadow">

            <div class="mt-8">
                <h2 class="text-2xl font-bold text-white">Login</h2>
                <p class="text-sm text-white py-4">Por favor ingrese sus credenciales correctamente</p>
            </div>
            <div class="form mt-4">
                <form action="{{ route('Auth.login') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="username" class="block text-xl font-semibold mb-2 text-white"><i
                                class="fa-solid fa-user-cowboy"></i> username</label>
                        <input type="text" name="username" id="username"
                            class="border rounded w-full py-2 px-3 text-white leading-tight focus:outline-none"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-xl font-semibold mb-2 text-white">
                            <i class="fa-solid fa-key-skeleton"></i> Password</label>
                        <input type="password" name="password" id="password"
                            class="border rounded w-full py-2 px-3 text-white leading-tight focus:outline-none"
                            required>
                    </div>

                    <div class="mb-4">
                        <button
                            class="bg-accent font-bold text-black text-sm py-2 px-2 rounded-lg w-full hover:bg-accent-content hover:text-white"
                            type="submit">
                            Login
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>


</body>

</html>
