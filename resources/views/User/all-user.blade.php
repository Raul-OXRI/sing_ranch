<x-app-layout>
    <!-- Botón para abrir modal -->
    <button class="btn btn-primary" onclick="document.getElementById('create_user_modal').showModal()">
        <i class="fa-solid fa-users-medical"></i> Crear Usuario
    </button>

    <!-- Modal incluido -->
    <x-app-modal modalId="create_user_modal" title="Crear Usuario" formAction="{{ route('User.store') }}"
        :form="view('components.forms.user-form')->render()" />


    <x-app-table>

        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Nombre de usuario</th>
            <th>Correo electrónico</th>
            <th>Acciones</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>

                </td>
            </tr>
        @endforeach

    </x-app-table>
</x-app-layout>
