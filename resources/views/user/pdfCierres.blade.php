<!DOCTYPE html>
<html>

<head>
    <title>Cierre de Turnos</title>
    <style>
        /* Agrega tus estilos aquí */
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            /* Tamaño de la fuente */
        }

        h1 {
            font-size: 18px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 4px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Alineación específica para columnas */
        .text-left {
            text-align: left;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }
    </style>
</head>

<body>
    <h1>Cierre de Turno:{{ $turno->turno }} Fecha: {{ $turno->fecha }}</h1>
    <table>
        <thead>
            <tr>

                <th>Manguera</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>L. Inicial</th>
                <th>L. Final</th>
                <th>Litros</th>
                <th>Importe</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($detalles as $item)
                <tr>
                    <td>{{ $item->surtidor_id }}</td>
                    <td>{{ $item->surtidor->product->name }}</td>
                    <td class="text-right">{{ $item->price }}</td>
                    <td class="text-right">{{ $item->lectura_inicial }}</td>
                    <td class="text-right">{{ $item->lectura_final }}</td>
                    <td class="text-right">{{ round($item->lectura_final - $item->lectura_inicial, 2) }}</td>
                    <td class="text-right">{{ round($item->price * ($item->lectura_final - $item->lectura_inicial), 2) }}
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    <h1>Responsable:{{ $turno->user->name }} </h1>
</body>

</html>
