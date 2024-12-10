<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Empresa Minera LOPEZ',
            'email' => 'lopez@gmail.com',
            'password' => '12345678',
        ]);
        User::create([
            'name' => 'Empresa Minera CHOQUE',
            'email' => 'choque@gmail.com',
            'password' => '12345678',
        ]);
        User::create([
            'name' => 'Comercial POMPEYA',
            'email' => 'pompeya@gmail.com',
            'password' => '12345678',
        ]);
        User::create([
            'name' => 'Casa de Cambio',
            'email' => 'cambio@gmail.com',
            'password' => '12345678',
        ]);
        User::create([
            'name' => 'Comercial BNF',
            'email' => 'bnf@gmail.com',
            'password' => '12345678',
        ]);
        User::create([
            'name' => 'Empresa Constructora JB',
            'email' => 'constructora@gmail.com',
            'password' => '12345678',
        ]);
        User::create([
            'name' => 'Empresa Minera POTOSI',
            'email' => 'potosi@gmail.com',
            'password' => '12345678',
        ]);
        User::create([
            'name' => 'Empresa Constructora JAMES',
            'email' => 'james@gmail.com',
            'password' => '12345678',
        ]);
        User::create([
            'name' => 'Empresa Minera INTI',
            'email' => 'inti@gmail.com',
            'password' => '12345678',
        ]);
        User::create([
            'name' => 'Construcciones JESUS',
            'email' => 'user@gmail.com',
            'password' => '12345678',
        ]);
    }
}
