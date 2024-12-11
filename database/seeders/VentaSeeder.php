<?php

namespace Database\Seeders;

use App\Models\Venta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Venta::create([
            'fecha' => '2024-01-01',
            'cliente_id' => 1,
            'user_id' => 1,
        ]);
        Venta::create([
            'fecha' => '2024-01-02',
            'cliente_id' => 2,
            'user_id' => 2,
        ]);
        Venta::create([
            'fecha' => '2024-01-03',
            'cliente_id' => 3,
            'user_id' => 3,
        ]);
        Venta::create([
            'fecha' => '2024-01-04',
            'cliente_id' => 4,
            'user_id' => 4,
        ]);
        Venta::create([
            'fecha' => '2024-01-05',
            'cliente_id' => 5,
            'user_id' => 5,
        ]);
        Venta::create([
            'fecha' => '2024-01-06',
            'cliente_id' => 6,
            'user_id' => 6,
        ]);
        Venta::create([
            'fecha' => '2024-01-07',
            'cliente_id' => 7,
            'user_id' => 7,
        ]);
        Venta::create([
            'fecha' => '2024-01-08',
            'cliente_id' => 8,
            'user_id' => 8,
        ]);
        Venta::create([
            'fecha' => '2024-01-09',
            'cliente_id' => 9,
            'user_id' => 9,
        ]);
        Venta::create([
            'fecha' => '2024-01-10',
            'cliente_id' => 10,
            'user_id' => 10,
        ]);
    }
}
