<div>
    <div class="mb-4">
        <label for="name" class="text-sm font-medium w-1/2">Nombre:</label>
        <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}" id="name" required
            class="mt-1 w-1/2 rounded-md  shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 px-3 py-2" />
    </div>
    <div class="mb-4">
        <label for="last_name" class="text-sm font-medium w-1/2">Apellido: </label>
        <input type="text" class="mt-1 w-1/2 rounded-lg  px-3 py-2" name="last_name"
            value="{{ old('last_name', $user->last_name ?? '') }}" id="last_name" required>
    </div>
    <div class="mb-4">
        <label for="username" class="text-sm font-medium w-1/2">Nombre de usuario: </label>
        <input type="text" class="mt-1 w-1/2 rounded-lg  px-3 py-2" name="username"
            value="{{ old('username', $user->username ?? '') }}" id="username" required>
    </div>
    <div class="mb-4">
        <label for="email" class="text-sm font-medium w-1/2">Correo electrónico: </label>
        <input type="email" class="mt-1 w-1/2 rounded-lg  px-3 py-2" name="email"
            value="{{ old('email', $user->email ?? '') }}" id="email" required>
    </div>
    <div class="mb-4">
        <label for="password" class="text-sm font-medium w-1/2">Contraseña: </label>
        <input type="password" class="mt-1 w-1/2 rounded-lg  px-3 py-2" name="password" id="password">
    </div>
    <div class="mb-4">
        <label for="password_confirmation" class="text-sm font-medium w-1/2">Confirmar contraseña: </label>
        <input type="password" class="mt-1 w-1/2 rounded-lg  px-3 py-2" name="password_confirmation"
            id="password_confirmation">
    </div>

</div>
