<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rfc extends Model
{
    use HasFactory,SoftDeletes;

    protected $dates = [
       'updated_at',
       'created_at',
       'deleted_at',

   ];
   protected $fillable = [
    'id',
    'nombre',
    'rfc',
    'opinionPositiva',
    'infoBancaria',
    'constFiscal',
    'domicilioFiscal',
    'numeroPlanta',
    'calle',
    'numeroCalle',
    'colonia',
    'cp',
    'municipio',
    'delegación',
    'estado',
    'pais',
    'actividadPPal',

    'created_at',
    'updated_at',
    'deleted_at'

    ];
}
