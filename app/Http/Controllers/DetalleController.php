<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Detalle;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class DetalleController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('can:detalles.index', only: ['index','show']),
            new Middleware('can:detalles.create', only: ['create','store']),
            new Middleware('can:detalles.edit', only: ['edit','update']),
            new Middleware('can:detalles.delete', only: ['destroy']),
        ];
    }
    public function ValidarForm(Request $request)
    {
        $request->validate([
            'cantidad' => 'required|integer|min:1',
            'articulo_id' => 'required|exists:articulos,id',
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index($ventaId)
    {
        $detalles = Detalle::where('venta_id', $ventaId)->get();
        return view('detalles.index', compact('detalles', 'ventaId'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($ventaId)
    {
        $articulos = Articulo::all();
        return view('detalles.create', compact('ventaId', 'articulos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $ventaId)
    {
        $this->ValidarForm($request);
        try {
            Detalle::create(array_merge($request->all(), ['venta_id' => $ventaId]));
            return redirect()->route('detalles.index', $ventaId)->with('success', 'Detalle creado correctamente');
        } catch (\Exception $e) {
            return redirect()->route('detalles.index', $ventaId)->with('error', 'Error al crear el detalle');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $detalle = Detalle::findOrFail($id);
        return view('detalles.show', compact('detalle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($ventaId, $detalleId)
    {
        $detalle = Detalle::findOrFail($detalleId);
        $articulos = Articulo::all();
        return view('detalles.edit', compact('detalle', 'ventaId', 'articulos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $ventaId, $detalleId)
    {
        $this->ValidarForm($request);
        try {
            $detalle = Detalle::findOrFail($detalleId);
            $detalle->update($request->all());
            return redirect()->route('detalles.index', $ventaId)->with('success', 'Detalle actualizado correctamente');
        } catch (\Exception $e) {
            return redirect()->route('detalles.index', $ventaId)->with('error', 'Error al actualizar el detalle');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($ventaId, $detalleId)
    {
        try {
            $detalle = Detalle::findOrFail($detalleId);
            $detalle->delete();
            return redirect()->route('detalles.index', $ventaId)->with('success', 'Detalle eliminado correctamente');
        } catch (\Exception $e) {
            return redirect()->route('detalles.index', $ventaId)->with('error', 'Error al eliminar el detalle');
        }
    }
}
