<?php

namespace Database\Seeders;

use App\Models\Articulo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Articulo::create([
            'descripcion' => 'Cemento',
            'cantidad' => 10,
            'precio_unitario' => 100,
            'unidad_id' => 1,
        ]);
        Articulo::create([
            'descripcion' => 'Arena',
            'cantidad' => 20,
            'precio_unitario' => 200,
            'unidad_id' => 2,
        ]);
        Articulo::create([
            'descripcion' => 'tubo',
            'cantidad' => 30,
            'precio_unitario' => 300,
            'unidad_id' => 3,
        ]);
        Articulo::create([
            'descripcion' => 'excavadora',
            'cantidad' => 40,
            'precio_unitario' => 400,
            'unidad_id' => 4,
        ]);
        Articulo::create([
            'descripcion' => 'Alambre',
            'cantidad' => 50,
            'precio_unitario' => 500,
            'unidad_id' => 5,
        ]);
        Articulo::create([
            'descripcion' => 'Cinta Metrica',
            'cantidad' => 60,
            'precio_unitario' => 600,
            'unidad_id' => 6,
        ]);
        Articulo::create([
            'descripcion' => 'Foco',
            'cantidad' => 70,
            'precio_unitario' => 700,
            'unidad_id' => 7,
        ]);
        Articulo::create([
            'descripcion' => 'Clavos',
            'cantidad' => 80,
            'precio_unitario' => 800,
            'unidad_id' => 8,
        ]);
        Articulo::create([
            'descripcion' => 'Estacas',
            'cantidad' => 90,
            'precio_unitario' => 900,
            'unidad_id' => 9,
        ]);
        Articulo::create([
            'descripcion' => 'Plancha',
            'cantidad' => 100,
            'precio_unitario' => 1000,
            'unidad_id' => 10,
        ]);
    }
}
