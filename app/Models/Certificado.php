<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Certificado extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable =[

        'id',

        'servi_id',
        'prove_id',
        'nombre',
        'imagen',


     ];
}
