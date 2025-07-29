<x-app-layout>
    <!-- Botón para abrir modal -->

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div class="flex items-center gap-4">
            <div class="bg-secondary p-3 rounded-full">
                <i class="fa-solid fa-users bg-secondary text-xl"></i>
            </div>
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-secondary">Gestión de Usuarios</h1>
            </div>
        </div>
        <div class="flex gap-3">
            <button class="btn btn-primary" onclick="document.getElementById('create_user_modal').showModal()">
                <i class="fa-solid fa-user-plus"></i> Crear Usuario
            </button>
        </div>
    </div>

    <!-- Modal incluido -->
    <x-app-modal-create modalId="create_user_modal" title="Crear Usuario" formAction="{{ route('User.store') }}"
        :form="view('User.user-form')->render()" />

    <div class="tabs tabs-border my-8">
        <input type="radio" name="my_tabs_2" class="tab" aria-label="Activos" checked />
        <div class="tab-content border-base-300 bg-base-100">
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
                        <td class="flex items-center gap-2">
                            <div class="flex gap-2">
                                <button class="btn btn-sm btn-secondary"
                                    onclick="document.getElementById('edit_user_modal_{{ $user->id }}').showModal()">
                                    <i class="fa-solid fa-pen-to-square"></i> Editar
                                </button>
                                <x-app-modal-update modalId="edit_user_modal_{{ $user->id }}" title="Editar Usuario"
                                    formAction="{{ route('User.update', $user->id) }}" :form="view('User.user-form', ['user' => $user])->render()" />
                            </div>
                            <div>
                                <form action="{{ route('User.switch', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-sm btn-neutral"> <i
                                            class="fa-solid fa-trash"></i>
                                        Desactivar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </x-app-table>
        </div>

        <input type="radio" name="my_tabs_2" class="tab" aria-label="Inactivos" />
        <div class="tab-content border-base-300 bg-base-100">
            <x-app-table>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Nombre de usuario</th>
                    <th>Correo electrónico</th>
                    <th>Acciones</th>
                </tr>
                @foreach ($inactiveUsers as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="flex items-center gap-2">
                            <div>
                                <form action="{{ route('User.restore', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-sm btn-neutral">
                                        <i class="fa-solid fa-trash-undo"></i>
                                        Restaurar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </x-app-table>
        </div>
    </div>


</x-app-layout>
