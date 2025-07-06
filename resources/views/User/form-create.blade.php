<x-app-layout>
formulario de creacion de usuario


<form action="{{ route('User.store') }}" method="post">
    @csrf
    <label for="name">Nombre</label>
    <input type="text" name="name" id="name" required>
    <label for="last_name">Apellido</label>
    <input type="text" name="last_name" id="last_name" required>
    <label for="username">Nombre de usuario</label>
    <input type="text" name="username" id="username" required>
    <label for="email">Correo electrónico</label>
    <input type="email" name="email" id="email" required>
    <label for="password">Contraseña</label>
    <input type="password" name="password" id="password" required>
    <label for="password_confirmation">Confirmar contraseña</label>
    <input type="password" name="password_confirmation" id="password_confirmation" required>
    <button type="submit" class="btn btn-accent">Crear Usuario</button>
</form>

</x-app-layout>
