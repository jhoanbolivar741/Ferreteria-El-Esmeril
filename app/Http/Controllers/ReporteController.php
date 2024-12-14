<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\User;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use NumberFormatter;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
class ReporteController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('can:reporte.inventario', only: ['Inventario']),
            new Middleware('can:reporte.ventaPorDia', only: ['VentaPorDia']),
            new Middleware('can:reporte.notaDeVenta', only: ['notaDeVenta']),
        ];
    }
    public function Inventario()
    {
        $articulos = Articulo::all();

        $total = $articulos->sum(function ($articulo) {
            return $articulo->cantidad * $articulo->precio_unitario;
        });

        $formatter = new NumberFormatter('es', NumberFormatter::SPELLOUT);
        $totalEnLetras = ucfirst($formatter->format($total));

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('reportes.inventario', [
            'inventarios' => $articulos,
            'total' => $total,
            'totalEnLetras' => $totalEnLetras,
        ]);
        $pdf->setPaper('letter', 'portrait')->setWarnings(false);

        return $pdf->stream();
    }
    public function VentaPorDia(Request $request)
    {


        $request->validate([
            'fecha' => 'required|date|before_or_equal:today',
        ]);
        try {
            $fecha = $request->input('fecha');
            $ventas = Venta::whereDate('fecha', $fecha)->get();
            if ($ventas->isEmpty()) {
                return redirect()->route('ventas.index')->with('error', "No hay ventas registradas para la fecha: $fecha.");
            }
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadView('reportes.ventaPorDia', [
                'ventas' => $ventas,
                'fecha' => $fecha,
            ]);
            $pdf->setPaper('letter', 'portrair')->setWarnings(false);

            return $pdf->stream();

        } catch (\Exception $e) {
            return redirect()->route('ventas.index')->withErrors(["Ocurrió un error: " . $e->getMessage()]);
        }
    }

    public function notaDeVenta(string $id)
    {
        
        try {
            $venta = Venta::findOrFail($id);
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadView('reportes.notaDeVenta', [
                'venta' => $venta,
            ]);
            $pdf->setPaper('letter', 'portrait')->setWarnings(false);

            return $pdf->stream();
            
        } catch (\Throwable $th) {
            return redirect()->route('ventas.index')->with('error', "No se pudo generar la nota de venta.");
        }

    }
}