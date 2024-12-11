<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Metodo_de_Pago;

class MetodoDePagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Metodo_de_Pago::create([
            'descripcion' => 'Efectivo',
        ]);
        Metodo_de_Pago::create([
            'descripcion' => 'Tarjeta de Débito',
        ]);
        Metodo_de_Pago::create([
            'descripcion' => 'Tarjeta de Crédito',
        ]);
        Metodo_de_Pago::create([
            'descripcion' => 'Transferencia Bancaria',
        ]);
        Metodo_de_Pago::create([
            'descripcion' => 'QR',
        ]);
        Metodo_de_Pago::create([
            'descripcion' => 'Depósito Bancario',
        ]);
        Metodo_de_Pago::create([
            'descripcion' => 'Pago en Línea',
        ]);
        Metodo_de_Pago::create([
            'descripcion' => 'Tarjeta de Débito',
        ]);
        Metodo_de_Pago::create([
            'descripcion' => 'Tarjeta de Crédito',
        ]);
        Metodo_de_Pago::create([
            'descripcion' => 'QR',
        ]);

    }
}
