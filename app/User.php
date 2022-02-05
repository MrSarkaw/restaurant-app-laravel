<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\foods_drinks;
use App\role;
use App\orders;
use App\feedback;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function role()
    {
        return $this->belongsTo(role::class);
    }

    public function foodsDrinks()
    {
        return $this->hasMany(foods_drinks::class, 'user_id');
    }

    public function position()
    {
        return $this->hasMany(position::class, 'user_id');
    }

    public function orders(){
        return $this->hasMany(order::class,'user_id');
    }
    public function feedback(){
        return $this->hasMany(feedback::class,'user_id');
    }

    public function typesFoodsAndDrinks(){
        return $this->hasMany(typesFoodsAndDrinks::class);
     }


   public function IsAdmin(){
       if($this->role->name=="administrator"){
           return true;
       }
       return false;
   }

   public function IsServer(){
       if($this->role->name=="server"){
           return true;
       }

       return false;
   }

   public function IsShef(){
       if($this->role->name=="shef"){
           return true;
       }
       return false;
   }
   
}

