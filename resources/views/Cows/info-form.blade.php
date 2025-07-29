<div class="text-left">
    <div class="mb-4">
        <label for="latest_weight" class="text-sm font-medium">Peso</label>
        <input type="text" name="latest_weight" value="{{ old('latest_weight', $historyDetails->latest_weight ?? '') }}"
            id="latest_weight" disabled class="input mt-1 w-1/2" />
    </div>
    <div class="mb-4">
        <label for="latest_weight_date" class="text-sm font-medium">Fecha de peso</label>
        <input type="text" name="latest_weight_date"
            value="{{ old('latest_weight_date', $historyDetails->latest_weight_date ?? '') }}" id="latest_weight_date"
            disabled class="input mt-1 w-1/2" />
    </div>
    <div class="mb-4">
        <label for="latest_vaccine_date" class="text-sm font-medium">Vacunación</label>
        <input type="text" name="latest_vaccine_date"
            value="{{ old('latest_vaccine_date', $historyDetails->latest_vaccine_date ?? '') }}"
            id="latest_vaccine_date" disabled class="input mt-1 w-1/2" />
    </div>
    <div class="mb-4">
        <label for="latest_deworming_date" class="text-sm font-medium">Desparasitación</label>
        <input type="text" name="latest_deworming_date"
            value="{{ old('latest_deworming_date', $historyDetails->latest_deworming_date ?? '') }}"
            id="latest_deworming_date" disabled class="input mt-1 w-1/2" />
    </div>
    <div class="mb-4">
        <label for="latest_health_check_date" class="text-sm font-medium">Revisión médica</label>
        <input type="text" name="latest_health_check_date"
            value="{{ old('latest_health_check_date', $historyDetails->latest_health_check_date ?? '') }}"
            id="latest_health_check_date" disabled class="input mt-1 w-1/2" />
    </div>
    <div class="mb-4">
        <label for="latest_feel_date" class="text-sm font-medium">Palpar</label>
        <input type="text" name="latest_feel_date"
            value="{{ old('latest_feel_date', $historyDetails->latest_feel_date ?? '') }}" id="latest_feel_date"
            disabled class="input input-bordered mt-1 w-1/2" />
    </div>
    <div class="mb-4">
        <label for="latest_antirabies_date" class="text-sm font-medium">Antirrábica</label>
        <input type="text" name="latest_antirabies_date"
            value="{{ old('latest_antirabies_date', $historyDetails->latest_antirabies_date ?? '') }}"
            id="latest_antirabies_date" disabled class="input mt-1 w-1/2" />
    </div>
    <div class="mb-4">
        <label for="latest_steroids_date" class="text-sm font-medium">Esteroides</label>
        <input type="text" name="latest_steroids_date"
            value="{{ old('latest_steroids_date', $historyDetails->latest_steroids_date ?? '') }}"
            id="latest_steroids_date" disabled class="input mt-1 w-1/2" />
    </div>
    <div class="mb-4">
        <label for="latest_antibiotics_date" class="text-sm font-medium">Antibióticos</label>
        <input type="text" name="latest_antibiotics_date"
            value="{{ old('latest_antibiotics_date', $historyDetails->latest_antibiotics_date ?? '') }}"
            id="latest_antibiotics_date" disabled class="input mt-1 w-1/2" />
    </div>
    <div class="mb-4">
        <label for="latest_vitamins_date" class="text-sm font-medium">Vitaminas</label>
        <input type="text" name="latest_vitamins_date"
            value="{{ old('latest_vitamins_date', $historyDetails->latest_vitamins_date ?? '') }}"
            id="latest_vitamins_date" disabled class="input mt-1 w-1/2" />
    </div>
    <div class="mb-4">
        <label for="latest_serum_date" class="text-sm font-medium">Sueros</label>
        <input type="text" name="latest_serum_date"
            value="{{ old('latest_serum_date', $historyDetails->latest_serum_date ?? '') }}" id="latest_serum_date"
            disabled class="input mt-1 w-1/2" />
    </div>
    <div class="mb-4">
        <label for="latest_notes" class="text-sm font-medium">Notas</label>
        <textarea name="latest_notes" id="latest_notes" rows="3" disabled class="input mt-1 w-full">{{ old('latest_notes', $historyDetails->latest_notes ?? '') }}</textarea>
    </div>
</div>
