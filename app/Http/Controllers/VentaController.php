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
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Venta::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->whereHas('relCliente', function ($q) use ($search) {
                $q->where('razon', 'like', '%' . $search . '%');
            })->orWhereHas('relUser', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            });
        }

        if ($request->filled('fecha_inicio') && $request->filled('fecha_fin')) {
            $query->whereBetween('fecha', [$request->input('fecha_inicio'), $request->input('fecha_fin')]);
        }

        $ventas = $query->paginate(5);

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
            //$venta = Venta::create($request->all());
            $venta = Venta::create([
                'fecha' => $request->input('fecha'),
                'cliente_id' => $request->input('cliente_id'),
                'user_id' => auth()->user()->id,
            ]);
            return redirect()->route('detalles.index', $venta->id)->with('success', 'Venta creada correctamente');
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
            $venta->update([
                'fecha' => $request->input('fecha'),
                'cliente_id' => $request->input('cliente_id'),
                'user_id' => auth()->user()->id,
            ]);
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
