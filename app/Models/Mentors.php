<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentors extends Model
{
    use HasFactory;
    protected $table = 'mentors'; 

    protected $fillable =[
        'img',
        'nombre',
        'email',
        'descript',
        'status',
        'facebook',
        'twitter',
        'instagram'
    ];
}