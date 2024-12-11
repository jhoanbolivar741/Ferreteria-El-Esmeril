<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MetodoDePago;

class MetodoDePagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MetodoDePago::create([
            'descripcion' => 'Efectivo',
        ]);
        MetodoDePago::create([
            'descripcion' => 'Tarjeta de Débito',
        ]);
        MetodoDePago::create([
            'descripcion' => 'Tarjeta de Crédito',
        ]);
        MetodoDePago::create([
            'descripcion' => 'Transferencia Bancaria',
        ]);
        MetodoDePago::create([
            'descripcion' => 'QR',
        ]);
        MetodoDePago::create([
            'descripcion' => 'Depósito Bancario',
        ]);
        MetodoDePago::create([
            'descripcion' => 'Pago en Línea',
        ]);
        MetodoDePago::create([
            'descripcion' => 'Tarjeta de Débito',
        ]);
        MetodoDePago::create([
            'descripcion' => 'Tarjeta de Crédito',
        ]);
        MetodoDePago::create([
            'descripcion' => 'QR',
        ]);

    }
}
