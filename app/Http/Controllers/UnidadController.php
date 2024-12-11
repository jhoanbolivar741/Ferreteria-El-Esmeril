<?php

namespace App\Http\Controllers;

use App\Models\Unidad;
use Illuminate\Http\Request;

class UnidadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $unidades = Unidad::all();
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
        Unidad::create($request->all());
        return redirect()->route('unidades.index');
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
        $unidad = Unidad::find($id);
        $unidad->update($request->all());
        return redirect()->route('unidades.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $unidad = Unidad::find($id);
        $unidad->delete();
        return redirect()->route('unidades.index');
    }
}
