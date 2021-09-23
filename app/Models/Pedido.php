<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{


    protected $fillable = ['num_pedido', 'direccion', 'id_domiciliario', 'empresa_cliente','telefono_comprador','telefono_vendedor','email_vendedor','email_comprador','estado',
    'fecha_llegada','fecha_entrega'];
    use HasFactory;
}
