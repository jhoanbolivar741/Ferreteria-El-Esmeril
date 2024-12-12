<?php

namespace App\Http\Controllers;

use App\Models\Unidad;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class UnidadController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('can:unidades.index', only: ['index','show']),
            new Middleware('can:unidades.create', only: ['create','store']),
            new Middleware('can:unidades.edit', only: ['edit','update']),
            new Middleware('can:unidades.delete', only: ['destroy']),
        ];
    }
    public function ValidarForm(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string|min:3|max:255',
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Unidad::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('descripcion', 'like', '%' . $search . '%');
        }

        $unidades = $query->paginate(5);

        return view('unidades.index', compact('unidades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('unidades.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->ValidarForm($request);
        try {
            Unidad::create($request->all());
            return redirect()->route('unidades.index')->with('success', 'Unidad creada correctamente');
        } catch (\Exception $e) {
            return redirect()->route('unidades.index')->with('error', 'Error al crear la unidad: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $unidad = Unidad::find($id);
        return view('unidades.show', compact('unidad'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $unidad = Unidad::find($id);
        return view('unidades.edit', compact('unidad'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->ValidarForm($request);
        try {
            $unidad = Unidad::findOrFail($id);
            $unidad->update($request->all());
            return redirect()->route('unidades.index')->with('success', 'Unidad actualizada correctamente');
        } catch (\Exception $e) {
            return redirect()->route('unidades.index')->with('error', 'Error al actualizar la unidad: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $unidad = Unidad::findOrFail($id);
            $unidad->delete();
            return redirect()->route('unidades.index')->with('success', 'Unidad eliminada correctamente');
        } catch (\Exception $e) {
            return redirect()->route('unidades.index')->with('error', 'Error al eliminar la unidad: ' . $e->getMessage());
        }
    }
}
