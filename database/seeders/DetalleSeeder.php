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
            'cantidad' => 100,
            'venta_id' => 1,
            'articulo_id' => 1,
        ]);
        Detalle::create([
            'cantidad' => 80,
            'venta_id' => 2,
            'articulo_id' => 2,
        ]);
        Detalle::create([
            'cantidad' => 150,
            'venta_id' => 3,
            'articulo_id' => 3,
        ]);
        Detalle::create([
            'cantidad' => 100,
            'venta_id' => 4,
            'articulo_id' => 4,
        ]);
        Detalle::create([
            'cantidad' => 100,
            'venta_id' => 5,
            'articulo_id' => 5,
        ]);
        Detalle::create([
            'cantidad' => 60,
            'venta_id' => 6,
            'articulo_id' => 6,
        ]);
        Detalle::create([
            'cantidad' => 70,
            'venta_id' => 7,
            'articulo_id' => 7,
        ]);
        Detalle::create([
            'cantidad' => 80,
            'venta_id' => 8,
            'articulo_id' => 8,
        ]);
        Detalle::create([
            'cantidad' => 90,
            'venta_id' => 9,
            'articulo_id' => 9,
        ]);
        Detalle::create([
            'cantidad' => 100,
            'venta_id' => 10,
            'articulo_id' => 10,
        ]);
        Detalle::create([
            'cantidad' => 100,
            'venta_id' => 10,
            'articulo_id' => 11,
        ]);
        Detalle::create([
            'cantidad' => 10,
            'venta_id' => 10,
            'articulo_id' => 12,
        ]);
    }
}
