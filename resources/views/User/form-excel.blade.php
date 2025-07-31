<table style="width: 100%; border-collapse: collapse; font-family: Arial, sans-serif; font-size: 14px;">
    <thead>
        <tr>
            <th colspan="5"
                style="background-color: #433f3a; color: white; font-size: 18px; font-weight: bold; text-align: center; padding: 12px; border: 1px solid #ddd;">
                Lista de Usuarios
            </th>
        </tr>
        <tr>
            <th style="background-color: #ff8904; border: 1px solid #000000; text-align: left; padding: 8px;">Nombre</th>
            <th style="background-color: #ff8904; border: 1px solid #000000; text-align: left; padding: 8px;">Apellido
            </th>
            <th style="background-color: #ff8904; border: 1px solid #000000; text-align: left; padding: 8px;">Usuario
            </th>
            <th style="background-color: #ff8904; border: 1px solid #000000; text-align: left; padding: 8px;">Estado</th>
            <th style="background-color: #ff8904; border: 1px solid #000000; text-align: left; padding: 8px;">Rol</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td align="center" valign="middle"
                    style="border: 1px solid #ddd; padding: 8px; text-align: center; vertical-align: middle;">
                    {{ $user->name }}
                </td>
                <td align="center" valign="middle"
                    style="border: 1px solid #ddd; padding: 8px; text-align: center; vertical-align: middle;">
                    {{ $user->last_name }}
                </td>
                <td align="center" valign="middle"
                    style="border: 1px solid #ddd; padding: 8px; text-align: center; vertical-align: middle;">
                    {{ $user->username }}
                </td>
                <td align="center" valign="middle"
                    style="border: 1px solid #ddd; padding: 8px; font-weight: bold; text-align: center; vertical-align: middle; color: {{ $user->status == 'Activo' ? '#28a745' : '#dc3545' }};">
                    {{ $user->status }}
                </td>
                <td align="center" valign="middle"
                    style="border: 1px solid #ddd; padding: 8px; text-align: center; vertical-align: middle;">
                    {{ $user->rol }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
