<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operadore extends Model
{


    protected $fillable = ['nombre_completo', 'telefono', 'num_cedula', 'rol'];

    use HasFactory;
}
