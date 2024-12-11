<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetodoDePago extends Model
{
    protected $table = 'metodos_de_pago';
    protected $guarded = ['id'];
}
