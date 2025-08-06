<table>
    <thead>
        <tr>
            <th colspan="12" style="background-color: #433f3a; color: white; font-size: 18px; font-weight: bold; text-align: center; padding: 12px; border: 1px solid #ddd;">
                Historial médico de la vaca {{ $cow->animal_code }}
            </th>
        </tr>
        <tr>
            <th style="background-color: #ff8904; border: 1px solid #000000; text-align: left; padding: 8px;">Peso</th>
            <th style="background-color: #ff8904; border: 1px solid #000000; text-align: left; padding: 8px;">Fecha de Peso</th>
            <th style="background-color: #ff8904; border: 1px solid #000000; text-align: left; padding: 8px;">Fecha de Vacunación</th>
            <th style="background-color: #ff8904; border: 1px solid #000000; text-align: left; padding: 8px;">Fecha de Desparacitación</th>
            <th style="background-color: #ff8904; border: 1px solid #000000; text-align: left; padding: 8px;">Fecha de Chequeo de Salud</th>
            <th style="background-color: #ff8904; border: 1px solid #000000; text-align: left; padding: 8px;">Fecha de Palpar</th>
            <th style="background-color: #ff8904; border: 1px solid #000000; text-align: left; padding: 8px;">Fecha de Antirrábica</th>
            <th style="background-color: #ff8904; border: 1px solid #000000; text-align: left; padding: 8px;">Fecha de Esteroides</th>
            <th style="background-color: #ff8904; border: 1px solid #000000; text-align: left; padding: 8px;">Fecha de Antibióticos</th>
            <th style="background-color: #ff8904; border: 1px solid #000000; text-align: left; padding: 8px;">Fecha de Vitaminas</th>
            <th style="background-color: #ff8904; border: 1px solid #000000; text-align: left; padding: 8px;">Fecha de Suero</th>
            <th style="background-color: #ff8904; border: 1px solid #000000; text-align: left; padding: 8px;">Notas</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($ranchday as $item)
            <tr>
                <td align="center" valign="middle"
                        style="border: 1px solid #ddd; padding: 8px; text-align: center; vertical-align: middle;">{{ $item->int_weight }}</td>
                <td align="center" valign="middle"
                        style="border: 1px solid #ddd; padding: 8px; text-align: center; vertical-align: middle;">{{ $item->weight_date }}</td>
                <td align="center" valign="middle"
                        style="border: 1px solid #ddd; padding: 8px; text-align: center; vertical-align: middle;">{{ $item->vaccine_date }}</td>

                <td align="center" valign="middle"
                        style="border: 1px solid #ddd; padding: 8px; text-align: center; vertical-align: middle;">{{ $item->deworming_date }}</td>

                <td align="center" valign="middle"
                        style="border: 1px solid #ddd; padding: 8px; text-align: center; vertical-align: middle;">{{ $item->health_check_date }}</td>

                <td align="center" valign="middle"
                        style="border: 1px solid #ddd; padding: 8px; text-align: center; vertical-align: middle;">{{ $item->feel_date }}</td>

                <td align="center" valign="middle"
                        style="border: 1px solid #ddd; padding: 8px; text-align: center; vertical-align: middle;">{{ $item->antirabies_date }}</td>

                <td align="center" valign="middle"
                        style="border: 1px solid #ddd; padding: 8px; text-align: center; vertical-align: middle;">{{ $item->steroids_date }}</td>

                <td align="center" valign="middle"
                        style="border: 1px solid #ddd; padding: 8px; text-align: center; vertical-align: middle;">{{ $item->antibiotics_date }}</td>

                <td align="center" valign="middle"
                        style="border: 1px solid #ddd; padding: 8px; text-align: center; vertical-align: middle;">{{ $item->vitamins_date }}</td>

                <td align="center" valign="middle"
                        style="border: 1px solid #ddd; padding: 8px; text-align: center; vertical-align: middle;">{{ $item->serum_date }}</td>

                <td align="center" valign="middle"
                        style="border: 1px solid #ddd; padding: 8px; text-align: center; vertical-align: middle;">{{ $item->notes }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
