<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Referencia extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable =[

        'id',
        'referencia',
        'servi_id',
        'prove_id',
        'nombre',
        'direccion',
        'tiempo'

     ];

}
