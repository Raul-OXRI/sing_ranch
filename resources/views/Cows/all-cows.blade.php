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

            <div class="dropdown dropdown-left dropdown-center">
                <div tabindex="0" role="button" class="btn btn-neutral"><i class="fa-solid fa-file-excel"></i> Exportar</div>
                <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-1 w-52 p-2 shadow-sm">
                    <li><a href="{{ route('Cows.xlsx', ['status' => 1]) }}">Activos</a></li>
                    <li><a href="{{ route('Cows.xlsx', ['status' => 2]) }}">Vendidos</a></li>
                    <li><a href="{{ route('Cows.xlsx', ['status' => 3]) }}">Muertos</a></li>
                </ul>
            </div>
            

            @if (Auth::user()->rol === 'admin')
                <button class="btn btn-secondary  text-white" onclick="document.getElementById('create_cow_modal').showModal()">
                    <i class="fa-solid fa-cowbell-circle-plus"></i>Crear Bovino
                </button>
            @endif
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
                <thead>
                    <tr>
                        <th class="text-center">Codigo</th>
                        <th class="text-center">Fecha de entrada</th>
                        <th class="text-center">Fecha de nacimiento</th>
                        <th class="text-center">Tiempo de vida</th>
                        <th class="text-center">Sexo</th>
                        <th class="text-center">Propietario</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all_active as $cow)
                        <tr class="text-center">
                            <td class="text-center">{{ $cow->animal_code }}</td>
                            <td class="text-center">{{ $cow->entry_date ?? '-' }}</td>
                            <td class="text-center">{{ $cow->birth_date ?? '-' }}</td>
                            <td class="text-center">{{ $cow->edad }}</td>
                            <td class="text-center">{{ $cow->sexo }}</td>
                            <td class="text-center">{{ $cow->user?->name }} {{ $cow->user?->last_name }}</td>
                            <td class="flex gap-1">
                                @if (Auth::user()->rol === 'admin')
                                    <div class="flex gap-2">
                                        <form action="{{ route('Cows.switch', $cow) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" onchange="this.form.submit()"
                                                class="btn btn-sm btn-neutral">
                                                <option value="1" {{ $cow->status == 1 ? 'selected' : '' }}>Activo
                                                </option>
                                                <option value="3" {{ $cow->status == 2 ? 'selected' : '' }}>vendido
                                                </option>
                                                <option value="2" {{ $cow->status == 3 ? 'selected' : '' }}>Muerto
                                                </option>
                                            </select>
                                        </form>
                                    </div>
                                @elseif (Auth::user()->rol === 'propietario')
                                <div class="flex gap-2">
                                    <span class="btn btn-sm btn-neutral">
                                        {{ $cow->status == 1 ? 'Activo': 'Vendido' }}
                                    </span>
                                </div>
                                @endif
                                <div class="flex gap-2">
                                    <button class="btn btn-sm btn-accent"
                                        onclick="document.getElementById('info_cow_modal_{{ $cow->id }}').showModal()">
                                        <i class="fa-regular fa-memo-circle-info"></i> InfoAgro
                                    </button>
                                    <x-app-modal-info
                                        modalId="info_cow_modal_{{ $cow->id }}" 
                                        title="Información del Bovino" 
                                        formAction="{{ route('Cows.info', $cow->id) }}"
                                        :form="view('Cows.info-form', ['cow' => $cow, 'historyDetails' => $cow->historyDetails])->render()" />
                                </div>
                                @if (Auth::user()->rol === 'admin')
                                    <div class="flex gap-2">
                                        @if ($cow->sexo == 'hembra')
                                            <button class="btn btn-sm btn-secondary text-white"
                                                onclick="document.getElementById('create_calves_modal_{{ $cow->id }}').showModal()">
                                                <i class="fa-solid fa-cowbell-circle-plus"></i>Agregar Cría
                                            </button>
                                            <x-app-modal-create 
                                                modalId="create_calves_modal_{{ $cow->id }}"
                                                title="Crear Cría" 
                                                formAction="{{ route('Cows.storecalving') }}"
                                                :form="view('Cows.calvin-form', [
                                                    'users' => $users,
                                                    'cow' => $cow,
                                                ])->render()" />
                                        @endif
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </x-app-table>
        </div>
        <input type="radio" name="my_tabs_2" class="tab" aria-label="vendidos" />
        <div class="tab-content border-base-300 bg-base-100">
            <x-app-table>
                <thead>
                    <tr>
                        <th class="text-center">Codigo</th>
                        <th class="text-center">Fecha de venta</th>
                        <th class="text-center">Sexo</th>
                        <th class="text-center">Propietario</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all_inactive as $cow)
                        <tr>
                            <td class="text-center">{{ $cow->animal_code }}</td>
                            <td class="text-center">{{ $cow->sold_date_formatted }}</td>
                            <td class="text-center">{{ $cow->sexo }}</td>
                            <td class="text-center">{{ $cow->user?->name ?? '-' }} {{ $cow->user?->last_name ?? '-' }}
                            </td>
                            <td class="flex items-center gap-2">
                                <div class="flex gap-2">
                                    <span class="btn btn-sm btn-neutral">
                                        {{ $cow->status == 2 ? 'Vendido' : 'Muerto' }}
                                    </span>
                                </div>
                                <div class="flex gap-2">
                                    <button class="btn btn-sm btn-accent"
                                        onclick="document.getElementById('info_cow_modal_{{ $cow->id }}').showModal()">
                                        <i class="fa-regular fa-memo-circle-info"></i> InfoAgro
                                    </button>
                                    <x-app-modal-info
                                        modalId="info_cow_modal_{{ $cow->id }}" 
                                        title="Información del Bovino" 
                                        formAction="{{ route('Cows.info', $cow->id) }}"
                                        :form="view('Cows.info-form', ['cow' => $cow, 'historyDetails' => $cow->historyDetails])->render()" />
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </x-app-table>
        </div>
        <input type="radio" name="my_tabs_2" class="tab" aria-label="Muertos" />
        <div class="tab-content border-base-300 bg-base-100">
            <x-app-table>
                <thead>
                    <tr>
                        <th class="text-center">Codigo</th>
                        <th class="text-center">Fecha de muerte</th>
                        <th class="text-center">Sexo</th>
                        <th class="text-center">Propietario</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all_dead as $cow)
                        <tr>
                            <td class="text-center">{{ $cow->animal_code }}</td>
                            <td class="text-center">{{ $cow->death_date_formatted }}</td>
                            <td class="text-center">{{ $cow->sexo }}</td>
                            <td class="text-center">{{ $cow->user?->name }} {{ $cow->user?->last_name }}</td>
                            <td class="flex items-center gap-2">
                                <div class="flex gap-2">
                                    <span class="btn btn-sm btn-neutral">
                                        {{ $cow->status == 3 ? 'Muerto' : 'Vendido' }}
                                    </span>
                                </div>
                                <div class="flex gap-2">
                                    <button class="btn btn-sm btn-accent"
                                        onclick="document.getElementById('info_cow_modal_{{ $cow->id }}').showModal()">
                                        <i class="fa-regular fa-memo-circle-info"></i> InfoAgro
                                    </button>
                                    <x-app-modal-info
                                        modalId="info_cow_modal_{{ $cow->id }}" 
                                        title="Información del Bovino" 
                                        formAction="{{ route('Cows.info', $cow->id) }}"
                                        :form="view('Cows.info-form', ['cow' => $cow, 'historyDetails' => $cow->historyDetails])->render()" />
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </x-app-table>
        </div>
    </div>
</x-app-layout>