<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cliente::create([
            'razon' => 'Empresa Minera LOPEZ',
            'nit' => '1234567890',
        ]);
        Cliente::create([
            'razon' => 'Empresa Minera CHOQUE',
            'nit' => '1234567891',
        ]);     
        Cliente::create([
            'razon' => 'Comercial POMPEYA',
            'nit' => '1234567892',
        ]); 
        Cliente::create([
            'razon' => 'Casa de Cambio',
            'nit' => '1234567893',
        ]);
        Cliente::create([
            'razon' => 'Comercial BNF',
            'nit' => '1234567894',
        ]);
        Cliente::create([
            'razon' => 'Empresa Constructora JB',
            'nit' => '1234567895',
        ]);
        Cliente::create([
            'razon' => 'Empresa Minera POTOSI',
            'nit' => '1234567896',
        ]);
        Cliente::create([
            'razon' => 'Empresa Constructora JAMES',
            'nit' => '1234567897',
        ]);
        Cliente::create([
            'razon' => 'Empresa Minera INTI',
            'nit' => '1234567898',
        ]);
        Cliente::create([
            'razon' => 'Construcciones JESUS',
            'nit' => '1234567899',
        ]);
    }
}
