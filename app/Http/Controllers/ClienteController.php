<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ClienteController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('can:clientes.index', only: ['index','show']),
            new Middleware('can:clientes.create', only: ['create','store']),
            new Middleware('can:clientes.edit', only: ['edit','update']),
            new Middleware('can:clientes.delete', only: ['destroy']),
        ];
    }
    public function ValidarForm(Request $request)
    {
        $request->validate([
            'razon' => 'required|string|min:3|max:255',
            'nit' => 'required|string|min:3|max:255',
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Cliente::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('razon', 'like', '%' . $search . '%')
                  ->orWhere('nit', 'like', '%' . $search . '%');
        }

        $clientes = $query->paginate(5);

        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->ValidarForm($request);
        try {
            Cliente::create($request->all());
            return redirect()->route('clientes.index')->with('success', 'Cliente creado correctamente');
        } catch (\Exception $e) {
            return redirect()->route('clientes.index')->with('error', 'Error al crear el cliente: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->ValidarForm($request);
        try {
            $cliente = Cliente::findOrFail($id);
            $cliente->update($request->all());
            return redirect()->route('clientes.index')->with('success', 'Cliente actualizado correctamente');
        } catch (\Exception $e) {
            return redirect()->route('clientes.index')->with('error', 'Error al actualizar el cliente: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $cliente = Cliente::findOrFail($id);
            $cliente->delete();
            return redirect()->route('clientes.index')->with('success', 'Cliente eliminado correctamente');
        } catch (\Exception $e) {
            return redirect()->route('clientes.index')->with('error', 'Error al eliminar el cliente: ' . $e->getMessage());
        }
    }
}
