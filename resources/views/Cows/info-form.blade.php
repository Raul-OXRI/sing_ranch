{{-- resources/views/Cows/info-form.blade.php --}}
<div class="p-4">
    <h3 class="font-bold text-lg mb-2">Historial del Bovino: {{ $cow->animal_code }}</h3>

    @forelse($cow->histories as $history)
        <div class="mb-4 border p-2 rounded shadow">
            <p><strong>Peso:</strong> {{ $history->int_weight }} {{ $history->weight_date ?? '-' }}</p>
            <p><strong>Vacuna:</strong> {{ $history->vaccine ? 'Sí' : 'No' }} ({{ $history->vaccine_date ?? '-' }})</p>
            <p><strong>Desparasitación:</strong> {{ $history->deworming ? 'Sí' : 'No' }} ({{ $history->deworming_date ?? '-' }})</p>
            <p><strong>Chequeo médico:</strong> {{ $history->health_check ? 'Sí' : 'No' }} ({{ $history->health_check_date ?? '-' }})</p>
            <p><strong>Tacto:</strong> {{ $history->feel ? 'Sí' : 'No' }} ({{ $history->feel_date ?? '-' }})</p>
            <p><strong>Antirrábica:</strong> {{ $history->antirabies ? 'Sí' : 'No' }} ({{ $history->antirabies_date ?? '-' }})</p>
            <p><strong>Esteroides:</strong> {{ $history->steroids ? 'Sí' : 'No' }} ({{ $history->steroids_date ?? '-' }})</p>
            <p><strong>Antibióticos:</strong> {{ $history->antibiotics ? 'Sí' : 'No' }} ({{ $history->antibiotics_date ?? '-' }})</p>
            <p><strong>Vitaminas:</strong> {{ $history->vitamins ? 'Sí' : 'No' }} ({{ $history->vitamins_date ?? '-' }})</p>
            <p><strong>Sueros:</strong> {{ $history->serum ? 'Sí' : 'No' }} ({{ $history->serum_date ?? '-' }})</p>
            <p><strong>Notas:</strong> {{ $history->notes ?? 'Sin notas' }}</p>
            <p class="text-xs text-gray-500">Registrado el {{ $history->created_at->format('d/m/Y') }}</p>
        </div>
    @empty
        <p>No hay historial para este bovino.</p>
    @endforelse
</div>
