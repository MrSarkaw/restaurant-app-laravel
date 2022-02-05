<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\foods_drinks;
use App\order;
use App\position;
class position extends Model
{
    
    protected $fillable=['name','user_id','status'];
    public function role()
    {
        return $this->belongsTo(User::class);
    }

    public function foods_drinks(){
        return $this->belongToMany(foods_drinks::class,'orders','positions_id','foodsDrinks_id')
        ->withTimestamps() 
        ->withPivot('user_id');
    }
    public function order(){
        return $this->hasOne(order::class,'positions_id');
    }
}