<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('can:roles.index', only: ['index','show']),
            new Middleware('can:roles.create', only: ['create','store']),
            new Middleware('can:roles.edit', only: ['edit','update']),
            new Middleware('can:roles.delete', only: ['destroy']),
        ];
    }
    public function ValidarForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->ValidarForm($request);
        try {
            $role = Role::create($request->all());
            $role->syncPermissions($request->input('permissions'));
            return redirect()->route('roles.index')->with('success', 'Rol creado correctamente');
        } catch (\Exception $e) {
            return redirect()->route('roles.index')->with('error', 'Error al crear el rol');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $role = Role::findOrFail($id);
        return view('roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        return view('roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->ValidarForm($request);
        try {
            $role = Role::findOrFail($id);
            $role->update($request->all());
            $role->syncPermissions($request->input('permissions'));
            return redirect()->route('roles.index')->with('success', 'Rol actualizado correctamente');
        } catch (\Exception $e) {
            return redirect()->route('roles.index')->with('error', 'Error al actualizar el rol');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $role = Role::findOrFail($id);
            $role->delete();
            return redirect()->route('roles.index')->with('success', 'Rol eliminado correctamente');
        } catch (\Exception $e) {
            return redirect()->route('roles.index')->with('error', 'Error al eliminar el rol');
        }
    }
}
