<div class="text-left">
    <input type="hidden" name="month_code" value="{{ $cow->id ?? '' }}">
    <input type="hidden" name="cod_user" value="{{ $cow->cod_user ?? '' }}">
    <div class="mb-4">
        <label for="month_code" class="text-sm font-medium">Codigo de la vaca:</label>
        <input type="text" name="month_code" class="input input-bordered w-full" value="{{ $cow->animal_code }}"
            disabled>
    </div>
    <div class="mb-4">
        <label class="text-sm font-medium">Propietario:</label>
        <input type="text" name="cod_user" class="input input-bordered w-full"
            value="{{ $cow->user->name }} {{ $cow->user->last_name }}" disabled>
    </div>
    <div class="mb-4">
        <label for="animal_code" class="text-sm font-medium">Codigo animal:</label>
        <input type="text" name="animal_code" class="input input-bordered w-full" required>
    </div>
    <div class="mb-4">
        <label for="birth_date" class="text-sm font-medium">Fecha de nacimiento:</label>
        <input type="date" name="birth_date" class="input input-bordered w-full">
    </div>
    <div class="mb-4">
        <label for="sexo" class="text-sm font-medium">Sexo:</label>
        <select name="sexo" class="select select-bordered w-full" required>
            <option value="macho">Macho</option>
            <option value="hembra">Hembra</option>
        </select>
    </div>
</div>
