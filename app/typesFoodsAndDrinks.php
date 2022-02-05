<?php

namespace App;
use App\foods_drinks;
use App\order;
use Illuminate\Database\Eloquent\Model;

class typesFoodsAndDrinks extends Model
{
    
    protected $fillable=["user_id","foodsAndDrinks_id","name","image","price","size"];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function typefoodsAndDrink(){
        return $this->belongTo(foods_drinks::class);
    }

    public function positions(){
        return $this->belongsToMany(position::class,'orders','foodsDrinks_id','positions_id')
        ->withTimestamps()
        ->withPivot('user_id');
        
    }
}
