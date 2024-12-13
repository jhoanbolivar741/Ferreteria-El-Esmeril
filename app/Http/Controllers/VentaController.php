<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class VentaController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('can:ventas.index', only: ['index','show']),
            new Middleware('can:ventas.create', only: ['create','store']),
            new Middleware('can:ventas.edit', only: ['edit','update']),
            new Middleware('can:ventas.delete', only: ['destroy']),
        ];
    }
    public function ValidarForm(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'cliente_id' => 'required|exists:clientes,id',
            'user_id' => 'required|exists:users,id',
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Venta::query();

        if ($request->filled('fecha')) {
            $query->whereDate('fecha', $request->input('fecha'));
        }

        if ($request->filled('cliente')) {
            $query->whereHas('cliente', function ($q) use ($request) {
                $q->where('nombre', 'like', '%' . $request->input('cliente') . '%');
            });
        }

        if ($request->filled('usuario')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->input('usuario') . '%');
            });
        }

        $ventas = $query->paginate(10);

        return view('ventas.index', compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::all();
        $users = User::all();
        return view('ventas.create', compact('clientes', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->ValidarForm($request);
        try {
            Venta::create($request->all());
            return redirect()->route('ventas.index')->with('success', 'Venta creada correctamente');
        } catch (\Exception $e) {
            return redirect()->route('ventas.index')->with('error', 'Error al crear la venta');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $venta = Venta::findOrFail($id);
        return view('ventas.show', compact('venta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $venta = Venta::findOrFail($id);
        $clientes = Cliente::all();
        $users = User::all();
        return view('ventas.edit', compact('venta', 'clientes', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->ValidarForm($request);
        try {
            $venta = Venta::findOrFail($id);
            $venta->update($request->all());
            return redirect()->route('ventas.index')->with('success', 'Venta actualizada correctamente');
        } catch (\Exception $e) {
            return redirect()->route('ventas.index')->with('error', 'Error al actualizar la venta');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $venta = Venta::findOrFail($id);
            $venta->delete();
            return redirect()->route('ventas.index')->with('success', 'Venta eliminada correctamente');
        } catch (\Exception $e) {
            return redirect()->route('ventas.index')->with('error', 'Error al eliminar la venta');
        }
    }
}
