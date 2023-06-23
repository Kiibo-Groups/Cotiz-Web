<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sections extends Model
{
    use HasFactory;
    protected $table = 'sections'; 

    protected $fillable =[
       'section',
       'titulo',
       'subtitulo',
       'descript',
       'btn_text',
       'btn_action',
       'video',
       'pic_1',
       'pic_2',
       'pic_3'
    ];
}
