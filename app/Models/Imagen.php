<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table = 'imagenes';
    protected $guarded = ['id'];

    public function articulo()
    {
        return $this->belongsTo(Articulo::class);
    }
}


