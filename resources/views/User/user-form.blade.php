<div>
    <div class="mb-4">
        <label for="name" class="text-sm font-medium w-1/2">Nombre:</label>
        <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}" id="name" required
            class="input mt-1 w-1/2" />
    </div>
    <div class="mb-4">
        <label for="last_name" class="text-sm font-medium w-1/2">Apellido: </label>
        <input type="text" class="input mt-1 w-1/2" name="last_name"
            value="{{ old('last_name', $user->last_name ?? '') }}" id="last_name" required>
    </div>
    <div class="mb-4">
        <label for="username" class="text-sm font-medium w-1/2">Nombre de usuario: </label>
        <input type="text" class="input mt-1 w-1/2" name="username"
            value="{{ old('username', $user->username ?? '') }}" id="username" required>
    </div>
    <div class="mb-4">
        <label for="email" class="text-sm font-medium w-1/2">Correo electrónico: </label>
        <input type="email" class="input mt-1 w-1/2" name="email"
            value="{{ old('email', $user->email ?? '') }}" id="email" required>
    </div>
    <div class="mb-4">
        <label for="password" class="text-sm font-medium w-1/2">Contraseña: </label>
        <input type="password" class="input mt-1 w-1/2" name="password" id="password">
    </div>
    <div class="mb-4">
        <label for="password_confirmation" class="text-sm font-medium w-1/2">Confirmar contraseña: </label>
        <input type="password" class="input mt-1 w-1/2" name="password_confirmation"
            id="password_confirmation">
    </div>
    <div class="mb-4">
        <label for="rol" class="text-sm font-medium w-1/2">Rol: </label>
        <select name="rol" id="rol" class="select mt-1 w-1/2" required>
            <option value="" disabled selected>Seleccione un rol</option>
            <option value="admin" {{ (old('rol', $user->rol ?? '') == 'admin') ? 'selected' : '' }}>Administrador</option>
            <option value="propietario" {{ (old('rol', $user->rol ?? '') == 'propietario') ? 'selected' : '' }}>Propietario</option>
        </select>
    </div>

</div>
