<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retrasado extends Model
{


    protected $fillable = ['id_estado', 'motivo'];
    use HasFactory;
}
