@props(['modalId', 'title', 'formAction', 'form'])

<dialog id="{{ $modalId }}" class="modal">
    <div class="modal-box">
        <h3 class="text-lg font-bold mb-4">{{ $title }}</h3>
        <form action="{{ $formAction }}" method="POST">
            @csrf
            {!! $form !!}


            {{-- Aquí puedes agregar más campos o personalizar el formulario según sea necesario --}}

            <div class="modal-action flex justify-end gap-2 mt-4">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="button" class="btn"
                    onclick="document.getElementById('{{ $modalId }}').close()">Cerrar</button>
            </div>
        </form>
    </div>
</dialog>
