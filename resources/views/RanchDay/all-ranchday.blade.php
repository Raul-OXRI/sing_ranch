<x-app-layout>
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div class="flex items-center gap-4">
            <div class="bg-secondary p-3 rounded-full">
                <i class="fa-solid fa-pills bg-secondary text-xl"></i>
            </div>
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-secondary">Gestión de registro médico vacuno</h1>
            </div>
        </div>
    </div>
    <div class="border-base-300 bg-base-100 mt-8 p-4 shadow">
        <x-app-table>
            <thead>
                <tr>
                    <th class="text-center">No. animal</th>
                    <th class="text-center">Sexo</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cows as $cow)
                    <tr>
                        <td class="text-center">{{ $cow->animal_code }}</td>
                        <td class="text-center">{{ $cow->sexo }}</td>
                        <td class="flex items-center justify-center gap-2">
                            <div class="flex gap-2">
                                <button class="btn btn-secondary btn-sm text-white"
                                    onclick="document.getElementById('create_history_modal_{{ $cow->id }}').showModal()">
                                    <i class="fa-solid fa-syringe"></i> Registrar
                                </button>
                                <x-app-modal-create
                                    modalId="create_history_modal_{{ $cow->id }}" 
                                    title="Registro Médico" 
                                    formAction="{{ route('Ranchday.store') }}"
                                    :form="view('RanchDay.pharmat-form',[
                                        'cow' => $cow
                                    ])->render()" />
                            </div>
                            <div class="flex gap-2">
                                <a href="{{ route('Ranchday.xlsx', $cow->id) }}" class="btn btn-neutral btn-sm">
                                    <i class="fa-solid fa-file-excel"></i> Exportar
                                </a>
                            </div>
                        </td>
                        
                @endforeach
            </tbody>
        </x-app-table>
    </div>
</x-app-layout>
