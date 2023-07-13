<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Buzonempresa extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable =[

        'prove_id',
        'documento',
        'descripcion',
        'origen',
        'admin_id'

     ];


    public function proveedor(){

        return $this->belongsTo(Rfc::class, 'prove_id');
    }

    public function admin(){

        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
