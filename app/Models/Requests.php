<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    use HasFactory;
    protected $table = 'request_services';

    protected $fillable =[
       'user_id',
       'services_id',
       'status',
       'description',
       'document',
       'solicitud',
       'proveedor',
       'tipo',
       'nombre',
       'modelo',
       'marca',
       'cantidad',
       'presupuesto',
       'servicio',
       'link'
    ];



    public function service(){

        return $this->belongsTo(Services::class, 'services_id');
    }

    public function user(){

        return $this->belongsTo(User::class, 'user_id');
    }
    public function admin(){

        return $this->belongsTo(Admin::class, 'user_id');
    }
    public function prove(){

        return $this->belongsTo(Rfc::class, 'proveedor');
    }
    public function prueba(){

        return $this->belongsTo(User::class, 'proveedor');
    }
}
