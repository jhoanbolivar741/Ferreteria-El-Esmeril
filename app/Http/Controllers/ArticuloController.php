<?php

namespace App\Http\Controllers;

use App\Models\Unidad;
use Illuminate\Http\Request;
use App\Models\Articulo;
class ArticuloController extends Controller
{
    public function ValidarForm(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string|min:3|max:255',
            'cantidad' => 'required|numeric|min:0',
            'precio_unitario' => 'required|numeric|min:0',
            'unidad_id' => 'required|exists:unidades,id',
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articulos = Articulo::all();
        return view('articulos.index', compact('articulos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unidades = Unidad::all();
        return view('articulos.create', compact('unidades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->ValidarForm($request);
        try {
            Articulo::create($request->all());
            return redirect()->route('articulos.index')->with('success', 'Artículo creado correctamente');
        } catch (\Exception $e) {
            return redirect()->route('articulos.index')->with('error', 'Error al crear el artículo: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $articulo = Articulo::findOrFail($id);
        return view('articulos.show', compact('articulo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $articulo = Articulo::findOrFail($id);
        $unidades = Unidad::all();
        return view('articulos.edit', compact('articulo', 'unidades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->ValidarForm($request);
        try {
            $articulo = Articulo::findOrFail($id);
            $articulo->update($request->all());
            return redirect()->route('articulos.index')->with('success', 'Artículo actualizado correctamente');
        } catch (\Exception $e) {
            return redirect()->route('articulos.index')->with('error', 'Error al actualizar el artículo: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $articulo = Articulo::findOrFail($id);
            $articulo->delete();
            return redirect()->route('articulos.index')->with('success', 'Artículo eliminado correctamente');
        } catch (\Exception $e) {
            return redirect()->route('articulos.index')->with('error', 'Error al eliminar el artículo: ' . $e->getMessage());
        }
    }
}
