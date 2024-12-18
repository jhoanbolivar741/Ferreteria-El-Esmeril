<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota de Venta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
        }

        .header h2 {
            text-transform: uppercase;
            margin: 10px 0;
        }

        .table {
            width: 100%;
            margin-bottom: 20px;
            border: 1px solid black;
            border-collapse: collapse;
        }

        .table td, .table th {
            border: 1px solid black;
        }

        .total {
            font-weight: bold;
            font-size: 1.2em;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
        }
    </style>
</head>

<body>

    <div class="header">
        <h2>Ferretería "El Esmeril"</h2>
        <h2>Nota de Venta</h2>
        <p style="text-align: right;">Fecha de Venta: {{ \Carbon\Carbon::parse($venta->fecha)->format('d/m/Y') }}</p>
        <p style="text-align: left;">Razón Social: {{ $venta->relCliente->razon}}</p>
        <p style="text-align: left;">NIT: {{ $venta->relCliente->nit }}</p>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Cant.</th>
                <th>Descripción</th>
                <th>P. Unit.(Bs)</th>
                <th>Subtotal(Bs)</th>
            </tr>
        </thead>
        <tbody>
            @php
                $total = 0;
            @endphp
            @foreach ($venta->relDetalle as $detalle)
                @php
                    $subtotal = $detalle->cantidad * $detalle->relArticulo->precio_unitario;
                    $total += $subtotal;
                @endphp
                <tr>
                    <td style="text-align: right;">{{ $detalle->cantidad }}</td>
                    <td>{{ $detalle->relArticulo->descripcion }}</td>
                <td style="text-align: right;">{{ number_format($detalle->relArticulo->precio_unitario, 2) }} </td>
                    <td style="text-align: right;">{{ number_format($subtotal, 2) }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3" style="text-align: right;">TOTAL </td>
                <td style="text-align: right;">{{ number_format($total, 2) }}</td>
            </tr>
        </tbody>
    </table>
    @php
        $formatter = new NumberFormatter('es', NumberFormatter::SPELLOUT);
        $totalEnLetras = ucfirst($formatter->format($total));
    @endphp
    <div>
        <p>Son: {{ $totalEnLetras }} 00/100 bolivianos</p>
    </div>

    <footer class="footer">
        <p>Fecha de generación: {{ now()->format('d/m/Y H:i:s') }}</p>
    </footer>
</body>

</html>