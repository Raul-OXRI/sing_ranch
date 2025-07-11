<x-app-layout>
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div class="flex items-center gap-4">
            <div class="bg-secondary p-3 rounded-full">
                <i class="fa-solid fa-cow bg-secondary text-xl"></i>
            </div>
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-secondary">Gestión de Bovinos</h1>
            </div>
        </div>
        <div class="flex gap-3">
            <button class="btn btn-primary" onclick="document.getElementById('create_cow_modal').showModal()">
                <i class="fa-solid fa-user-plus"></i> Crear Bovino
            </button>
        </div>
    </div>
    <x-app-modal-create 
        modalId="create_cow_modal" 
        title="Crear Bovino" 
        formAction="{{ route('Cows.store') }}"
        :form="view('Cows.cow-form', ['users' => $users])->render()" />

    <div class="tabs tabs-border my-8">
        <input type="radio" name="my_tabs_2" class="tab" aria-label="Activos" checked />
        <div class="tab-content border-base-300 bg-base-100">
            <x-app-table>
                <tr>
                    <th>Codigo</th>
                    <th>Fecha de entrada</th>
                    <th>Fecha de nacimiento</th>
                    <th>Sexo</th>
                    <th>Propietario</th>
                    <th>Acciones</th>
                </tr>
                @foreach ($allanimals as $cow)
                    <tr>
                        <td>{{ $cow->animal_code }}</td>
                        <td>{{ $cow->entry_date }}</td>
                        <td>{{ $cow->birth_date }}</td>
                        <td>{{ $cow->sexo }}</td>
                        <td>{{ $cow->user?->name }} {{ $cow->user?->last_name }}</td>
                        <td class="flex items-center gap-2">
                            <div class="flex gap-2">

                                <form action="{{ route('Cows.switch', $cow) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" onchange="this.form.submit()" class="btn btn-sm btn-warning">
                                        <option value="1" {{ $cow->status == 1 ? 'selected' : '' }}>Activo</option>
                                        <option value="2" {{ $cow->status == 2 ? 'selected' : '' }}>vendido
                                        </option>
                                        <option value="3" {{ $cow->status == 3 ? 'selected' : '' }}>Muerto
                                        </option>
                                    </select>
                                </form>
                            </div>

                            <div class="flex gap-2">
                                <button class="btn btn-sm btn-success">
                                    <i class="fa-regular fa-ballot-check"></i> FincaHoy
                                </button>
                            </div>
                            <div class="flex gap-2">
                                @if ($cow->sexo == 'hembra')
                                    <button class="btn btn-sm btn-info"
                                        onclick="document.getElementById('create_calves_modal_{{ $cow->id }}').showModal()">
                                        <i class="fa-solid fa-user-plus"></i> Agregar Cría
                                    </button>
                                    <x-app-modal-create
                                        modalId="create_calves_modal_{{ $cow->id }}"
                                        title="Crear Cría"
                                        formAction="{{ route('Cows.storecalving') }}"
                                        :form="view('Cows.calvin-form', [
                                            'users' => $users,
                                            'cow'   => $cow
                                        ])->render()"
                                    />
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </x-app-table>
        </div>

        <input type="radio" name="my_tabs_2" class="tab" aria-label="vendidos" />
        <div class="tab-content border-base-300 bg-base-100">
            <x-app-table>
                <tr>
                    <th>Codigo</th>
                    <th>Fecha de entrada</th>
                    <th>Fecha de nacimiento</th>
                    <th>Sexo</th>
                    <th>Propietario</th>
                    <th>Acciones</th>
                </tr>
                @foreach ($allinactive as $cow)
                    <tr>
                        <td>{{ $cow->animal_code }}</td>
                        <td>{{ $cow->entry_date }}</td>
                        <td>{{ $cow->birth_date }}</td>
                        <td>{{ $cow->sexo }}</td>
                        <td>{{ $cow->user?->name }} {{ $cow->user?->last_name }}</td>
                        <td class="flex items-center gap-2">
                            <div class="flex gap-2">
                                <span class="btn btn-sm btn-warning">
                                    {{ $cow->status == 2 ? 'Vendido' : 'Muerto' }}
                                </span>
                            </div>
                            <div>
                                <div class="flex gap-2">
                                    <button class="btn btn-sm btn-success">
                                        <i class="fa-regular fa-ballot-check"></i> FincaHoy
                                    </button>

                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </x-app-table>
        </div>
        <input type="radio" name="my_tabs_2" class="tab" aria-label="Muertos" />
        <div class="tab-content border-base-300 bg-base-100">
            <x-app-table>
                <tr>
                    <th>Codigo</th>
                    <th>Fecha de entrada</th>
                    <th>Fecha de nacimiento</th>
                    <th>Sexo</th>
                    <th>Propietario</th>
                    <th>Acciones</th>
                </tr>
                @foreach ($alldead as $cow)
                    <tr>
                        <td>{{ $cow->animal_code }}</td>
                        <td>{{ $cow->entry_date }}</td>
                        <td>{{ $cow->birth_date }}</td>
                        <td>{{ $cow->sexo }}</td>
                        <td>{{ $cow->user?->name }} {{ $cow->user?->last_name }}</td>
                        <td class="flex items-center gap-2">
                            <div class="flex gap-2">
                                <span class="btn btn-sm btn-warning">
                                    {{ $cow->status == 2 ? 'Vendido' : 'Muerto' }}
                                </span>
                            </div>
                            <div>
                                <div class="flex gap-2">
                                    <button class="btn btn-sm btn-success">
                                        <i class="fa-regular fa-ballot-check"></i> FincaHoy
                                    </button>

                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </x-app-table>
        </div>
    </div>


</x-app-layout>
