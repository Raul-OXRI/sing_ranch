<div>

    <div class="mb-4">
        <label for="animal_code" class="text-sm font-medium w-1/2">Código del animal:</label>
        <input type="text" name="animal_code" value="{{ old('animal_code', $cow->animal_code ?? '') }}" id="animal_code"
            required class="input mt-1 w-1/2" />
    </div>

    <div class="mb-4">
        <label for="entry_date" class="text-sm font-medium w-1/2">Fecha de entrada:</label>
        <input type="date" name="entry_date" value="{{ old('entry_date', $cow->entry_date ?? '') }}" id="entry_date"
            required class="input mt-1 w-1/2" />
    </div>
    <div class="mb-4">
        <label for="sexo" class="text-sm font-medium w-1/2">Sexo:</label>
        <select name="sexo" id="sexo" required class="select mt-1 w-1/2">
            <option value="macho" {{ old('sexo', $cow->sexo ?? '') == 'macho' ? 'selected' : '' }}>Macho</option>
            <option value="hembra" {{ old('sexo', $cow->sexo ?? '') == 'hembra' ? 'selected' : '' }}>Hembra</option>
        </select>
    </div>
    <div class="mb-4">
        <label for="cod_user" class="text-sm font-medium w-1/2">Propietario:</label>
        <select name="cod_user" id="cod_user" class="select mt-1 w-1/2" required>
            <option value="{{ old('cod_user', $cow->cod_user ?? '') }}" class="disabled selected">Seleccione un
                propietario
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
