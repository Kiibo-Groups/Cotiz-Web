<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;
    protected $table = 'events'; 

    protected $fillable =[
        'img',
        'titulo',
        'subtitulo',
        'descript',
        'lugar',
        'fecha',
        'hora',
        'confirmacion',
        'level',
        'code',
        'cupo',
        'status'
    ];

    public function EventsConfirms()
    { 
        return $this->hasMany('App\Models\EventsConfirms')->orderBy('created_at','DESC');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comments')->orderBy('created_at','DESC');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\AppUsers');
    }
}