<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{

    protected $fillable = ['id_domicilio','estado', 'fecha'];
    use HasFactory;
}
