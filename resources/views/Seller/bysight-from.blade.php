<div>
    <div class="mb-4">
        <label for="by_sight" class="text-sm font-medium">Precio del bovino: </label>
        <input type="number" step="0.01" min="0" class="input input-bordered w-full" name="by_sight"
            value="{{ old('by_sight', $seller->by_sight ?? '') }}" id="by_sight" required>
    </div>
</div>
