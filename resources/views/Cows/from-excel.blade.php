@if ($cows->isNotEmpty())
    @php
        $firstCow = $cows->first();
        $title = '';
        $colspan = 0;

        if ($firstCow->status == 1) {
            $title = 'Bovinos Activos';
            $colspan = 5; // Código, Usuario, Fecha de Ingreso, Fecha de Nacimiento, Madre de la cría
        } elseif ($firstCow->status == 2) {
            $title = 'Bovinos Vendidos';
            $colspan = 3; // Código, Usuario, Fecha de Venta
        } elseif ($firstCow->status == 3) {
            $title = 'Bovinos Muertos';
            $colspan = 3; // Código, Usuario, Fecha de Muerte
        }
    @endphp

    <th colspan="{{ $colspan }}"
        style="background-color: #433f3a; color: white; font-size: 18px; font-weight: bold; text-align: center; padding: 12px; border: 1px solid #ddd;">
        {{ $title }}
    </th>
    <table>
        <thead>
            <tr>
                <th style="background-color: #ff8904; border: 1px solid #000000; text-align: left; padding: 8px;">Código
                </th>
                <th style="background-color: #ff8904; border: 1px solid #000000; text-align: left; padding: 8px;">Usuario
                </th>

                @if ($firstCow->status == 1)
                    <th style="background-color: #ff8904; border: 1px solid #000000; text-align: left; padding: 8px;">
                        Fecha de Ingreso</th>
                    <th style="background-color: #ff8904; border: 1px solid #000000; text-align: left; padding: 8px;">
                        Fecha de Nacimiento</th>
                    <th style="background-color: #ff8904; border: 1px solid #000000; text-align: left; padding: 8px;">
                        Madre de la cría</th>
                @elseif ($firstCow->status == 2)
                    <th style="background-color: #ff8904; border: 1px solid #000000; text-align: left; padding: 8px;">
                        Fecha de Venta</th>
                @elseif ($firstCow->status == 3)
                    <th style="background-color: #ff8904; border: 1px solid #000000; text-align: left; padding: 8px;">
                        Fecha de Muerte</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($cows as $cow)
                <tr>
                    <td>{{ $cow->animal_code }}</td>
                    <td>{{ $cow->cod_user }}</td>

                    @if ($cow->status == 1)
                        <td>{{ $cow->entry_date }}</td>
                        <td>{{ $cow->birth_date }}</td>
                        <td>{{ $cow->month_code }}</td>
                    @elseif ($cow->status == 2)
                        <td>{{ $cow->sold_date }}</td>
                    @elseif ($cow->status == 3)
                        <td>{{ $cow->death_date }}</td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
