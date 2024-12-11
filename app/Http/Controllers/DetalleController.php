<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Detalle;
use App\Models\Venta;
use Illuminate\Http\Request;

class DetalleController extends Controller
{
    public function ValidarForm(Request $request)
    {
        $request->validate([
            'cantidad' => 'required|integer|min:1',
            'venta_id' => 'required|exists:ventas,id',
            'articulo_id' => 'required|exists:articulos,id',
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detalles = Detalle::all();
        return view('detalles.index', compact('detalles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ventas = Venta::all();
        $articulos = Articulo::all();
        return view('detalles.create', compact('ventas', 'articulos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->ValidarForm($request);
        try {
            Detalle::create($request->all());
            return redirect()->route('detalles.index')->with('success', 'Detalle creado correctamente');
        } catch (\Exception $e) {
            return redirect()->route('detalles.index')->with('error', 'Error al crear el detalle: ' . $e->getMessage());
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
    public function edit(string $id)
    {
        $detalle = Detalle::findOrFail($id);
        $ventas = Venta::all();
        $articulos = Articulo::all();
        return view('detalles.edit', compact('detalle', 'ventas', 'articulos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->ValidarForm($request);
        try {
            $detalle = Detalle::findOrFail($id);
            $detalle->update($request->all());
            return redirect()->route('detalles.index')->with('success', 'Detalle actualizado correctamente');
        } catch (\Exception $e) {
            return redirect()->route('detalles.index')->with('error', 'Error al actualizar el detalle: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $detalle = Detalle::findOrFail($id);
            $detalle->delete();
            return redirect()->route('detalles.index')->with('success', 'Detalle eliminado correctamente');
        } catch (\Exception $e) {
            return redirect()->route('detalles.index')->with('error', 'Error al eliminar el detalle: ' . $e->getMessage());
        }
    }
}
