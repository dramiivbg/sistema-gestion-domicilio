<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domicilio extends Model
{

    protected $fillable = ['num_pedido','id_comprador', 'id_domiciliario', 'nombre_cliente', 'fecha'];
    use HasFactory;
}
