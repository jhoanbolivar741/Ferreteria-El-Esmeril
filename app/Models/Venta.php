<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'ventas';
    protected $guarded = ['id'];

    public function relCliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function relDetalle()
    {
        return $this->hasMany(Detalle::class, 'venta_id');
    }

    public function relUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
