<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\User;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use NumberFormatter;

class ReporteController extends Controller
{
    public function Inventario()
    {
        $articulos = Articulo::all();

        // Calcular el total del inventario
        $total = $articulos->sum(function ($articulo) {
            return $articulo->cantidad * $articulo->precio_unitario;
        });

        // Convertir el total a palabras
        $formatter = new NumberFormatter('es', NumberFormatter::SPELLOUT);
        $totalEnLetras = ucfirst($formatter->format($total));

        // Generar el PDF
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('reportes.inventario', [
            'inventarios' => $articulos,
            'total' => $total,
            'totalEnLetras' => $totalEnLetras,
        ]);
        $pdf->setPaper('letter', 'landscape')->setWarnings(false);

        return $pdf->stream();
    }
    public function VentaPorDia(Request $request)
    {


        $request->validate([
            'fecha' => 'required|date|before_or_equal:today',
        ]);
        try {

            // Recuperar la fecha del request
            $fecha = $request->input('fecha');

            // Obtener las ventas de la fecha dada usando el campo "fecha" de la tabla "ventas"
            $ventas = Venta::whereDate('fecha', $fecha)->get();
            // Verificar si hay ventas en esa fecha
            if ($ventas->isEmpty()) {
                return redirect()->route('ventas.index')->with('error', "No hay ventas registradas para la fecha: $fecha.");
            }

            // Generar el PDF
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadView('reportes.ventaPorDia', [
                'ventas' => $ventas,
                'fecha' => $fecha,
            ]);
            $pdf->setPaper('letter', 'portrair')->setWarnings(false);

            return $pdf->stream();

        } catch (\Exception $e) {
            //Redirigir a ventas.index con un mensaje de error
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
            $pdf->setPaper('letter', 'landscape')->setWarnings(false);

            return $pdf->stream();
            
        } catch (\Throwable $th) {
            return redirect()->route('ventas.index')->with('error', "No se pudo generar la nota de venta.");
        }

    }
}