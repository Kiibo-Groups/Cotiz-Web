<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;
    protected $table = 'services_providers';

    protected $fillable =[
       'type',
       'title',
       'description',
       'logo',
       'status',
       'price',
       'provider_id'
    ];

    public function provider(){

        return $this->belongsTo(Rfc::class,'provider_id', 'id');
    }

    public function requests(){

        return $this->hasMany(Requests::class);
    }
}
