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
       'service_id',
       'status',
       'description',
       'document'
    ];

    public function service(){

        return $this->belongsTo(Services::class, 'service_id');
    }

    public function user(){

        return $this->belongsTo(User::class, 'user_id');
    }
}
