<?php

namespace App\Http\Controllers;

use App\Models\Unidad;
use Illuminate\Http\Request;
use App\Models\Articulo;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ArticuloController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('can:articulos.index', only: ['index','show']),
            new Middleware('can:articulos.create', only: ['create','store']),
            new Middleware('can:articulos.edit', only: ['edit','update']),
            new Middleware('can:articulos.delete', only: ['destroy']),
        ];
    }
    public function ValidarForm(Request $request, $isUpdate = false)
    {
        $request->validate([
            'descripcion' => 'required|string|min:3|max:255',
            'cantidad' => 'required|numeric|min:0',
            'precio_unitario' => 'required|numeric|min:0',
            'foto' => $isUpdate ? 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048' : 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'unidad_id' => 'required|exists:unidades,id',
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Articulo::query();

        if ($request->filled('descripcion')) {
            $query->where('descripcion', 'like', '%' . $request->input('descripcion') . '%');
        }

        if ($request->filled('cantidad')) {
            $query->where('cantidad', $request->input('cantidad'));
        }

        if ($request->filled('precio_unitario')) {
            $query->where('precio_unitario', $request->input('precio_unitario'));
        }

        if ($request->filled('unidad_id')) {
            $query->where('unidad_id', $request->input('unidad_id'));
        }

        $articulos = $query->paginate(10);

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
            $articulo = new Articulo();
            $nombre = null;
            if($foto = $request->file('foto')){
                $nombre = date('YmdHis').'.'.$foto->getClientOriginalExtension();
                $ruta = 'fotos';
                $foto->move($ruta, $nombre);
            }
            $articulo->descripcion = $request->input('descripcion');
            $articulo->cantidad = $request->input('cantidad');
            $articulo->precio_unitario = $request->input('precio_unitario');
            $articulo->unidad_id = $request->input('unidad_id');
            $articulo->foto = $nombre;
            $articulo->save();
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
        $this->ValidarForm($request, true);
        try {
            $articulo = Articulo::findOrFail($id);
            $nombre = $articulo->foto;
            if($foto = $request->file('foto')){
                $nombre = date('YmdHis').'.'.$foto->getClientOriginalExtension();
                $ruta = 'fotos';
                $foto->move($ruta, $nombre);
            }
            $articulo->descripcion = $request->input('descripcion');
            $articulo->cantidad = $request->input('cantidad');
            $articulo->precio_unitario = $request->input('precio_unitario');
            $articulo->unidad_id = $request->input('unidad_id');
            $articulo->foto = $nombre;
            $articulo->save();
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
