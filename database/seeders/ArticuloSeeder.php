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
            'descripcion' => 'Aceite',
            'cantidad' => 100,
            'precio_unitario' => 50,
            'foto' => 'aceite.png',
            'unidad_id' => 1,
        ]);
        Articulo::create([
            'descripcion' => 'Agua Destilada',
            'cantidad' => 80,
            'precio_unitario' => 20,
            'foto' => 'aguadestilada.png',
            'unidad_id' => 1,
        ]);
        Articulo::create([
            'descripcion' => 'Barra Angular',
            'cantidad' => 150,
            'precio_unitario' => 80,
            'foto' => 'barraangular.png',
            'unidad_id' => 3,
        ]);
        Articulo::create([
            'descripcion' => 'Barra de Cobre',
            'cantidad' => 100,
            'precio_unitario' => 40,
            'foto' => 'barradecobre.png',
            'unidad_id' => 3,
        ]);
        Articulo::create([
            'descripcion' => 'Barra de Construccion',
            'cantidad' => 100,
            'precio_unitario' => 65,
            'foto' => 'barradeconstruccion.png',
            'unidad_id' => 3,
        ]);
        Articulo::create([
            'descripcion' => 'Carretilla',
            'cantidad' => 60,
            'precio_unitario' => 300,
            'foto' => 'carretilla.png',
            'unidad_id' => 2,
        ]);
        Articulo::create([
            'descripcion' => 'Electrolito',
            'cantidad' => 70,
            'precio_unitario' => 20,
            'foto' => 'electrolito.png',
            'unidad_id' => 1,
        ]);
        Articulo::create([
            'descripcion' => 'Grasa',
            'cantidad' => 80,
            'precio_unitario' => 25,
            'foto' => 'grasa.png',
            'unidad_id' => 4,
        ]);
        Articulo::create([
            'descripcion' => 'Grasa Azul',
            'cantidad' => 90,
            'precio_unitario' => 35,
            'foto' => 'grasaazul.png',
            'unidad_id' => 4,
        ]);
        Articulo::create([
            'descripcion' => 'Martillo',
            'cantidad' => 100,
            'precio_unitario' => 45,
            'foto' => 'martillo.png',
            'unidad_id' => 2,
        ]);
        Articulo::create([
            'descripcion' => 'Taladro',
            'cantidad' => 110,
            'precio_unitario' => 215,
            'foto' => 'taladro.png',
            'unidad_id' => 2,
        ]);
        Articulo::create([
            'descripcion' => 'Cemento',
            'cantidad' => 120,
            'precio_unitario' => 48,
            'foto' => 'cemento.png',
            'unidad_id' => 5,
        ]);
        Articulo::create([
            'descripcion' => 'Excavadora',
            'cantidad' => 120,
            'precio_unitario' => 35000,
            'foto' => 'excavadora.png',
            'unidad_id' => 2,
        ]);
    }
}