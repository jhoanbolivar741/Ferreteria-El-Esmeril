<?php

namespace Database\Seeders;

use App\Models\Detalle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetalleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Detalle::create([
            'cantidad' => 10,
            'precio_unitario' => 100,
            'articulo_id' => 1,
            'factura_id' => 1,
        ]);
        Detalle::create([
            'cantidad' => 20,
            'precio_unitario' => 200,
            'articulo_id' => 2,
            'factura_id' => 2,
        ]);
        Detalle::create([
            'cantidad' => 30,
            'precio_unitario' => 300,
            'articulo_id' => 3,
            'factura_id' => 3,
        ]);
        Detalle::create([
            'cantidad' => 40,
            'precio_unitario' => 400,
            'articulo_id' => 4,
            'factura_id' => 4,
        ]);
        Detalle::create([
            'cantidad' => 50,
            'precio_unitario' => 500,
            'articulo_id' => 5,
            'factura_id' => 5,
        ]);
        Detalle::create([
            'cantidad' => 60,
            'precio_unitario' => 600,
            'articulo_id' => 6,
            'factura_id' => 6,
        ]);
        Detalle::create([
            'cantidad' => 70,
            'precio_unitario' => 700,
            'articulo_id' => 7,
            'factura_id' => 7,
        ]);
        Detalle::create([
            'cantidad' => 80,
            'precio_unitario' => 800,
            'articulo_id' => 8,
            'factura_id' => 8,
        ]);
        Detalle::create([
            'cantidad' => 90,
            'precio_unitario' => 900,
            'articulo_id' => 9,
            'factura_id' => 9,
        ]);
        Detalle::create([
            'cantidad' => 100,
            'precio_unitario' => 1000,
            'articulo_id' => 10,
            'factura_id' => 10,
        ]);
    }
}
