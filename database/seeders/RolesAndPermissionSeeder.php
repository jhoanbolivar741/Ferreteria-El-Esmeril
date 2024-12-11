<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'admin']);
        $vendedorRole = Role::create(['name' => 'vendedor']);

        Permission::create(['name' => 'unidades.index']);
        Permission::create(['name' => 'unidades.create']);
        Permission::create(['name' => 'unidades.edit']);
        Permission::create(['name' => 'unidades.delete']);
        Permission::create(['name' => 'articulos.index']);
        Permission::create(['name' => 'articulos.create']);
        Permission::create(['name' => 'articulos.edit']);
        Permission::create(['name' => 'articulos.delete']);
        Permission::create(['name' => 'clientes.index']);
        Permission::create(['name' => 'clientes.create']);
        Permission::create(['name' => 'clientes.edit']);
        Permission::create(['name' => 'clientes.delete']);
        Permission::create(['name' => 'ventas.index']);
        Permission::create(['name' => 'ventas.create']);
        Permission::create(['name' => 'ventas.edit']);
        Permission::create(['name' => 'ventas.delete']);
        Permission::create(['name' => 'detalles.index']);
        Permission::create(['name' => 'detalles.create']);
        Permission::create(['name' => 'detalles.edit']);
        Permission::create(['name' => 'detalles.delete']);
        Permission::create(['name' => 'users.index']);
        Permission::create(['name' => 'users.create']);
        Permission::create(['name' => 'users.edit']);
        Permission::create(['name' => 'users.delete']);

        $adminRole->syncPermissions(Permission::all());
        $vendedorRole->syncPermissions([
            'unidades.index',
            'articulos.index',
            'clientes.index',
            'ventas.index',
            'detalles.index',
        ]);


        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => 'SuperAdmin',
        ]);
        $user->assignRole('admin');
    }
}
