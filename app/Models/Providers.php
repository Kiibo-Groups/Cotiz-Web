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
       'logo'
    ];

    public function service(){

        return $this->hasOne(Services::class);
    }
}
