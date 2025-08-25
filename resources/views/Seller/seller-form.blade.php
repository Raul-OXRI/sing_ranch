<div>
    <div class="mb-4">
        <label for="cow_id" class="text-sm font-medium w-1/2">Bovino:</label>
        <select name="cow_id" id="cow_id" class="select mt-1 w-1/2" required>
            <option class="disabled selected">Seleccione bovino
            </option>
            @foreach ($cows as $cow)
                <option value="{{ $cow->id }}" {{ old('cow_id') == $cow->id ? 'selected' : '' }}>
                    {{ $cow->animal_code }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-4">
        <label for="cod_user" class="text-sm font-medium">Comprador:</label>
        <select name="cod_user" id="cod_user" class="select mt-1 w-1/2" required>
            <option value="{{ old('cod_user', $cow->cod_user ?? '') }}" class="disabled selected">Seleccione un comprador
            </option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}"
                    {{ old('cod_user', $cow->cod_user ?? '') == $user->id ? 'selected' : '' }}>
                    {{ $user->name }} {{ $user->last_name }}
                </option>
            @endforeach
        </select>
    </div>
</div>
