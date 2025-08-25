<x-app-layout>
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div class="flex items-center gap-4">
            <div class="bg-secondary p-3 rounded-full">
                <i class="fa-solid fa-money-bill-transfer bg-secondary text-xl"></i>
            </div>
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-secondary">Gestión de venta</h1>
            </div>
        </div>
        <div class="flex gap-3">
            <div class="dropdown dropdown-center lg:dropdown-end ">
                <div tabindex="0" role="button" class="btn btn-neutral"><i class="fa-solid fa-file-excel"></i> Exportar</div>
                <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-1 w-52 p-2 shadow-sm">
                    <li><a href="{{ route('Cows.xlsx', ['status' => 1]) }}">Activos</a></li>
                </ul>
            </div>
            <button class="btn btn-secondary  text-white" onclick="document.getElementById('add_cow_modal').showModal()">
                <i class="fa-solid fa-cowbell-circle-plus"></i>Agregar bovino
            </button>
        </div>
        <x-app-modal-create 
        modalId="add_cow_modal" 
        title="Agregar bovino para venta" 
        formAction="{{ route('Seller.store') }}"
        :form="view('Seller.seller-form', ['cows' => $cows, 'users' => $users])->render()" />
    </div>
    <div class="border-base-300 bg-base-100 mt-8 p-4 shadow">
        <x-app-table>
            <thead>
                <tr>
                    <th class="text-center">No. animal</th>
                    <th class="text-center">Sexo</th>
                    <th class="text-center">Propietario</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($seller as $seller)
                    <tr>
                        <td class="text-center">{{ $seller->cow->animal_code }}</td>
                        <td class="text-center">{{ $seller->cow->sexo }}</td>
                        <td class="text-center">{{ $seller->cow->user->name }} {{ $seller->cow->user->last_name }}</td>
                        <td class="flex flex-col sm:flex-row items-center justify-center gap-2 w-full">
                            <div class="flex gap-2">
                                <button class="btn btn-sm btn-secondary text-white"
                                    onclick="document.getElementById('unit_price_modal_{{ $seller->id }}').showModal()">
                                    <i class="fa-solid fa-circle-dollar"></i> Venta por pesaje
                                </button>
                                <x-app-modal-update 
                                modalId="unit_price_modal_{{ $seller->id }}" 
                                title="Venta por pesaje bovino: {{ $seller->cow->animal_code }}"
                                formAction="{{ route('Seller.unitprice', $seller->id) }}" 
                                :form="view('Seller.unitprice-from', ['seller' => $seller])->render()" />
                            </div>
                            <div class="flex gap-2">
                                <button class="btn btn-sm btn-neutral text-white"
                                    onclick="document.getElementById('by_sight_modal_{{ $seller->id }}').showModal()">
                                    <i class="fa-solid fa-hand-holding-circle-dollar"></i> Venta por vista
                                </button>
                                <x-app-modal-update 
                                modalId="by_sight_modal_{{ $seller->id }}" 
                                title="Venta por vista bovino: {{ $seller->cow->animal_code }}"
                                formAction="{{ route('Seller.bysight', $seller->id) }}" 
                                :form="view('Seller.bysight-from', ['seller' => $seller])->render()" />
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            
        </x-app-table>
    </div>
</x-app-layout>
