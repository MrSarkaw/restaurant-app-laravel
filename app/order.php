<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\typesFoodsAndDrinks;
use App\position;
class order extends Model
{
    protected $fillable=['foodsDrinks_id','positions_id','user_id','safe_status','ready_status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orders(){
        return $this->belongsTo(typesFoodsAndDrinks::class,'foodsDrinks_id');
    }

    public function positions(){
        return $this->belongsTo(position::class);
    }
}
