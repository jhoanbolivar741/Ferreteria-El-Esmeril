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
            'name' => 'Enrique Lopez',
            'email' => 'lopez@gmail.com',
            'password' => '12345678',
        ])->assignRole('vendedor');
        User::create([
            'name' => 'Luis Choque',
            'email' => 'choque@gmail.com',
            'password' => '12345678',
        ])->assignRole('vendedor');
    }
}
