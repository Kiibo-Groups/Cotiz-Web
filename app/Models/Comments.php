<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $table = 'comments_events'; 

    protected $fillable =[ 
        'events_id',
        'user_id',
        'comment',
        'rating',
        'status'
    ];
 

    public function user()
    {
        return $this->hasMany('App\Models\AppUsers')->orderBy('created_at');
    }
}