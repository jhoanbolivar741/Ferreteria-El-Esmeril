<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">Reporte de Inventario</h1>

    <style>
        @page {
            margin: 1cm;
            font-family: 'Arial';
            font-size: 11px;
        }

        .contador::after {
            content: counter(page);
        }

        header,
        footer {
            background-color: #4CAF50;
            color: white;
        }

        table {
            width: 100%;
            text-align: center;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        footer td {
            text-align: right;
        }
    </style>

    <table class="min-w-full bg-white border border-gray-300" style="width: 100%;">
        <thead>
            <tr>
                <th class="px-4 py-2 border">Descripción</th>
                <th class="px-4 py-2 border">Cantidad</th>
                <th class="px-4 py-2 border">Precio Unitario</th>
                <th class="px-4 py-2 border">Unidad</th>
                <th class="px-4 py-2 border">Subtotal</th>
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
                            <td class="px-4 py-2 border">{{ $articulo->descripcion }}</td>
                            <td class="px-4 py-2 border text-center">{{ $articulo->cantidad }}</td>
                            <td class="px-4 py-2 border text-right">{{ number_format($articulo->precio_unitario, 2) }} Bs</td>
                            <td class="px-4 py-2 border text-center">{{ $articulo->relUnidad->descripcion }}</td>
                            <td class="px-4 py-2 border text-right">{{ number_format($subtotal, 2) }} Bs</td>
                        </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="4" class="px-4 py-2 border text-right">Total:</th>
                <th class="px-4 py-2 border text-right">{{ number_format($total, 2) }} Bs</th>
            </tr>
            
            <tr>
                <td colspan="5" class="px-4 py-2 border text-right italic">
                    {{ $totalEnLetras }} bolivianos
                </td>
            </tr>
        </tfoot>

    </table>

    <div class="mt-6 text-sm text-gray-600">
        <p>Fecha del reporte: {{ date('d/m/Y') }}</p>
    </div>
</div>