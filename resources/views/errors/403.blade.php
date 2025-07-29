<!DOCTYPE html>
<html lang="en" data-theme="bumblebee">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Bitcount+Prop+Double:wght@100..900&display=swap"
        rel="stylesheet">

</head>

<body class="min-h-screen flex flex-col">
    <div class="flex-1 flex flex-col items-center justify-center text-center space-y-6">
        <div class="text-center" style="font-family: 'Bitcount Prop Double', sans-serif;">
            <h1 class="text-8xl font-bold mb-4">403
                <i class="fa-solid fa-door-closed text-9xl"></i>
            </h1>
        </div>
        <div class="text-center">
            <p class="text-lg mb-6">Tu no tienes permiso para acceder a esta página.</p>
            <a href="{{ route('Auth.dashboard') }}" class="btn btn-primary">Ir a Inicio</a>
        </div>
    </div>
</body>

</html>
