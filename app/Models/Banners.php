<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banners extends Model
{
    use HasFactory;
    protected $table = 'banner'; 

    protected $fillable =[
        'img',
        'title',
        'subtitle',
        'descript',
        'status',
        'position'
    ];
}
