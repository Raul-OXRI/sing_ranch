<div>
    <div class="mb-4">
        <label for="unit_price" class="text-sm font-medium">Precio por Lb: </label>
        <input type="number" step="0.01" min="0" class="input input-bordered w-full" name="unit_price"
            value="{{ old('unit_price', $seller->unit_price ?? '') }}" id="unit_price" required>
    </div>

    <div class="mb-4">
        <label for="final_weight" class="text-sm font-medium">Peso final: </label>
        <input type="number" step="0.01" min="0" class="input input-bordered w-full" name="final_weight"
            value="{{ old('final_weight', $seller->final_weight ?? '') }}" id="final_weight" required>
    </div>
</div>
