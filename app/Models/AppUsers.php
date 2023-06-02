<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppUsers extends Model
{
    use HasFactory;
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'last_name',
        'about',
        'pic_profile',
        'email',
        'phone',
        'phone_verify',
        'company',
        'job',
        'country',
        'address',
        'twitter',
        'facebook',
        'instagram',
        'linkedin',
        'password',
        'shw_password',
        'level',
        'cashback'
    ];
}
