<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;


class UserController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('can:users.index', only: ['index','show']),
            new Middleware('can:users.create', only: ['create','store']),
            new Middleware('can:users.edit', only: ['edit','update']),
            new Middleware('can:users.delete', only: ['destroy']),
        ];
    }
    public function validarForm(Request $request, $isUpdate = false)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => $isUpdate ? 'nullable|string|min:6|confirmed' : 'required|string|min:8|confirmed',
            'confirm_password' => $isUpdate ? 'nullable|string|min:6|same:password' : 'required|string|min:8|same:password',
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validarForm($request);
        try {
            $user = User::create($request->all());
            $user->assignRole($request->input('role'));
            return redirect()->route('users.index')->with('success', 'Usuario creado correctamente');
        } catch (\Exception $e) {
            return redirect()->route('users.index')->with('error', 'Error al crear el usuario');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validarForm($request, true);
        try {
            $user = User::findOrFail($id);
            $user->update($request->all());
            $user->syncRoles($request->input('role'));
            return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente');
        } catch (\Exception $e) {
            return redirect()->route('users.index')->with('error', 'Error al actualizar el usuario');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente');
        } catch (\Exception $e) {
            return redirect()->route('users.index')->with('error', 'Error al eliminar el usuario');
        }
    }
}
