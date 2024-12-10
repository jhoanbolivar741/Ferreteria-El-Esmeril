<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table = 'articulos';
    protected $guarded = ['id'];

    public function relUnidad()
    {
        return $this->belongsTo(Unidad::class);
    }
    public function relDetalle()
    {
        return $this->hasMany(Detalle::class);
    }
}