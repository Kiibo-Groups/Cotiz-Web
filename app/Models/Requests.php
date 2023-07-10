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
       'solicitud'
    ];



    public function service(){

        return $this->belongsTo(Services::class, 'services_id');
    }

    public function user(){

        return $this->belongsTo(User::class, 'user_id');
    }
}
