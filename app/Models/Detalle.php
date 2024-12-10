<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    protected $table = 'detalles';
    protected $guarded = ['id'];

    public function relVenta()
    {
        return $this->belongsTo(Venta::class);
    }

    public function relArticulo()
    {
        return $this->belongsTo(Articulo::class);
    }
}