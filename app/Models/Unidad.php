<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    protected $table = 'unidades';
    protected $guarded = ['id'];

    public function relArticulo()
    {
        return $this->hasMany(Articulo::class, 'unidad_id');
    }
}
