<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Serviciover extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable =[
        'servicio_id',
        'user_id',
        'documento',
        'descripcion',
        'origen',

     ];

    public function user(){

        return $this->belongsTo(User::class, 'user_id');
    }

    public function admin(){

        return $this->belongsTo(Admin::class, 'user_id');
    }
}
