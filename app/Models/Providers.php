<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Providers extends Model
{
    use HasFactory;
    protected $table = 'providers';

    protected $fillable =[
       'name',
       'address',
       'email',
       'phone',
       'country',
       'logo',
       'user_id '
    ];

    public function service(){

        return $this->hasOne(Services::class);
    }

    public function user(){

        return $this->belongsTo(User::class,'user_id');
    }
}
