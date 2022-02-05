<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\typesFoodsAndDrinks;

class foods_drinks extends Model
{

    protected $fillable=['user_id','name','image'];
    
    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function typesFoodsAndDrinks(){
       return $this->hasMany(typesFoodsAndDrinks::class);
    }
    
   

}
