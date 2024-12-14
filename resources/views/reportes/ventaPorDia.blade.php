<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Ventas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .report-header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .table {
            width: 100%;
            margin-bottom: 20px;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            overflow: hidden;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #e9ecef;
        }

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            font-size: 12px;
            padding: 10px;
            background-color: #007bff;
            color: white;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <div class="report-header">
            <h1>Reporte para la fecha: {{ \Carbon\Carbon::parse($fecha)->format('d/m/Y') }}</h1>
        </div>


        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID de Venta</th>
                        <th>Valor de la Venta</th>
                        <th>Usuario</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalVentas = 0;
                    @endphp
                    @foreach ($ventas as $venta)
                                        <tr>
                                            <td>{{ $venta->id }}</td>
                                            @php
                                                $subtotal = 0;
                                                foreach ($venta->relDetalle as $detalle)
                                                    $subtotal += $detalle->cantidad * $detalle->relArticulo->precio_unitario;
                                            @endphp
                                            <td>{{$subtotal}}</td>
                                            <td>{{ $venta->relUser->name }}</td>
                                        </tr>
                                        @php
                                            $totalVentas += $subtotal;
                                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="alert alert-info">
            <h3>Total de Ventas: {{$totalVentas}}</h3>
        </div>

        <footer>
            Fecha de generación: {{now()->format('d/m/Y H:i:s') }}
        </footer>
    </div>

</body>

</html>