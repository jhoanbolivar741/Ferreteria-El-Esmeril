<div class="container">
    <style>
        @page {
            margin: 1cm;
            font-family: 'Arial';
            font-size: 11px;
            @top-center {
                content: element(header);
            }
            @bottom-center {
                content: element(footer);
            }
        }

        .container {
            width: 100%;
            padding-left: 16px;
            padding-right: 16px;
            margin-left: auto;
            margin-right: auto;
        }

        body {
            margin: 0;
            padding: 0;
        }

        header {
            position: running(header);
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 10px 0;
        }

        footer {
            position: running(footer);
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 10px 0;
        }

        table {
            width: 100%;
            text-align: left;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
            border: 1px solid #ccc;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #4CAF50;
            color: white;
            text-align: left;
        }

        td.text-right {
            text-align: right;
        }

        footer td {
            text-align: right;
        }

        .italic {
            font-style: italic;
        }

        .absolute {
            position: absolute;
        }

        .bottom-0 {
            bottom: 0;
        }

        .left-0 {
            left: 0;
        }

        .right-0 {
            right: 0;
        }

        .text-sm {
            font-size: 0.875rem;
        }

        .text-gray-600 {
            color: #718096;
        }
        .contador::after {
            content: counter(page);
        }
    </style>

    <header>
        <h2>Reporte de Inventario</h2>
        <p>Página <span class="contador"></span></p>
    </header>

    <table>
        <thead>
            <tr>
                <th>Descripción</th>
                <th class="text-right">Cantidad</th>
                <th class="text-right">Precio Unitario</th>
                <th>Unidad</th>
                <th class="text-right">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @php
                $total = 0;
            @endphp
            @foreach($inventarios as $articulo)
                @php
                    $subtotal = $articulo->cantidad * $articulo->precio_unitario;
                    $total += $subtotal;
                @endphp
                <tr>
                    <td>{{ $articulo->descripcion }}</td>
                    <td class="text-right">{{ $articulo->cantidad }}</td>
                    <td class="text-right">{{ number_format($articulo->precio_unitario, 2) }} Bs</td>
                    <td>{{ $articulo->relUnidad->descripcion }}</td>
                    <td class="text-right">{{ number_format($subtotal, 2) }} Bs</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="4" class="text-right">Total:</th>
                <th class="text-right">{{ number_format($total, 2) }} Bs</th>
            </tr>
            <tr>
                <td colspan="5" class="text-right italic">
                    {{ $totalEnLetras }} bolivianos
                </td>
            </tr>
        </tfoot>
    </table>

    <footer class="absolute bottom-0 left-0 right-0 text-sm">
        <p>Fecha de generación: {{ date('d/m/Y H:i:s') }}</p>
    </footer>
</div>