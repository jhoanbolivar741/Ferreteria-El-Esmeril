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

        $permissions = Permission::insert([
            ['name' => 'unidades.index'],
            ['name' => 'unidades.create'],
            ['name' => 'unidades.edit'],
            ['name' => 'unidades.delete'],
            ['name' => 'articulos.index'],
            ['name' => 'articulos.create'],
            ['name' => 'articulos.edit'],
            ['name' => 'articulos.delete'],
            ['name' => 'clientes.index'],
            ['name' => 'clientes.create'],
            ['name' => 'clientes.edit'],
            ['name' => 'clientes.delete'],
            ['name' => 'ventas.index'],
            ['name' => 'ventas.create'],
            ['name' => 'ventas.edit'],
            ['name' => 'ventas.delete'],
            ['name' => 'detalles.index'],
            ['name' => 'detalles.create'],
            ['name' => 'detalles.edit'],
            ['name' => 'detalles.delete'],
            ['name' => 'users.index'],
            ['name' => 'users.create'],
            ['name' => 'users.edit'],
            ['name' => 'users.delete']
        ]);

        $adminRole->syncPermissions($permissions);
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
