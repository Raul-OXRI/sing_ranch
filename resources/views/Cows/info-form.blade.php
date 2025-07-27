
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Información del Bovino: {{ $cow->animal_code }}
        </h2>
    </x-slot>

    <div class="py-4 px-6 bg-white shadow rounded-lg">
        <ul>
            <li><strong>Peso:</strong> {{ $historyDetails->latest_weight ?? 'N/A' }}</li>
            <li><strong>Fecha de peso:</strong> {{ $historyDetails->latest_weight_date ?? 'N/A' }}</li>
            <li><strong>Vacunación:</strong> {{ $historyDetails->latest_vaccine_date ?? 'N/A' }}</li>
            <li><strong>Desparasitación:</strong> {{ $historyDetails->latest_deworming_date ?? 'N/A' }}</li>
            <li><strong>Revisión médica:</strong> {{ $historyDetails->latest_health_check_date ?? 'N/A' }}</li>
            <li><strong>Tacto:</strong> {{ $historyDetails->latest_feel_date ?? 'N/A' }}</li>
            <li><strong>Antirrábica:</strong> {{ $historyDetails->latest_antirabies_date ?? 'N/A' }}</li>
            <li><strong>Esteroides:</strong> {{ $historyDetails->latest_steroids_date ?? 'N/A' }}</li>
            <li><strong>Antibióticos:</strong> {{ $historyDetails->latest_antibiotics_date ?? 'N/A' }}</li>
            <li><strong>Vitaminas:</strong> {{ $historyDetails->latest_vitamins_date ?? 'N/A' }}</li>
            <li><strong>Sueros:</strong> {{ $historyDetails->latest_serum_date ?? 'N/A' }}</li>
            <li><strong>Notas:</strong> {{ $historyDetails->latest_notes ?? 'Sin notas' }}</li>
        </ul>
        <a href="{{ route('Cows.show') }}" class="btn btn-primary mt-4">Volver</a>
    </div>

