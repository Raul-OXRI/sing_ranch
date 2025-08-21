<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PesajeBovino{{ $cow->animal_code }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #333; padding: 8px; text-align: center; }
        h1 { text-align: center; }
        img { display: block; margin: auto; max-width: 100%; }
    </style>
</head>
<body>
    <h1>Pesaje del bovino {{ $cow->animal_code }}</h1>

    <p><strong>Dueño:</strong> {{ $cow->user->name }} {{ $cow->user->last_name }}</p>

    <h3>Gráfica de pesos</h3>
    <img src="{{ $chartUrl }}" alt="Gráfica de pesos">

    <h3>Detalle de pesaje</h3>
    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Peso (Lb)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cow->cowhistories as $history)
            <tr>
                <td>{{ \Carbon\Carbon::parse($history->weight_date)->format('d/m/Y') }}</td>
                <td>{{ $history->int_weight }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
