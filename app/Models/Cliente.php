<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $guarded = ['id'];

    public function relVenta()
    {
        return $this->hasMany(Venta::class, 'cliente_id');
    }
}
