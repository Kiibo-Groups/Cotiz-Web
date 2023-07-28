<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Services extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'services_providers';

    protected $fillable =[
       'type',
       'title',
       'description',
       'logo',
       'status',
       'price',
       'provider_id',

       'nombre',
       'apellidoPaterno',
       'apellidoMaterno',
       'carrera',
       'especialidad',
       'calle',
       'numeroCalle',
       'colonia',
       'cp',
       'municipio',
       'delegación',
       'estado',
       'country',
       'celular',

       'email',
       'fb',
       'linkedin',
       'instagram',

       'titulo1',
       'titulo2',
       'cedula1',
       'cedula2',
       'cv',
       'fotoCredencial',
       'fotoCredencial2',
       'exitos',

    ];

    public function provider(){

        return $this->belongsTo(Rfc::class,'provider_id', 'id');
    }

    public function requests(){

        return $this->hasMany(Requests::class);
    }
}
