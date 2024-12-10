<?php

namespace Database\Seeders;

use App\Models\Unidad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Unidad::create([
            'descripcion' => 'Kilogramo',
        ]);
        Unidad::create([
            'descripcion' => 'Cubo',
        ]);
        Unidad::create([
            'descripcion' => 'Pieza',
        ]);
        Unidad::create([
            'descripcion' => 'Pieza',
        ]);
        Unidad::create([
            'descripcion' => 'Paquete',
        ]);
        Unidad::create([
            'descripcion' => 'Caja',
        ]);
        Unidad::create([
            'descripcion' => 'Bolsa',
        ]);
        Unidad::create([
            'descripcion' => 'Paquete',
        ]);
        Unidad::create([
            'descripcion' => 'Paquete',
        ]);
        Unidad::create([
            'descripcion' => 'Paquete',
        ]);
    }
}
