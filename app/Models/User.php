<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

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
        'company',
        'job',
        'country',
        'address',
        'password',
        'shw_password',
        'role',
        'status',
        'cashback',
        'idempresa'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function requests(){

        return $this->hasMany(Requests::class);
    }

    public function provider(){

        return $this->hasOne(Providers::class);
    }

    public function empresa()
    {

        return $this->belongsTo(Rfc::class,'idempresa','id');
    }

    public function hasPerm($perm)
	{
		$array = explode(",", auth()->user()->perm);

		if(in_array($perm,$array) || in_array("All",$array))
		{
			return true;
		}
		else
		{
			return false;
		}
	}




}
