<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compradore extends Model
{
    protected $fillable = ['nombre_completo','email', 'direccion', 'telefono'];
    use HasFactory;
}
