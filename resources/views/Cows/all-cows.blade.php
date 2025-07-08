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

    
</x-app-layout>
