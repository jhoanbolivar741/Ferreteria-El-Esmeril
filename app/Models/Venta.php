<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'ventas';
    protected $guarded = ['id'];

    public function relCliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function relDetalle()
    {
        return $this->hasMany(Detalle::class);
    }

    public function relUser()
    {
        return $this->belongsTo(User::class);
    }
}
