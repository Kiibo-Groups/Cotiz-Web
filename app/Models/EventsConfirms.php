<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventsConfirms extends Model
{
    use HasFactory;
    protected $table = 'events_confirms'; 

    protected $fillable =[
        'user_id',
        'events_id',
        'code'
    ];

    
}